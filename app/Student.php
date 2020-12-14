<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function programme()
    {
        return $this->belongsTo('App\Programme')->withDefault();
    }

    public function studentcourses()
    {
        return $this->hasMany('App\StudentCourse');
    }
}
