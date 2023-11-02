<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;

class EnvConfig extends Model
{
    protected $table = 'env_config';

    protected $fillable = ['variable', 'value', 'label', 'description', 'active'];

    protected $hidden = [ ];

}