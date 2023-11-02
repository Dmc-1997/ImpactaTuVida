<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Carbon\Carbon;
Carbon::setLocale('es');

class Helper {

    /**
     * get role list
     *
     * @return string url
     */
    public static function getRoleList()
    {
        $out['member'] = 'member';
        $out['business'] = 'business';
        $out['admin'] = 'admin';
        $out['superadmin'] = 'superadmin';

        return $out;
    }

    public static function checkPermissionsToThisCourse($user, $course)
    {
        return 1;
        $allow = 0;
        if ($user->plan_id >= $course->plan_id ) {//membership
            //cumple los requisitos del nivel
            if ($user->pin_id >= $course->pin_id ) {
                $allow = 1;
            }

            if ($course->prize) {
                if ($user->prize ) {
                    $allow = 1;
                } else {
                    $allow = 0;
                }
            }

            if ($course->proactivity) {
                if ($user->proactivity ) {
                    $allow = 1;
                } else {
                    $allow = 0;
                }
            }


        }

        return $allow;
    }

    
    public static function checkPermissionsToThisCourseForTeams($user, $course, $allow)
    {
        if ($allow) {
            if ($course->teams == '0') {
                $allow = 1;
            } else {
                $team_allow = explode(",", $course->teams);
                if (in_array($user->current_team_id, $team_allow)) {
                    $allow = 1;
                } else {
                    $allow = 0;
                }
            }
        }
        return $allow;
    }
}