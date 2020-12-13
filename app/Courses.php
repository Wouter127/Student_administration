<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    public function programme()
    {
        return $this->belongsTo('App\Programmes')->withDefault();
    }

    public function student_courses()
    {
        return $this->hasMany('App\StudentCourses');
    }
}
