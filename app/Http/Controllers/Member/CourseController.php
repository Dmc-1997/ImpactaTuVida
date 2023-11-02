<?php

namespace App\Http\Controllers\Member;

use App\Helpers\Consult;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Courses\Course;
use App\Models\Courses\CourseChapter;
use App\Models\Courses\CourseClass;
use App\Models\Courses\CourseInclude;
use App\Models\Courses\WhatLearn;
use App\Models\Courses\RelatedCourse;
use App\Models\Courses\ReviewRating;
use App\Models\Courses\CourseFollowup;
use App\Models\Users\User;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        if ($user->update_password) {
            flash('Cambia la contraseña antes que se venza');
            return redirect()->route('members.profilepw');

        }

        return view('members.courses.index');
    }

    /**
     * Detalle del curso
     */
    public function detail($id, $slug)
    {
        $course = Course::findOrFail($id);

        $coursechapters = CourseChapter::where([
            ['course_id', '=', $course->id],
            ['status', '=', "1"]
        ])->get();

        $courseclass    = CourseClass::whereCourse_id($course->id)->whereStatus("1")->get();

		$courseinclude  = CourseInclude::where('course_id','=',$id)->get();
		$whatlearns     = WhatLearn::where('course_id','=',$id)->get();
		$relatedcourse  = RelatedCourse::where('main_course_id','=',$id)->get();
		$coursereviews  = ReviewRating::where('course_id','=',$id)->get();
        $reviews        = ReviewRating::where('course_id','=',$id)->where('status', '1')->get();

        $rated = ReviewRating::whereCourse_id($id)->orderBy('id', 'desc')->avg('value');
        $rated = round($rated, 2);

        $course_id = $id;
        $allow = 1;

        $tracking = CourseFollowup::select('user_id')->whereCourse_id($course->id)->distinct('user_id')->count();
        $course->tracking = $tracking;

        return view('members.courses.detail', compact('course','courseinclude','whatlearns','coursechapters','courseclass', 'coursereviews', 'reviews', 'relatedcourse', 'course_id', 'allow', 'rated'));

    }

    public function content(Request $request)
    {
        $course_id = $request->id;

        if (Auth::check()) {
            $course = Course::where('id', $course_id)->first();
            if (is_null($course)) {
                flash('Curso no encontrado' )->error();
                return redirect()->route('members.index');
            }

            if (Consult::hasRestriction($course->id, Auth::user()->current_team_id)) {
                flash('Curso con restricción' )->error();
                return redirect()->route('members.index');
            }

            $user  = auth()->user();
            $allow = Helper::checkPermissionsToThisCourse($user, $course);

            if (!$allow) {
                flash('Curso no permitido' )->error();
                return redirect()->route('members.index');
            }

            $chapters = CourseChapter::whereCourse_id($course_id)->get();
            $course_classes = CourseClass::whereCourse_id($course_id)->whereStatus(1)->orderBy('position', 'asc')->get();

            foreach ($chapters as $chapter) {
                $chapter->course_classes = CourseClass::whereCourse_id($course_id)->whereCoursechapter_id($chapter->id)->whereStatus(1)->orderBy('position', 'asc')->get();
            }

            $total_capitulos = 0;
            foreach ($course_classes as $c_class){
                $total_capitulos += 1;
            }

            $total_completed = CourseFollowup::whereUser_id(auth()->user()->id)->whereCourse_id($course_id)->sum('completed');
            $course->total_completed = $total_completed;

            $iter = 0;
            $items = array();
            foreach ($chapters as $chapter) {
                
                if($chapter->status == '1') {
                    foreach($chapter->course_classes as $class) {
                        $class->chapter_name = $chapter->chapter_name;
                        $items[] = $class;
                    }
                }
            }

            $selectedClass = $items[0]->id;
            $video_url = $items[0]->url;
            $title = $items[0]->chapter_name;
            $subtitle = $items[0]->title;
            $course->is_completed = ($total_completed / $total_capitulos) == 1;

            return view('members.courses.content', compact('course', 'chapters', 'course_classes', 'items', 'iter', 'selectedClass', 'video_url', 'title', 'subtitle'));
        }

        return Redirect::route('login')->withInput()->with('delete', 'Debe iniciar sesión para poder ver el video');
    }

}
