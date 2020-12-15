<?php

namespace App\Http\Controllers;

use App\Course;
use App\Helpers\Json;
use App\Programme;
use App\StudentCourse;
use App\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        //search
        $programme_id = $request->input('programme_id') ?? '%';
        $course_search_text = '%' . $request->input('course_text_search') . '%';
        $courses = Course::with('programme')
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

        $programmes = Programme::orderBy('name')
            ->get()
            ->transform(function ($item) {
                $item->name = strtoupper($item->name);
                unset($item->created_at, $item->updated_at);
                return $item;
            });
        $result = compact('courses','programmes');
        \Facades\App\Helpers\Json::dump($result);
        return view('courses.index', $result);
    }

    public function show($id)
    {
        $course = Course::with('studentcourses')->with('studentcourses.student')->findOrFail($id);
        $result = compact('course');
        \Facades\App\Helpers\Json::dump($result);
        return view('courses.show', $result);  // Pass $result to the view
    }

    public function create()
    {
        $course = new Course();
        $result = compact('course');
        return view('admin.programmes.create', $result);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|unique:programmes,name',
            'description' => 'required|min:3|unique:programmes,description',
            'programme_id' => 'required|min:3|unique:courses,programme_id'
        ]);

        $course = new Course();
        $course->name = $request->name;
        $course->save();
        session()->flash('success', "The genre <b>$course->name</b> has been added");
        return redirect('admin/programmes');
    }
}
