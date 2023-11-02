<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $translatable = ['title'];

    protected $table = 'categories';

    protected $fillable = [
        'title', 'icon', 'slug', 'featured', 'status', 'subtitle'
    ];


    public function courses()
    {
        return $this->hasMany('App\Models\Courses','category_id');
    }
}
