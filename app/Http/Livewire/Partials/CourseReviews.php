<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;
use App\Models\Courses\ReviewRating;
use Illuminate\Support\Facades\Auth;

class CourseReviews extends Component
{
    public $data;
    public $color;
    public $course_id;
    public $user_id;

    //rating
    public $rating_value = 0;
    public $rating_review = '';
    public $count = 0;
    public $reviewRating_done = 0;
    public $rated = 0;
    public $reviewsRatings_users = 0;

    public function mount()
    {
        $this->course_id = $this->data->id;
    }

    public function render()
    {

        if (Auth::check()) {
            $this->user_id = Auth::user()->id;
        } else {
            $this->user_id = 0;
        }

        //rating
        $reviewRatings = ReviewRating::whereCourse_id($this->course_id)->orderBy('id', 'desc')->get();
        $this->reviewRating_done = ReviewRating::whereUser_id($this->user_id)->whereCourse_id($this->course_id)->count();
        $this->reviewsRatings_users = ReviewRating::whereCourse_id($this->course_id)->orderBy('id', 'desc')->count();
        $this->rated = ReviewRating::whereCourse_id($this->course_id)->orderBy('id', 'desc')->avg('value');
        $this->rated = round($this->rated, 2);

        $total_reviews = $reviewRatings->count();
        $bars = array();
        $bars[] = $this->getBarData(5, $total_reviews);
        $bars[] = $this->getBarData(4, $total_reviews);
        $bars[] = $this->getBarData(3, $total_reviews);
        $bars[] = $this->getBarData(2, $total_reviews);
        $bars[] = $this->getBarData(1, $total_reviews);

        return view('livewire.partials.course-reviews', [
            'reviewRatings' => $reviewRatings,
            'bars' => $bars
        ]);
    }

    public function getBarData($rated, $total_reviews)
    {
        $total = ReviewRating::whereValue($rated)->whereCourse_id($this->course_id)->count();
        $porc = 0;
        if ($total_reviews > 0) {
            $porc = $total / $total_reviews * 100;
            $porc = round($porc, 0);
        }

        $bar = (object)[];
        $bar->background = 'bg-theme';
        $bar->style_width= $porc;
        $bar->valuenow = $porc;
        $bar->bar_porc = $porc;
        $bar->value = $porc;
        $bar->total = $porc;
        $bar->rated = $rated;

        return $bar;
    }
    /**
     * Actualización de review
     */
    public function saveReviewRating()
    {
        $this->validate([
            'rating_review' => 'required',
            'rating_value' => 'numeric|gt:0'
        ]);

        $reviewRating = new ReviewRating();
        $reviewRating->course_id = $this->course_id;
        $reviewRating->user_id = $this->user_id;
        $reviewRating->learn = 0;
        $reviewRating->price = 0;
        $reviewRating->value = $this->rating_value;
        $reviewRating->review = $this->rating_review;
        $reviewRating->save();
    }
}
