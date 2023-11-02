<?php

namespace App\Models\MySettings;

use Illuminate\Database\Eloquent\Model;

class MySetting extends Model
{
    protected $table = 'mysettings';

    protected $fillable = [
        'option', 'value', 'label',
        'description'
    ];

    protected $hidden = [ ];

}