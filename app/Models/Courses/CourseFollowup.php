<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CourseFollowup extends Model
{

    protected $table = 'course_followups';

    protected $fillable = [
        'duration', 'progress', 'seen', 'course_id', 'coursechapter_id', 'courseclass_id', 'user_id', 'completed'
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

    public function courseclasses()
    {
        return $this->belongsTo('App\Models\Courses\CourseClass', 'courseclass_id', 'id');
    }

}