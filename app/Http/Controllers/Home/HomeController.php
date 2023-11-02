<?php
namespace App\Http\Controllers\Home;

use App\Helpers\Utils;
use App\Http\Controllers\Controller;
use App\Models\Courses\Course;
use App\Models\Courses\ReviewRating;
use App\Models\Courses\Category;
use App\Models\Team;
use App\Models\TeamInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Users\User;
use Carbon\Carbon;
use App\Models\Teams\TeamUser;



class HomeController extends Controller
{

    public function validAccount(Request $request)
    {
        echo 'validAccount';
        echo '<br />';
        $user = Auth::user();
        session(['login_time' => now()]);

        if ($user->active == 1 && $user->role == 'member') {
            Log::info("Esta pasando por aqui para login 1.");
            $r = route('members.index');
            $find = '://'.$user->subdomain.'.';
            $exist = Utils::existInString($r, $find);
            if (!$exist) {
                $r = str_replace('://', '://'.$user->subdomain.'.', $r);
            }
            return redirect()->away($r);

        } else if ($user->active == 1 && $user->role == 'instructor') {
            Log::info("Esta pasando por aqui para login 2.");
            return redirect()->route('index');

        } else if ($user->active == 1 && $user->role == 'business') {
            Log::info("Esta pasando por aqui para login 3.");
            $r = route('businesses.index');
            $find = '://'.$user->subdomain.'.';
            $exist = Utils::existInString($r, $find);
            if (!$exist) {
                $r = str_replace('://', '://'.$user->subdomain.'.', $r);
            }
            return redirect()->away($r);

        } else if ($user->active == 1 && $user->role == 'admin') {

            Log::info("Esta pasando por aqui para login 4.");
            $r = route('admin.index');
            if (strlen($r) >= strlen(config('app.url')))
            {
                $r = config('app.url').'/admin/index';
            }
            return redirect()->route('admin.index');


        } else if ($user->active == 1 && $user->role == 'superadmin') {
            Log::info("Esta pasando por aqui para login 5.");
            $r = route('admin.index');
            if (strlen($r) >= strlen(config('app.url')))
            {
                $r = config('app.url').'/admin/index';
            }
            return redirect()->route('admin.index');

        } else {
            Log::info("Esta pasando por aqui para login 6...".$user->role);
            
            DB::table('sessions')->where('user_id', '=', Auth::user()->getAuthIdentifier())
                ->where('user_agent', '=', $request->server('HTTP_USER_AGENT'))
                ->delete();

            

            flash('No tiene permisos para ingresar a esta área.')->error();
            


            return redirect()->route('login')->withErrors(['No tiene permisos para ingresar a esta plataforma.']);
        }
    }


    public function terminateUserSession(Request $request)
    {
        
        $user = Auth::user();
        if (Auth::check()) {

            DB::table('sessions')->where('user_id', '=', Auth::user()->getAuthIdentifier())
            ->where('user_agent', '=', $request->server('HTTP_USER_AGENT'))
            ->delete();
 
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            flash('No tiene permisos para ingresar a esta plataforma.')->error();
        }

        return redirect()->route('login')->withErrors(['No tiene permisos para ingresar a esta plataforma.']);
    }

    public function accountSuspended(Request $request)
    {

        return view('suspended');
    }

    public function notAllowed(Request $request)
    {

        return redirect()->away(url('/ingresar'));

    }

    public function index(Request $request)
    {
        $courses = Course::whereStatus('1')->whereFeatured('1')->get();
        $categories = Category::whereStatus('1')->take(6)->get();
        $comments = ReviewRating::whereStatus('1')->orderBy('id', "desc")->take(10)->get();

        return view('home.index', compact('courses', 'categories', 'comments'));
    }

    public function invitation(Request $request)
    {
        //finalice las sesiones que tiene antes de cargar el registro
        if (Auth::check()) {
            /*DB::table('sessions')->where('user_id', '=', Auth::user()->getAuthIdentifier())
            ->where('user_agent', '=', $request->server('HTTP_USER_AGENT'))
            ->delete();*/

            $total_time = (now()->diffInSeconds(session('login_time', now())))/3600;
            /*Auth::user()->total_hours = $user->total_hours + $total_time;
            Auth::user()->save();

            Auth::logout();*/
            $request->session()->invalidate();
            $request->session()->regenerateToken();

        }

        $user_id = $request->user_id;
        $confirmation_code = $request->confirmation_code;
        $now = Carbon::now();

        $user = User::whereId($user_id)->whereConfirmation_code($confirmation_code)->whereDate('code_valid_until', '>', $now)->first();
        if (is_null($user)) { //enviar a vista que contacte al administrador
            Log::info($user_id);
            return view('home.invitation_not_allowed');
        }

        //validar usuario
        $user->active = 1;
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->confirmation_code = null;
        $user->code_valid_until = null;
        $user->update_password = 1;
        $user->save();

        //verificar si el usuario tiene invitación
        $team_invitation = TeamInvitation::whereEmail($user->email)->first();
        if (is_null($team_invitation)) {//no tiene invitacion no permitir ingreso enviar al login
            return redirect()->route('login');
        }

        //si tiene invitación, agregar al grupo
        // $team_user = new TeamUser();
        // $team_user->user_id = $user->id;
        // $team_user->team_id = $team_invitation->team_id;
        // $team_user->save();

        //reset acceso del usuario
        // $user->confirmation_code = null;
        // $user->code_valid_until = null;
        // $user->current_team_id = $team_invitation->team_id;
        // $user->save();

        $team_invitation->delete();

        //autenticar el usuario
        //Auth::login($user, true);
        //Auth::loginUsingId($user->id, true);

        $r = config('app.url').'/ingresar';
        $find = '://'.$user->subdomain.'.';
        $exist = Utils::existInString($r, $find);
        if (!$exist) {
            $r = str_replace('://', '://'.$user->subdomain.'.', $r);
        }
        //dd($r);
        return redirect()->away($r);


        // return redirect()->route('login');

        // return redirect()->route('valid.account');
    }

    public function blog()
    {

        return view('home.blog');
    }

    public function about()
    {
        $comments = ReviewRating::whereStatus('1')->orderBy('id', "desc")->take(10)->get();
        return view('home.about', compact('comments'));
    }

    public function plans()
    {

        return view('home.plans');
    }

    public function lista($subdomain)
    {
        echo 'lista';
    }

    public function endThisSession()
    {
        Log::info("Test de Consola #3");
        if (Auth::check()) {
            //Auth::User()->session_id = 0;
            //Auth::User()->save();
            
            
            $total_time = (now()->diffInSeconds(session('login_time', now())))/3600;
            Auth::user()->total_hours = Auth::user()->total_hours + $total_time;

            Auth::user()->save();
            Log::info("El usuario ".Auth::user()->id." ha acumulado ".$total_time." horas");


            
            //Auth::user()->total_hours
            Auth::logout();

            

            return redirect()->route('login');
        }

        return redirect()->route('home');
    }




}
