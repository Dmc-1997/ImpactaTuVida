<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;
use App\Models\Courses\ReviewRating;

class Barstars extends Component
{
    public $rated;
    public $course_id;

    public function render()
    {
        $total = ReviewRating::whereValue(5)->whereCourse_id($this->course_id)->orderBy('id', 'desc')->count();

        return view('livewire.partials.barstars', ['total' => $total]);
    }
}
