@extends('layouts.template')

@section('title', 'Create new programme')

@section('main')
    <h1>Create new programme</h1>
    <form action="/admin/programmes" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Name"
                   minlength="3"
                   required
                   value="{{ old('name', $programme->name) }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Save genre</button>
    </form>
@endsection