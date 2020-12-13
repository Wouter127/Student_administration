<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourses extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Students')->withDefault();
    }

    public function course()
    {
        return $this->belongsTo('App\Courses')->withDefault();
    }
}
