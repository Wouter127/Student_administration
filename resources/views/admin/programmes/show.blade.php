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

    <form action="/admin/programmes/{{ $programmes->id }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Name"
                   minlength="3"
                   required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="name" class="mt-2">Description</label>
            <input type="text" name="description" id="description"
                   class="form-control @error('description') is-invalid @enderror"
                   placeholder="Description"
                   minlength="3"
                   required>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <input type="hidden" name="programme_id" id="programme_id"
                   class="form-control @error('programme_id') is-invalid @enderror"
                   placeholder="Description"
                   minlength="3"
                   required
                   value="{{ old('programme_id', $programmes->id) }}">
        </div>
        <button type="submit" class="btn btn-success">Save genre</button>
    </form>

@endsection
