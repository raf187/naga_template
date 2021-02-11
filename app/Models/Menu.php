<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function extra()
    {
        return $this->belongsToMany('App\ExtrasBoll');
    }
}
