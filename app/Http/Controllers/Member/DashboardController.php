<?php

namespace App\Http\Controllers\Member;

use App\Helpers\Consult;
use App\Helpers\Utils;
use App\Http\Controllers\Controller;
use App\Models\Courses\Course;
use App\Models\Courses\CourseFollowup;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard = (object)[];

        //obtener el listado de cursos que ya está cursando
        $current_team_id = Auth::user()->current_team_id;
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        if ($user->update_password) {
            flash('Cambia la contraseña antes que se venza');
            return redirect()->route('members.profilepw');

        }

        $dashboard->time_seen_total = CourseFollowup::whereUser_id($user_id)->sum('progress');
        $dashboard->time_seen_average = CourseFollowup::whereUser_id($user_id)->avg('progress');                
        $dashboard->total_courses_in_progress = CourseFollowup::select('course_id')
        ->where('user_id', $user_id)
        ->where('seen', '>', 0)
        ->groupBy('course_id')
        ->get()
        ->count();

        $dashboard->total_courses_approved = CourseFollowup::where('user_id', $user_id)
        ->where('completed', 1)
        ->count('course_id');

        $followps = CourseFollowup::whereUser_id($user_id)->where('seen', '>', 0)->get();
        $list = array();
        foreach ($followps as $followp) {
            $list[] = $followp->course_id;
        }

        $completed_courses =CourseFollowup::whereUser_id($user_id)
        ->where('seen', '>', 0)
        ->where('completed', 1)
        ->get();
        $completed_courses_list = array();
        foreach ($completed_courses as $completed_c) {
            $completed_courses_list[$completed_c->course_id] = [$completed_c->completed];
        }


        $courses = Course::whereStatus('1')->whereIn('id', $list)->orderBy('id', 'asc')->get();
        foreach ($courses as $course) {
            $course->restriction = Consult::hasRestriction($course->id, $current_team_id);
            if(isset($completed_courses_list[$course->id])){
                $course->is_completed = $completed_courses_list[$course->id];
            }else{
                $course->is_completed = 0;
            }
        }

        return view('members.dashboard', compact('dashboard', 'courses'));

    }

    public function profile()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        if ($user->update_password) {
            flash('Cambia la contraseña antes que se venza');
            return redirect()->route('members.profilepw');

        }

        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        return view('members.profile', compact('user'));
    }

    public function profilepw()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        return view('members.profilepw', compact('user'));
    }

    public function updateMyAvatar(Request $request)
    {
        //dd(storage_path('app/public'));


        //dd($request);
        $user = User::find(auth()->user()->id);
        if ($request->has('imagebase64') && $request->varimg) {
            $old_name = $user->profile_photo_path;

            $data       = $request->imagebase64;
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $path = storage_path('app/public/profile-photos');

            $name = Utils::genRandAlphaNumber(64).".png";
            $target_path = $path.'/'.$name;

            file_put_contents($target_path, $data);

            $user->profile_photo_path  = 'profile-photos/'.$name;
            $user->save();


            if (is_null($old_name) || $old_name == '' || $old_name == 'default.png') {

            } else {
                if (file_exists($path.'/'.$old_name)) {
                    unlink($path.'/'.$old_name);
                }
            }

            flash('Avatar actualizado' )->success();

        }

        return redirect()->back();
    }
}
