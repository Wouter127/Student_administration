@extends('layouts.template')

@section('title', 'Courses')

@section('main')
    <h1>{{ $course->name }}</h1>
    <p>{{ $course->description }}</p>
    <ul>List of students enrolled:
{{--        @foreach($students as $student)--}}
{{--            <li>--}}
{{--                {{ $student->name }}--}}
{{--            </li>--}}
{{--        @endforeach--}}

    </ul>
@endsection


