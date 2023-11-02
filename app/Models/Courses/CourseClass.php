<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CourseClass extends Model
{

    protected $table = 'course_classes';

    protected $fillable = [
        'course_id', 'coursechapter_id', 'title', 'duration', 'featured', 'status', 'url',
        'size', 'image', 'video', 'pdf', 'zip', 'preview_video', 'date_time',
        'position'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Users\User', 'user_id', 'id');
    }

    public function courses()
    {
        return $this->belongsTo('App\Models\Courses\Course', 'course_id', 'id');
    }

	public function coursechapters()
    {
        return $this->belongsTo('App\Models\Courses\CourseChapter', 'coursechapter_id', 'id');
    }

}
