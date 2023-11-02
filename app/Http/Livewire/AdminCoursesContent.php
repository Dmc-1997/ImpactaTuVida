<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Courses\Course;
use App\Models\Courses\CourseChapter;
use App\Models\Courses\CourseClass;
use Illuminate\Support\Str;

class AdminCoursesContent extends Component
{
    public $course;
    public $item_id = '';
    public $chapter_name;
    public $chapter_duration;
    public $view = 'admin.courses.content.create';

    public $course_id;
    public $coursechapter_id;
    public $coursechapter_name;
    public $title;
    public $duration;
    public $featured;
    public $class_status;
    public $type;
    public $url;
    public $size;
    public $image;
    public $video;
    public $pdf;
    public $zip;
    public $preview_video;
    public $date_time;

    public $preview_type;
    public $preview_url;

    public $course_class;


    public $isEditingClass;

    public $editPosition = 0;
    public $position = 0;

    protected $listeners = ['adminClassDelete'];


    public function render()
    {
        $chapters = CourseChapter::whereCourse_id($this->course->id)->orderBy('position', 'asc')->get();

        $course_classes = CourseClass::whereCourse_id($this->course->id)->orderBy('position', 'asc')->get();

        return view('livewire.admin-courses-content', ['chapters' => $chapters, 'course_classes' => $course_classes]);
    }

    public function default()
    {
        $this->item_id = '';
        $this->chapter_name = '';
        $this->chapter_duration = '';
        $this->course_id = '';
        $this->coursechapter_id = '';
        $this->coursechapter_name = '';
        $this->title = '';
        $this->duration = '';
        $this->featured = '';
        $this->class_status = '';
        $this->url = '';
        $this->size = '';
        $this->image = '';
        $this->video = '';
        $this->pdf = '';
        $this->zip = '';
        $this->preview_video = '';
        $this->preview_type = '';
        $this->type = '';
        $this->preview_url = '';
        $this->date_time = '';
        $this->course_class = "";

    }


    public function create()
    {
        $this->view = 'admin.courses.content.create';
    }

    public function store()
    {
        $this->validate([
            'chapter_name' => 'required'
        ]);

        CourseChapter::create([
            'chapter_name' => $this->chapter_name,
            'duration'     => $this->chapter_duration,
            'course_id'    => $this->course->id,
            'status'       => 1
        ]);

        $this->default();

    }

    public function edit($id)
    {
        $chapter = CourseChapter::find($id);
        $this->item_id = $id;
        $this->chapter_name = $chapter->chapter_name;
        $this->duration = $chapter->chapter_duration;
        $this->view = 'admin.courses.content.edit';

    }

    public function update()
    {
        CourseChapter::whereId($this->item_id)->update([
            'chapter_name' => $this->chapter_name,
            'duration' => $this->chapter_duration
        ]);
        $this->view = 'admin.courses.content.create';

    }

    public function changeStatus($id)
    {
        $chapter = CourseChapter::find($id);
        if($chapter->status) {
            $chapter->status = '0';
        } else {
            $chapter->status = '1';
        }

        $chapter->save();
    }

    public function delete($item_id)
    {
        $chapter = CourseChapter::find($item_id);
        $chapter->delete();
    }

    public function createClass($id)
    {
        $chapter = CourseChapter::find($id);
        $this->item_id = $id;
        $this->coursechapter_name = "Crear Clase para " . $chapter->chapter_name;
        $this->coursechapter_id = $id;
        $this->course_id =  $chapter->course_id;
        $this->isEditingClass = 0;
    }

    public function chapterClassStore()
    {
        $this->validate([
            'title' => 'required'
        ]);

        CourseClass::create([
            'course_id'        => $this->course->id,
            'coursechapter_id' => $this->coursechapter_id,
            'title'            => $this->title,
            'duration'         => $this->duration,
            'featured'         => '0',
            'status'           => '1',
            'type'             => $this->type,
            'url'              => $this->url,
            'size'             => $this->size,
            'image'            => $this->image,
            'video'            => $this->video,
            'pdf'              => $this->pdf,
            'zip'              => $this->zip,
            'preview_video'    => $this->preview_video,
            'preview_type'     => $this->preview_type,
            'preview_url'      => $this->preview_url,
            'date_time'        => $this->date_time
        ]);

        $this->dispatchBrowserEvent('chapter-class-stored', ['newName' => 1]);
        $this->default();

    }

    public function editClass($id)
    {
        $course_class = CourseClass::find($id);
        $chapter = CourseChapter::find($course_class->coursechapter_id);

        $this->item_id = $id;
        $this->coursechapter_name = "Editar Clase para "  . $chapter->chapter_name;
        $this->coursechapter_id   = $id;
        $this->course_id          = $course_class->course_id;
        $this->title              = $course_class->title;
        $this->duration           = $course_class->duration;
        $this->type               = $course_class->type;
        $this->url                = $course_class->url;
        $this->size               = $course_class->size;
        $this->image              = $course_class->image;
        $this->video              = $course_class->video;
        $this->pdf                = $course_class->pdf;
        $this->zip                = $course_class->zip;
        $this->preview_video      = $course_class->preview_video;
        $this->preview_type       = $course_class->preview_type;
        $this->preview_url        = $course_class->preview_url;
        $this->date_time          = $course_class->date_time;
        $this->isEditingClass     = 1;

        $this->course_class = $course_class;
    }

    public function chapterClassUpdate()
    {
        $course_class = CourseClass::find($this->item_id);
        $course_class->title              = $this->title;
        $course_class->duration           = $this->duration;
        $course_class->type               = $this->type;
        $course_class->url                = $this->url;
        $course_class->size               = $this->size;
        $course_class->image              = $this->image;
        $course_class->video              = $this->video;
        $course_class->pdf                = $this->pdf;
        $course_class->zip                = $this->zip;
        $course_class->preview_video      = $this->preview_video;
        $course_class->preview_type       = $this->preview_type;
        $course_class->preview_url        = $this->preview_url;
        $course_class->date_time          = $this->date_time;
        $course_class->save();

        $this->dispatchBrowserEvent('chapter-class-stored', ['newName' => 1]);
        $this->default();

    }


    public function changeClassStatus($id)
    {
        $course_class = CourseClass::find($id);
        if ($course_class->status) {
            $course_class->status = '0';
        } else {
            $course_class->status = '1';
        }

        $course_class->save();
    }

    public function changeClassFeatured($id)
    {
        $course_class = CourseClass::find($id);
        if ($course_class->featured) {
            $course_class->featured = '0';
        } else {
            $course_class->featured = '1';
        }

        $course_class->save();
    }

    public function editPosition($item_id)
    {
        $data = CourseClass::find($item_id);
        $this->position = $data->position;
        $this->editPosition = $data->id;
    }

    public function updatePosition($item_id)
    {
        $this->validate([
            'position' => 'numeric'
        ]);

        $data = CourseClass::find($item_id);
        $data->position = $this->position;
        $data->save();

        $this->editPosition = 0;
        $this->position = 0;

    }

    public function decPosition($id)
    {
        $chapter = CourseChapter::find($id);
        $chapter->decrement('position');
    }

    public function incPosition($id)
    {
        $chapter = CourseChapter::find($id);
        $chapter->increment('position');
    }

    public function adminClassDelete($id)
    {
        CourseClass::whereId($id)->delete();

    }
}
