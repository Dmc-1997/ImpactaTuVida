<?php

namespace App\Http\Controllers\Business;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\Users\User;

class BusinessController extends Controller
{
    public function login($subdomian)
    {
        if (Auth::check()) {
            return redirect()->route('valid.account');
        }
        $team = Team::whereSubdomain($subdomian)->first();
        if (is_null($team)) {
            return redirect()->route('ingresar');
        }

        $bg_image = asset('imagenes/bgs/'.$team->bg_image);

        if (file_exists(public_path() . '/imagenes/logos/' . $team->logo) && $team->logo != '' && $team->logo != 'default.jpg') {
            $logo = asset('imagenes/logos/'.$team->logo);
        } else {
            $logo = asset('/images/logoinv.png');
        }

        return view('businesses.auth.login', compact('bg_image', 'logo', 'team'));
    }

    public function forgotpassword($subdomian)
    {
        if (Auth::check()) {
            return redirect()->route('valid.account');
        }
        $team = Team::whereSubdomain($subdomian)->first();
        if (is_null($team)) {
            return redirect()->route('ingresar');
        }

        $bg_image = asset('imagenes/bgs/'.$team->bg_image);

        if (file_exists(public_path() . '/imagenes/logos/' . $team->logo) && $team->logo != '' && $team->logo != 'default.jpg') {
            $logo = asset('imagenes/logos/'.$team->logo);
        } else {
            $logo = asset('/images/logoinv.png');
        }

        return view('businesses.auth.forgot-password', compact('bg_image', 'logo', 'team'));

    }



    public function index()
    {
        $dashboard = (object)[];

        return view('businesses.dashboard')->with('dashboard', $dashboard);
    }



    public function configuration()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        if ($user->update_password) {
            flash('Cambia la contraseña antes que se venza');
            return redirect()->route('members.profilepw');
        }
        $team = Team::whereUser_id($user->id)->wherePersonal_team(1)->first();

        $logo = "";
        $bg_image = "";
        $team_id = "";
        
        //Hay que configurar que cuando no haya un equpo, redirija a otra pestaña.

        if(isset($team)){
            $logo = $team->logo;
            $bg_image = $team->bg_image;
            $team_id = $team->team_id;
        }
        

        return view('businesses.configuration', compact('team', 'logo', 'bg_image', 'team_id'));
    }

    public function images(Request $request)
    {
        $id = $request->id;
        $team_id = $request->team_id;


        if ($id==0) {
            $name = 'logo_'.$team_id.'.png';
            $path = public_path().'/imagenes/logos/';
            if($request->hasFile('image')) {
                if(file_exists($path.$name)){
                    unlink($path.$name);
                }
                $file = $request->file('image');
                $file->move($path,$name);
                flash('Logo editado correctamente')->success();

                $team = Team::find($team_id);
                $team->logo = $name;
                $team->save();
            }
        }

        if ($id==1) {
            $name = 'bg_image_'.$team_id.'.png';
            $path = public_path().'/imagenes/bgs/';
            if($request->hasFile('image')) {
                if (file_exists($path.$name)){
                    unlink($path.$name);
                }
                $file = $request->file('image');
                $file->move($path,$name);
                flash('Background del login editado correctamente')->success();

                $team = Team::find($team_id);
                $team->bg_image = $name;
                $team->save();
            }
        }


        return redirect()->route('businesses.configuration');
    }

}
