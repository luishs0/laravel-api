@extends('layouts.admin')

@section('content')

    <div class="container text-white mt-5 d-flex flex-column justify-content-center">
        <h1 class="text-center mb-5">Change {{ $project->slug }}</h1>

        <div class="row justify-content-center">

            <div class="col-10">

                @if ($errors->any())
                    <div class="ms_errors">

                        @foreach ($errors->all() as $error)
                            <span class="mt-2 mb-4 bg-danger p-2 rounded-4">{{ $error }}</span>
                            <br>
                        @endforeach

                    </div>
                @endif

                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" class="mt-4"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="form-group mb-5">
                        <label for="title">Name</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title', $project->title) }}">
                    </div>

                    <div class="form-group mb-5">
                        <label for="cover_image">Img</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control">
                    </div>

                    <div class="form-group mb-5">
                        <label for="type">Type</label>
                        <select name="type_id" id="type" class="form-select">
                            <option value="">----</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected($project->Type?->id == $type->id)>{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-5">
                        <h4>Technologies</h4>
                        @foreach ($technologies as $technology)
                            <div class="form-check">
                                <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                                    class="form-check-input" value="{{ $technology->id }}" @checked($project->technologies->contains($technology))>
                                <label for="technology-{{ $technology->id }}"
                                    class="form-check-label">{{ $technology->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group mb-5">
                        <label for="description">Description</label>
                        <textarea type="text" id="description" name="description" class="form-control">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
