<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'user_logs';

    protected $fillable = ['user_id', 'action', 'reference', 'ip_address'];

    protected $hidden = [ ];

    protected function user()
    {
        return $this->belongsTo('App\Models\Users\User');
    }
}
