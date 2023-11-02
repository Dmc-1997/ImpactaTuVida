<?php

namespace App\Models\Teams;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
	protected $table = 'team_user';

    protected $fillable = ['team_id', 'user_id', 'role'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team','team_id', 'id');
    }

}