<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Helpers\Json;
use App\Programmes;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        //search
        $programme_id = $request->input('programme_id') ?? '%';
        $course_search_text = '%' . $request->input('course_text_search') . '%';

        $courses = Courses::with('programme')
            ->orderBy('name')
            ->where(function ($query) use ($course_search_text, $programme_id) {
                $query->where('name', 'like', $course_search_text)
                    ->where('programme_id', 'like', $programme_id);
            })
            ->orWhere(function ($query) use ($course_search_text, $programme_id) {
                $query->where('description', 'like', $course_search_text)
                    ->where('programme_id', 'like', $programme_id);
            })
            ->paginate(12)
            ->appends(['course_text_search'=> $request->input('course_text_search'), 'programme_id' => $request->input('programme_id')]);

        $programmes = Programmes::orderBy('name')
            ->get();
        $result = compact('courses','programmes');
        \Facades\App\Helpers\Json::dump($result);
        return view('courses.index', $result);
    }

    public function show($id)
    {
        return view('courses.show', ['id' => $id]);
    }
}
