<?php

namespace App\Http\Livewire\Businesses\Courses;

use App\Models\Courses\Course;
use App\Models\Teams\TeamCourseRestriction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '25'],
    ];

    public $search = "";
    public $perPage = '25';
    public $typeView = 'table';

    public $team_id;

    public function mount()
    {
        $this->team_id = Auth::user()->current_team_id;
    }

    public function render()
    {
        if(!\Session::has('view-card')){
            \Session::put('view-card', 'table');
        }else{
            $this->typeView = \Session::get('view-card');
        }
        
        $courses = Course::search($this->search)->whereStatus(1)->orderBy('id', 'desc')->paginate($this->perPage);

        return view('livewire.businesses.courses.table', ['courses' => $courses]);
    }

    public function inactiveCourse($course_id)
    {
        $restriction = TeamCourseRestriction::whereCourse_id($course_id)->whereTeam_id($this->team_id)->first();
        if (is_null($restriction)) {
            $restriction = new TeamCourseRestriction();
            $restriction->course_id = $course_id;
            $restriction->team_id = $this->team_id;
            $restriction->save();

            $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Se ha restinguido el curso']);
        }

    }

    public function activeCourse($course_id)
    {
        TeamCourseRestriction::whereCourse_id($course_id)->whereTeam_id($this->team_id)->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Se ha activado el curso']);

    }

    public function loadTypeView($type)
    {
        \Session::put('view-card', $type);
        $this->typeView = $type;
    }
}
