<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletter_subscriptions';

    protected $fillable = [
        'email',
        'name',
        'status',
        'session_id',
        'ip_address',
        'active',
        'terms'
    ];

    protected $hidden = [ ];

}
