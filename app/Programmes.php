<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programmes extends Model
{
    public function students()
    {
        return $this->hasMany('App\Students');
    }

    public function courses()
    {
        return $this->hasMany('App\Courses');
    }
}
