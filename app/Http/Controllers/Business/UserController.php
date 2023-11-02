<?php

namespace App\Http\Controllers\Business;


use App\Helpers\Utils;
use App\Helpers\Consult;
use App\Mail\EmailNewUser;
use App\Models\Users\User;
use App\Mail\EmailTeamInvitation;
use App\Models\TeamInvitation;
use App\Models\Teams\TeamCourseRestriction;
use App\Models\Teams\TeamUser;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Egulias\EmailValidator\Validation\EmailValidation;

use App\Helpers\EmailAddressValidator;

Carbon::setLocale('es');
class UserController extends Controller
{
    public function index()
    {
        $user_id =  Auth::user()->id;
        $user = User::find($user_id);
        if ($user->update_password) {
            flash('Cambia la contraseña antes que se venza');
            return redirect()->route('members.profilepw');
        }

        return view('businesses.users.index');
    }

    public function create(Request $request)
    {
        return view('businesses.users.create');
    }

    public function import()
    {

        return view('businesses.users.import');
    }


    public function upload(Request $request)
    {
        $name='users.xlsx';
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $name = 'users_'.time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/importar/';
            $file->move($path,$name);
            $upload = app('App\Http\Controllers\Tools\ImportFromExcelController')->importUsers($name);
            flash('Archivo cargado exitosamente')->success();
        }

        return redirect()->route('businesses.users');
    }

    public function download()
    {
        return response()->download('download/users.xlsx');
    }

    public function store(Request $request)
    {
        $current_team_id = Auth::user()->current_team_id;

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $password = Utils::genRandAlphaNumber(16);
        
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($password),
            'subdomain' => null,
            "confirmation_code" => Utils::genRandAlphaNumber(64),
            "code_valid_until" => Carbon::now()->addDays(30),
            "update_password" => 1,
            "current_team_id" => $current_team_id,
            "active" => 0,
        ]);

        $email = $user->email;
        $user->detail = str_replace("\r","<br>", $request->detail);
        $user->role = 'member';
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
        }
        
        $user->save();

        //enviar correo al usuario con el password
        // $allow_to_send = 1;
        // if ($allow_to_send) {
        //     try {
        //         Mail::to($user)->send(new EmailNewUser($user, $password));
        //         $email = Consult::getStoreConfig('notification_email');
        //         Mail::to($email)->send(new EmailNewUser($user, $password));
        //     } catch (\Throwable $th) {
        //         throw $th;
        //     }
        // }

        flash('Nuevo usuario creado')->success();
        return redirect()->route('businesses.users');
    }

}
