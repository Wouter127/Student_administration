@extends('layouts.template')

@section('title', 'Courses')

@section('main')
    <h1>{{ $course->name }}</h1>
    <p>{{ $course->description }}</p>
    @if($course->studentcourses->count() != 0)
        <p>List of students enrolled:</p>
        <ul>
            @foreach($course->studentcourses as $studentcourse)
            <li>
                {{ $studentcourse->student->first_name }} {{ $studentcourse->student->last_name }} (semester{{ $studentcourse->semester }})
            </li>
            @endforeach
        </ul>
    @else
        <div class="alert alert-danger alert-dismissible fade show">
            No students enrolled!
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif
@endsection


