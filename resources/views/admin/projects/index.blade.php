@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h3 class="text-center text-white mb-4">Progetti</h3>
        <div class="">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-light mb-3">Nuovo progetto</a>
            <div class="d-flex justify-content-center">

                <table class="table ms_table-projects text-white">
                    <thead class="">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Data di creazione</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody class="p-3">
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->title }}</th>
                                <td>{{ $project->created_at }}</td>
                                <td class="">
                                    <a class="btn btn-success btn-crud-1 mt-1"
                                        href="{{ route('admin.projects.show', $project->slug) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning btn-crud-2 mt-1"
                                        href="{{ route('admin.projects.edit', $project->slug) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST"
                                        class="btn-crud-3">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-1 btn-crud-3">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
