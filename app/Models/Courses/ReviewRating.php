<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ReviewRating extends Model
{

    protected $table = 'review_ratings';

    protected $fillable = [
        'course_id', 'user_id', 'learn', 'price', 'value', 'review', 'status', 'approved', 'featured', 
    ];

    public function courses()
    {
        return $this->belongsTo('App\Models\Courses\Course', 'course_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Users\User','user_id', 'id');
    }
}
