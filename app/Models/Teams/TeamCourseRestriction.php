<?php

namespace App\Models\Teams;

use Illuminate\Database\Eloquent\Model;

class TeamCourseRestriction extends Model
{
	protected $table = 'team_course_restrictions';

    protected $fillable = ['team_id', 'course_id'];

    public function course()
    {
        return $this->belongsTo('App\Models\Courses\Course','course_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team','team_id', 'id');
    }

}
