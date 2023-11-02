<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'category_id', 'childcategory_id', 'subcategory_id', 'language_id', 'user_id',
        'title','short_detail', 'detail',  'price', 'discount_price',
        'day','video', 'video_url', 'featured','requirement',
        'url','slug','status','preview_image', 'type',
        'preview_type', 'duration',
        'pin_id', 'plan_id', 'minutes', 'valid_until', 'it_includes',
        'prize', 'leadership', 'proactivity', 'teams', 'position',
        'classes_to_certificate', 'seen', 'academy', 'bg_image',
        'action_image',
        'action_image_path',
        'action_image_url',
        'action_button',
        'action_button_text',
        'action_button_url',
        'more_selling',
        'preview_image_video',
        'cover_image'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\Users\User', 'user_id', 'id');
    }

    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like', '%' .$searchTerm. '%');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Courses\Category','category_id','id');
    }

    /*
    public function chapter()
    {
        return $this->hasMany('App\CourseChapter','course_id');
    }

    public function whatlearns()
    {
        return $this->hasMany('App\WhatLearn','course_id');
    }

    public function include()
    {
        return $this->hasMany('App\CourseInclude','course_id');
    }

    public function related()
    {
        return $this->hasMany('App\RelatedCourse','course_id');
    }

    public function question()
    {
        return $this->hasMany('App\Question','course_id');
    }

    public function answer()
    {
        return $this->hasMany('App\Answer','course_id');
    }

    public function announsment()
    {
        return $this->hasMany('App\Announcement','course_id');
    }

    public function courseclass()
    {
        return $this->hasMany('App\CourseClass','course_id');
    }

    public function favourite()
    {
        return $this->hasMany('App\Favourite','course_id');
    }

    public function wishlist()
    {
        return $this->hasMany('App\Wishlist','course_id');
    }

    public function review()
    {
        return $this->hasMany('App\ReviewRating','course_id');
    }

    public function reportreview()
    {
        return $this->hasMany('App\ReportReview','course_id');
    }

    public function instructor()
    {
        return $this->hasMany('App\Question','instructor_id');
    }

    public function order()
    {
        return $this->hasMany('App\Order','course_id');
    }

    public function pending()
    {
        return $this->hasMany('App\PendingPayout','course_id');
    }



    public function language()
    {
        return $this->belongsTo('App\CourseLanguage','language_id','id');
    }
    */

}
