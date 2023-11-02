<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;

class StoreConfig extends Model
{
    protected $table = 'store_config';

    protected $fillable = ['option','value', 'label', 'description', 'group', 'text', 'type'];

    protected $hidden = [ ];

}
