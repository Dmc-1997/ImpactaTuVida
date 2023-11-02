<?php

namespace App\Http\Controllers\Home;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use App\Models\Users\User;
use App\Models\Courses\Category;
use App\Models\Courses\Course;
use App\Models\Courses\CourseChapter;
use App\Models\Courses\CourseClass;
use App\Models\Courses\CourseInclude;
use App\Models\Courses\WhatLearn;
use App\Models\Courses\RelatedCourse;
use App\Models\Courses\ReviewRating;
use App\Models\Courses\CourseFollowup;

use DB;
use Image;
use Illuminate\Support\Facades\Auth;

/*
use App\Wishlist;
use App\Question;
use App\Announcement;
use App\Order;
use App\Answer;
use App\Cart;
use App\ReportReview;
use App\SubCategory;
use App\QuizTopic;
use App\Quiz;
use Illuminate\Support\Facades\Auth;
use Redirect;
*/



class CourseController extends Controller
{

    public function courses()
    {
        $categories = Category::whereStatus('1')->orderBy('position', 'ASC')->get();

        $courses = Course::whereAcademy(0)->whereStatus('1')->orderBy('position', 'ASC')->get();
        $comments = ReviewRating::whereStatus('1')->orderBy('id', "desc")->take(10)->get();

        return view('home.courses', compact('categories', 'courses', 'comments'));
    }

    public function coursesByCategory($slug)
    {
        $categories = Category::whereSlug($slug)->whereStatus('1')->orderBy('position', 'ASC')->get();
        $courses = Course::whereAcademy(0)->whereStatus('1')->orderBy('position', 'ASC')->get();

        return view('home.courses', compact('categories', 'courses'));
    }




    /**
     * Detalle del curso
     */
    public function CourseDetailPage($id, $slug)
    {
        $course = Course::findOrFail($id);

        $coursechapters = CourseChapter::where([
            ['course_id', '=', $course->id],
            ['status', '=', "1"]
        ])
        ->orderBy('position', 'asc')
        ->get();

        $courseclass    = CourseClass::whereCourse_id($course->id)->whereStatus("1")->orderBy('position', 'asc')->get();

		$courseinclude  = CourseInclude::where('course_id','=',$id)->get();
		$whatlearns     = WhatLearn::where('course_id','=',$id)->get();
		$relatedcourse  = RelatedCourse::where('main_course_id','=',$id)->get();
		$coursereviews  = ReviewRating::where('course_id','=',$id)->get();
        $reviews        = ReviewRating::where('course_id','=',$id)->where('status', '1')->get();

        $rated = ReviewRating::whereCourse_id($id)->orderBy('id', 'desc')->avg('value');
        $rated = round($rated, 2);

        $allow = 0;
        if (Auth::check()) {
            $user  = auth()->user();
            $allow = Helper::checkPermissionsToThisCourse($user, $course);
            $allow = Helper::checkPermissionsToThisCourseForTeams($user, $course, $allow);
        }

        $tracking = CourseFollowup::select('user_id')->whereCourse_id($course->id)->distinct('user_id')->count();
        $course->tracking = $tracking;

        //echo 'membersia requerida:' . $course->plan_id;
        //dd($allow);
        $courses = Course::where("category_id", $course->category_id)->get()->except($course->id);
        return view('home.course', compact('course','courses','courseinclude','whatlearns','coursechapters','courseclass', 'coursereviews', 'reviews', 'relatedcourse', 'allow', 'rated'));



		if (Auth::check()) {
			$bundle = Order::where('user_id', Auth::User()->id)->where('bundle_course_id', '!=', NULL)->get();
			$course_id = array();
			foreach($bundle as $b) {
				array_push($course_id, $b->bundle_course_id);
			}

			$course_id = array_values(array_filter($course_id));

            $course_id = array_flatten($course_id);
            //puede ver si
            //cumple los requerimientos de la membresia
            $user  = auth()->user();
            $allow = checkPermissionsToThisCourse($user, $course);

			return view('home.course', compact('course','courseinclude','whatlearns','coursechapters','courseclass', 'coursereviews', 'reviews', 'relatedcourse', 'course_id', 'allow'));

		} else {
            $allow = 0;
			return view('home.course', compact('course','courseinclude','whatlearns','coursechapters','courseclass', 'coursereviews', 'reviews', 'relatedcourse', 'allow'));
		}
    }








    /**
     * Contenido del curso
     */
    public function CourseContentPage($id)
    {
        $course = Course::findOrFail($id);

        $courseinclude  = CourseInclude::where('course_id','=',$id)->get();
        $whatlearns     = WhatLearn::where('course_id','=',$id)->get();
        $coursechapters = CourseChapter::where('course_id','=',$id)->get();
        $coursequestions= Question::where('course_id','=',$id)->get();
        $courseclass    = CourseClass::get();
        $announsments   = Announcement::where('course_id','=',$id)->get();

        if (Auth::check()) {
            return view('front.course_content', compact('course','courseinclude','whatlearns','coursechapters','courseclass', 'coursequestions', 'announsments'));
        }

        return Redirect::route('login')->withInput()->with('delete', 'Por favor ingresa el usuario y clave para poder tener acceso a esta área');

    }


}
