<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Helpers\Json;
use App\Programmes;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Courses::with('programme')->orderBy('name')->get();
        $programmes = Programmes::orderBy('name')->get();
        $result = compact('courses','programmes');
        \Facades\App\Helpers\Json::dump($result);
        return view('courses.index', $result);
    }

    public function show($id)
    {
        return view('courses.show', ['id' => $id]);
    }
}
