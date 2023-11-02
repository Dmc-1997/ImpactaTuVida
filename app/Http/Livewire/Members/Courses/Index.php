<?php

namespace App\Http\Livewire\Members\Courses;

use App\Helpers\Consult;
use Livewire\Component;

use App\Models\Users\User;
use App\Models\Courses\Category;
use App\Models\Courses\Course;
use App\Models\Courses\CourseChapter;
use App\Models\Courses\CourseClass;

class Index extends Component
{
    public function render()
    {
        $current_team_id = auth()->user()->current_team_id;

        $courses = Course::whereStatus('1')->orderBy('id', 'asc')->get();
        foreach ($courses as $course) {
            $course->restriction = Consult::hasRestriction($course->id, $current_team_id);
        }

        return view('livewire.members.courses.index', ['courses' => $courses]);
    }
}
