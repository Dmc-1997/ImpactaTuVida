<?php

namespace App\Helpers;

use App\Models\Config\StoreConfig;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Courses\CourseFollowup;

use App\Models\Users\User;
use App\Mail\EmailTeamInvitation;
use App\Models\TeamInvitation;
use App\Models\Teams\TeamCourseRestriction;
use App\Models\Teams\TeamUser;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;
use Egulias\EmailValidator\Validation\EmailValidation;

use App\Helpers\EmailAddressValidator;

Carbon::setLocale('es');

class Consult {

    public static function getStoreConfig($option)
    {
        $myConfig = StoreConfig::whereOption($option)->first();
        if (is_null($myConfig)) {
            return '';
        }

        return $myConfig->value;
    }

    public static function courseViewers($course_id)
    {
        $count = CourseFollowup::whereCourse_id($course_id)->distinct('user_id')->count('user_id');

        return $count;

    }

    public static function emailInvitation($email, $current_team_id, $name = '', $surname = '', $position = '')
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user = User::whereEmail($email)->first();
            if (is_null($user)) {//no está registrado, hay que registrarlo
                //crear usuario
                $user = new User();
                $user->name = ($name) ? $name : 'Invitado-' . rand(0,1000);
                $user->surname = ($surname) ? $surname : 'Invitado-' . rand(0,1000);
                $user->position = ($position) ? $position : 'cargo-' . rand(0,1000);
                $user->email = $email;
                $user->password = bcrypt('12345678');
                $user->role = 'member';
                $user->confirmation_code = Utils::genRandAlphaNumber(64);
                $user->code_valid_until = Carbon::now()->addDays(30);
                $user->update_password = 1;
                $user->current_team_id = $current_team_id;
                $user->active = 0;
                $user->save();
            }
            $user->confirmation_code = Utils::genRandAlphaNumber(64);
            $user->code_valid_until = Carbon::now()->addDays(30);
            $user->save();

            $team_invitation = TeamInvitation::whereEmail($email)->whereTeam_id($current_team_id)->first();
            if (is_null($team_invitation)) {
                $team_invitation = new TeamInvitation();
                $team_invitation->email = $email;
                $team_invitation->team_id = $current_team_id;
                $team_invitation->save();
            }

            $seconds = 5;
            $delay = now()->addSeconds($seconds);
            $job = new \App\Jobs\EmailInvitationJob($user, $current_team_id);
            $job->delay($delay);
            dispatch($job);

            //Mail::to($user)->send(new EmailTeamInvitation($user, $current_team_id));

            //return 'Usuario agregado ' . $email;

            // //agregarlo al grupo
            $team_user = TeamUser::whereUser_id($user->id)->whereTeam_id($current_team_id)->first();
            if (is_null($team_user)) {
                $team_user = new TeamUser();
                $team_user->user_id = $user->id;
                $team_user->team_id = $current_team_id;
                $team_user->save();

                return 'Usuario agregado ' . $email;
            } else {
                return 'Invitación reenviada';
            }
        } else {
            return $email . ' No es un correo';
        }
    }

    public static function hasRestriction($course_id, $team_id)
    {
        $restriction = TeamCourseRestriction::whereCourse_id($course_id)->whereTeam_id($team_id)->first();
        if (!is_null($restriction)) {
            return 1;
        }

        return 0;
    }

}
