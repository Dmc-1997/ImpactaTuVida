<?php

namespace App\Http\Controllers\Business;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Users\User;
use App\Models\Courses\Category;
use App\Models\Courses\Course;
use App\Models\Courses\CourseChapter;
use App\Models\Courses\CourseClass;

use Illuminate\Support\Facades\Auth;

use App\Models\Team;

class CourseController extends Controller
{
    /**
     * Ver todo
     *
     */
    public function index()
    {
        $user_id =  Auth::user()->id;
        $user = User::find($user_id);
        if ($user->update_password) {
            flash('Cambia la contraseña antes que se venza');
            return redirect()->route('members.profilepw');
        }

        $categories = Category::whereStatus('1')->orderBy('position', 'ASC')->get();

        return view('businesses.courses.index', compact("categories"));
    }

}
