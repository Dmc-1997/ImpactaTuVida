<?php

namespace App\Http\Livewire\Admin\Courses\Chapters;

use Livewire\Component;
use App\Models\Courses\CourseChapter;

class EditName extends Component
{
    public $chapter;
    public $originName;
    public $view2 = 'admin.courses.chapters.show';

    public function render()
    {
        //$chapter = CourseChapter::find($this->chapter->id);
        $this->originName = 11;

        return view('livewire.admin.courses.chapters.index', ["originName" => $this->originName]);
    }

/*
    public function default()
    {
        $this->item_id = '';
        $this->chapter_name = '';
        $this->originName = '';
    }

    public function edit($id)
    {
        $chapter = CourseChapter::find($id);
        $this->item_id = $id;
        $this->chapter_name = $chapter->chapter_name;
        $this->isEditing = true;
        $this->view = 'admin.courses.chapters.edit';

    }

    public function update()
    {
        CourseChapter::whereId($this->item_id)->update([
            'chapter_name' => $this->chapter_name
        ]);
        $this->isEditing = false;
        $this->view = 'admin.courses.chapters.show';

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

*/


}
