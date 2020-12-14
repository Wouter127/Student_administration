@extends('layouts.template')

@section('title', 'Programmes')

@section('main')
    <h1>Programmes</h1>
    <p>
        <a href="/admin/programmes/create" class="btn btn-outline-success">
            <i class="fas fa-plus-circle mr-1"></i>Create new programme
        </a>
    </p>

    <ul class="list-group">
        @foreach($programmes as $programme)
        <li class="list-group-item">
            <a href="/admin/programmes/{{ $programme->id }}">{{ $programme->name }}</a>
            <form action="/admin/programmes/{{ $programme->id }}" method="post" class="float-right">
                @csrf
                @method('delete')
                <div class="btn-group btn-group-sm">
                    <a href="/admin/programmes/{{ $programme->id }}/edit" class="btn btn-outline-success"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Edit {{ $programme->name }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button type="submit" class="btn btn-outline-danger deleteGenre"
                            data-toggle="tooltip"
                            data-placement="top"
                            data-courses="{{ $programme->courses->count() }}"
                            title="Delete {{ $programme->name }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </form>
        </li>
        @endforeach
    </ul>
@endsection

@section('script_after')
    <script>
        $(function () {
            $('.deleteGenre').click(function () {
                let courses = $(this).data('courses');
                let msg = `Delete this programme?`;
                if (courses > 0) {
                    msg += `\nThe ${courses} records of this genre will also be deleted!`
                }
                if(confirm(msg)) {
                    $(this).closest('form').submit();
                }
            })
        });
    </script>
@endsection
