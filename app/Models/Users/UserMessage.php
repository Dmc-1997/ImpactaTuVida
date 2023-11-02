<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $table = 'user_messages';

    protected $fillable = ['user_id', 'message', 'seen'];

    protected $hidden = [ ];

    protected function user()
    {
        return $this->belongsTo('App\Models\Users\User');
    }
}
