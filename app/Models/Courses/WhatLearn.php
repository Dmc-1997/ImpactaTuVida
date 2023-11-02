<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WhatLearn extends Model
{
	
    protected $table = 'what_learns';

    protected $fillable = [
        'course_id', 'detail', 'status'
    ];

    public function courses()
    {
        return $this->belongsTo('App\Models\Courses\Course', 'course_id', 'id');
    }
}
