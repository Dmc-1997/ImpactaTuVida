<?php

namespace App\Http\Livewire\Admin\Courses;

use Livewire\Component;

use App\Models\Users\User;
use App\Models\Courses\Category;
use App\Models\Courses\Course;
use App\Models\Courses\CourseChapter;
use App\Models\Courses\CourseClass;

use Livewire\WithPagination;


class Index extends Component
{

    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '25'],
    ];

    public $search = "";
    public $perPage = '25';
    public $typeView = 'table';


    public $confirming;
    public $item_id = '';

    public $position = '';
    public $enterPosition = 0;


    protected $listeners = ['adminCourseDelete'];

    public function render()
    {
        if(!\Session::has('view-card')){
            \Session::put('view-card', 'table');
        }else{
            $this->typeView = \Session::get('view-card');
        }

        $courses = Course::search($this->search)->orderBy('id', 'desc')->paginate($this->perPage);

        return view('livewire.admin.courses.index', ['courses' => $courses]);
    }

    public function clear()
    {
        $this->search = "";
        $this->perPage = '25';
        $this->enterPosition = 0;
    }

    public function editPosition($item_id)
    {
        $data = Course::find($item_id);
        $this->position = $data->position;
        $this->enterPosition = $data->id;
    }

    public function updatePosition($item_id)
    {
        $this->validate([
            'position' => 'numeric'
        ]);

        $data = Course::find($item_id);
        $data->position = $this->position;
        $data->save();

        $this->enterPosition = 0;
        $this->position = 0;

    }

    public function academyCourse($item_id)
    {
        $event = Course::find($item_id);
        $event->academy = !$event->academy;
        $event->save();
    }

    public function featuredCourse($item_id)
    {
        $event = Course::find($item_id);
        if ($event->featured == '1') {
            $event->featured = '0';
        } else {
            $event->featured = '1';
        }
        $event->save();
    }

    public function activeCourse($item_id)
    {
        $event = Course::find($item_id);
        if ($event->status == '1') {
            $event->status = '0';
        } else {
            $event->status = '1';
        }
        $event->save();
    }

    /**
     * Delete
     */
    public function confirmDelete($item_id)
    {
        $this->confirming = $item_id;
    }

    public function cancelDelete($item_id)
    {
        $this->item_id = '';
        $this->confirming = '';
    }

    public function kill($item_id)
    {
       
    }

    public function adminCourseDelete($item_id)
    {
        CourseClass::whereCourse_id($item_id)->delete();
        CourseChapter::whereCourse_id($item_id)->delete();
        Course::find($item_id)->delete();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Elemento eliminado']);
    }

    public function loadTypeView($type)
    {
        \Session::put('view-card', $type);
        $this->typeView = $type;
    }

}
