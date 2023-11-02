<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class UserAlert extends Model
{
    protected $table = 'user_alerts';

    protected $fillable = ['user_id', 'title', 'color', 'alert', 'seen'];

    protected $hidden = [ ];

    protected function user()
    {
        return $this->belongsTo('App\Models\Users\User');
    }
}
