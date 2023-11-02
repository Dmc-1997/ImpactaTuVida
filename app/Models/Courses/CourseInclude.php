<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CourseInclude extends Model
{

    protected $table = 'course_includes';

    protected $fillable = [
        'course_id', 'detail', 'status', 'icon'
    ];

    public function courses()
    {
        return $this->belongsTo('App\Models\Courses\Course', 'course_id', 'id');
    }
}
