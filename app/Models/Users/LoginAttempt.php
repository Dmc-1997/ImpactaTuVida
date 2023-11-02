<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class LoginAttempt extends Model
{
    protected $table = 'login_attempts';

    protected $fillable = ['email', 'reference', 'ip_address'];

    protected $hidden = [ ];

}
