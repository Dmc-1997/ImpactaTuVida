<?php

namespace App\Http\Livewire\Members\Courses;

use Livewire\Component;

use App\Models\Courses\Course;
use App\Models\Courses\CourseChapter;
use App\Models\Courses\CourseClass;
use App\Models\Courses\CourseFollowup;

class Player extends Component
{
    protected $queryString = [
        'selectedClass' => ['except' => 0]
    ];


    public $course;
    public $course_id;

    public $selectedChapter = 0;
    public $selectedClass = 0;
    public $video_url;
    public $title;
    public $subtitle;
    public $type = 'video';
    public $duration;
    public $previous = '';
    public $actual = '';
    public $next = '';
    public $list = [];

    public $followup_id;
    public $seen;
    public $progress = 0;

    public $total_completed = 0;

    protected $listeners = ['playThisClass', 'updateFollowup'];

    public function mount()
    {
        $this->course_id = $this->course->id;
        $this->myPagination();
        if ($this->selectedClass) {
            $this->iniClass($this->selectedClass);
        } else {
            $this->historyClass();
        }
    }

    public function render()
    {

        return view('livewire.members.courses.player');
    }

    public function myPagination()
    {
        $coursechapters = CourseChapter::whereCourse_id($this->course_id)->whereStatus(1)->get();
        $couserclasses = CourseClass::whereCourse_id($this->course_id)->whereStatus(1)->get();

        $list = array();
        foreach($coursechapters as $chapter) {
            if($chapter->status == '1') {
                foreach($couserclasses as $class) {
                    if($class->coursechapter_id == $chapter->id) {
                        $list[] = $class->id;
                    }
                }
            }
        }
        $this->list = $list;
    }

    public function playThisClass($selectedChapter, $selectedClass, $title, $subtitle, $type, $video_url, $duration)
    {
        $this->selectedChapter = $selectedChapter;
        $this->selectedClass = $selectedClass;
        $this->video_url     = $video_url;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->type = $type;
        $this->duration = $duration;

        $this->actual = array_search($this->selectedClass, $this->list);
        $this->previous = $this->actual - 1;
        $this->next = $this->actual + 1;

        $followup = CourseFollowup::whereUser_id(auth()->user()->id)
                ->whereCourse_id($this->course_id)
                ->whereCoursechapter_id($this->selectedChapter)
                ->whereCourseclass_id($this->selectedClass)
                ->first();
        if (is_null($followup)) {
            $followup = new CourseFollowup();
            $followup->duration         = 0;
            $followup->progress         = 0;
            $followup->seen             = 0;
            $followup->course_id        = $this->course_id;
            $followup->coursechapter_id = $this->selectedChapter;
            $followup->courseclass_id   = $this->selectedClass;
            $followup->user_id   = auth()->user()->id;
            $followup->save();
        }


        if ($this->type == 'video') {
            $this->followup_id = $followup->id;
            $this->seen = $followup->seen;
            $this->progress = $followup->progress;
            $this->dispatchBrowserEvent('play-this-video', ['video_url' => $video_url, 'progress' => $this->progress]);
            $this->dispatchBrowserEvent('class-followup');
        } elseif ($this->type == 'pdf' || $this->type == 'excel') {
            $followup->duration         = 1;
            $followup->progress         = 1;
            $followup->seen             = 100;
            $followup->save();
        }
    }

    public function selectItem()
    {
        $chapters = CourseChapter::whereCourse_id($this->course_id)->get();
        foreach ($chapters as $chapter) {
            $chapter->course_classes = CourseClass::whereCourse_id($this->course_id)->whereCoursechapter_id($chapter->id)->whereStatus(1)->orderBy('position', 'asc')->get();
        }

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

        $this->selectedClass = $items[0]->id;
        $this->video_url = $items[0]->url;
        $this->title = $items[0]->chapter_name;
        $this->subtitle = $items[0]->title;

    }

     /**
     * Actualización de seguimiento
     */
    public function updateFollowup($duration, $progress)
    {
        $followup = CourseFollowup::find($this->followup_id);
        $followup->duration         = $duration;
        if ($progress > $followup->progress && $duration > 0) {
            $followup->progress     = $progress;
            $scope = $progress / $duration * 100;
            $followup->seen         = $scope;
            if ($scope > 90 && $followup->completed == 0) {
                $followup->completed = 1;
            }
        }
        $followup->save();

        $this->seen = $followup->seen;
        $this->dispatchBrowserEvent('class-followup');

        $this->total_completed = CourseFollowup::whereUser_id(auth()->user()->id)->whereCourse_id($this->course_id)->sum('completed');
    }

    public function iniClass($selectedClass)
    {

        $class = CourseClass::whereCourse_id($this->course_id)->whereId($selectedClass)->whereStatus(1)->first();
        if (is_null($class)) {

        } else {

            $chapter = CourseChapter::find($class->coursechapter_id);

            $selectedChapter = $class->coursechapter_id;
            $selectedClass = $class->id;
            $title = $chapter->chapter_name;
            $subtitle = $class->title;
            $type = $class->type;
            $video_url = $class->url;
            $duration = $class->duration;

            $this->dispatchBrowserEvent('content-playing', ['selectedChapter' => $selectedChapter, 'selectedClass' => $this->selectedClass]);

            $this->playThisClass($selectedChapter, $selectedClass, $title, $subtitle, $type, $video_url, $duration);
        }

    }

    public function historyClass()
    {
        $user_id = auth()->user()->id;
        $followup = CourseFollowup::whereCourse_id($this->course_id)->whereUser_id($user_id)->orderBy('updated_at', 'desc')->first();
        if (!is_null($followup)) {
            $this->iniClass($followup->courseclass_id);
        }
    }

    public function previous()
    {
        $this->selectedClass = $this->list[$this->previous];
        $this->iniClass($this->selectedClass);
    }

    public function next()
    {
        $this->selectedClass = $this->list[$this->next];
        $this->iniClass($this->selectedClass);
    }

}
