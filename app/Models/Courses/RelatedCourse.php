<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;

class RelatedCourse extends Model
{
	protected $table = 'related_courses';

    protected $fillable = [ 'user_id', 'course_id', 'main_course_id', 'status' ];

    public function courses()
    {
        return $this->belongsTo('App\Models\Courses\Course', 'course_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Users\User','user_id', 'id');
    }
}
