@extends('layouts.template')

@section('title', 'Courses')

@section('main')
    <h1>Courses</h1>

    <form method="get" action="/course" id="searchForm">
        <div class="row">
            <div class="col-sm-6 mb-2">
                <input type="text" class="form-control" name="artist" id="artist"
                       value="" placeholder="Filter Artist Or Record">
            </div>
            <div class="col-sm-4 mb-2">
                <select class="form-control" name="genre_id" id="genre_id">
                    <option value="%">All programmes</option>
                    @foreach($programmes as $programme)
                        <option value="{{ $programme->id }}">{{ $programme->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2 mb-2">
                <button type="submit" class="btn btn-success btn-block">Search</button>
            </div>
        </div>
    </form>
    <hr>
    @if ($courses->count() == 0)
        <div class="alert alert-danger alert-dismissible fade show">
            Can't find any course with your searching
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        @foreach($courses as $course)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text">{{ $course->description }}</p>
                    <a class="card-text text-uppercase" href="">{{ $course->programme->name }}</a>
                </div>
                <div class="card-footer">
                    <a href="courses/{{ $course->id }}" class="btn btn-primary w-100">Manage students</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection


