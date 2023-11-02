<?php

namespace App\Http\Livewire\Members\Courses;

use Livewire\Component;

use App\Models\Courses\Course;
use App\Models\Courses\CourseChapter;
use App\Models\Courses\CourseClass;
use App\Models\Courses\CourseFollowup;

class Menu extends Component
{
    // protected $queryString = [
    //     'selectedClass' => ['except' => 0]
    // ];


    public $course;
    public $course_id;

    public $selectedClass = 0;
    public $selectedChapter = 0;

    public $chapters;
    //public $course_classes;

    public $completed = 1;

    protected $listeners = ['contentPlaying'];

    public function mount()
    {
        $this->course_id = $this->course->id;

    }

    public function render()
    {
        //$this->dispatchBrowserEvent('play-this-class2', ['selectedClass' => $this->selectedClass]);

        $this->chapters = CourseChapter::whereCourse_id($this->course_id)->get();

        $iter = 1;
        foreach ($this->chapters as $chapter) {
            $course_classes = CourseClass::whereCourse_id($this->course_id)->whereCoursechapter_id($chapter->id)->whereStatus(1)->orderBy('position', 'asc')->get();
            $chapter->iter = $iter++;
            foreach ($course_classes as $class) {
                $followup = CourseFollowup::whereUser_id(auth()->user()->id)
                    ->whereCourse_id($this->course_id)
                    ->whereCoursechapter_id($chapter->id)
                    ->whereCourseclass_id($class->id)
                    ->first();
                    $completed = 0;
                    $seen = 0;
                    if (!is_null($followup)) {
                        $completed = $followup->completed;
                        $seen = $followup->seen;
                    }
                    $class->completed = $completed;
                    $class->seen = $seen;
            }

            $chapter->course_classes = $course_classes;

        }

        return view('livewire.members.courses.menu');
    }

    public function selectThisClass($selectedChapter, $selectedClass, $video_url, $title, $subtitle, $type, $duration)
    {
        $this->selectedClass = $selectedClass;
        $this->selectedChapter = $selectedChapter; 

        //enviar a la js
        $this->dispatchBrowserEvent('play-this-class', ['selectedChapter' => $selectedChapter, 'selectedClass' => $selectedClass, 'video_url' => $video_url, 'title' => $title, 'subtitle' => $subtitle, 'type' => $type, 'duration' => $duration]);

    }

    public function selectThisClassFromModal($selectedChapter, $selectedClass, $video_url, $title, $subtitle, $type, $duration)
    {
        $this->selectThisClass($selectedChapter, $selectedClass, $video_url, $title, $subtitle, $type, $duration);

        //enviar a la js
        $this->dispatchBrowserEvent('close-menu-modal');

    }



    public function contentPlaying($selectedChapter, $selectedClass)
    {
        $this->selectedChapter = $selectedChapter;
        $this->selectedClass = $selectedClass;

    }
}
