<?php

namespace App\Models\Courses;
use Illuminate\Database\Eloquent\Model;


class CourseChapter extends Model
{
    protected $table = 'course_chapters';

    protected $fillable = [
        'course_id',
        'chapter_name',
        'short_number',
        'status',
        'duration',
        'position'
    ];

    public function courseclass()
    {
        return $this->hasMany('App\Models\Courses\CourseClass', 'coursechapter_id');
    }

    public function courses()
    {
        return $this->belongsTo('App\Models\Courses\Course', 'course_id', 'id');
    }
}
