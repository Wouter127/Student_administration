@extends('layouts.template')

@section('title', 'Programme')

@section('main')
    <h1>{{ $programmes->name }}</h1>
    @if($programmes->courses->count() == 0)
    <div class="alert alert-danger alert-dismissible fade show">
        No courses for this programme!
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @else
    <p>Courses:</p>
    <ul>
        @foreach($programmes->courses as $course)
            <li>
                {{ $course->name }}
            </li>
            @endforeach
    </ul>
    @endif

@endsection
