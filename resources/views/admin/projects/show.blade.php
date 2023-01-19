@extends('layouts.admin')

@section('content')
    <div class="container text-center mt-4 text-white">
        <h1>{{ $project->title }}</h1>
        @if ($project->cover_image)
            <img class="show-img" src="{{ asset('storage/' . $project->cover_image) }}"
                alt="{{ 'Cover image di ' . $project->title }}">
        @else
            <div class="w-50 bg-secondary py-4 text-center d-inline-block">
                No image yet
            </div>
        @endif
        <p>{{ $project->description }}</p>
        <span>{{ $project->created_at }}</span>
        <br>
        @if ($project->type != null)
            <span>Type: {{ $project->type->name }}</span>
        @else
            <span>No type selected</span>
        @endif

        <div class="technologies">
            <span>Technologies:</span>
            @foreach ($project->technologies as $technology)
                <span>{{ $technology->name }}</span>
            @endforeach
        </div>

    </div>
@endsection
