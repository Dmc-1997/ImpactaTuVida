<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Consult;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Users\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Team;
use App\Helpers\Utils;
use App\Mail\EmailNewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $password = Utils::genRandAlphaNumber(16);

        if ($request->role ==  'business') {
            $user = User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'password' => Hash::make($password),
                'subdomain' => $request->subdomain,
                'role' => $request->role,
                'company' => $request->company,
                'country' => $request->country,
                'nit' => $request->nit,
                'address' => $request->address
            ]);
            $team = Team::forceCreate([
                'user_id' => $user->id,
                'name' => explode(' ', $user->name, 2)[0]."'s Team",
                'personal_team' => true,
                'subdomain' => $request->subdomain,
                'bg_color' =>'#7929E2',
                'style_login' => '.logo {
                    width: 80%
                }
                .btn-login {
                    background-color: #7929E2;
                    color: #ffffff;
                    border-radius: 3rem;
                }'
            ]);
            $user->current_team_id = $team->id;
            $user->update_password = 1;
            $user->save();
        } else {
            $user = User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'password' => Hash::make($password),
                'subdomain' => null,
                'role' => $request->role,
            ]);

            $user->detail = str_replace("\r","<br>", $request->detail);
            $user->save();
        }

        //enviar correo al usuario con el password
        $allow_to_send = 1;
        if ($allow_to_send) {
            try {
                Mail::to($user)->send(new EmailNewUser($user, $password));
                $email = Consult::getStoreConfig('notification_email');
                Mail::to($email)->send(new EmailNewUser($user, $password));
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        flash('Nuevo usuario creado')->success();
        return redirect()->route('admin.users');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        flash('Nuevo usuario editado')->success();
        return redirect()->route('admin.users');
    }




}
