@extends('layouts.app')
@section('content')
    @if (request()->session()->exists('message'))
        <div class="alert alert-primary" role="alert">
            {{ request()->session()->pull('message') }}
        </div>
    @endif
    <div class="container py-5">
        <div class="d-flex align-items-center">
            <h1 class="me-auto">Tutti i post</h1>




            <div>
                @if (request('trashed'))
                    <a class="btn btn-sm btn-light" href="{{ route('projects.index') }}">Tutti i post</a>
                @else
                    <a class="btn btn-sm btn-light" href="{{ route('projects.index', ['trashed' => true]) }}">Cestino
                        ({{ $num_of_trashed }})</a>
                @endif
                <a class="btn btn-sm btn-primary" href="{{ route('projects.create') }}">Nuovo post</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Client</th>
                    <th>Description</th>
                    <th>Url</th>
                    <th>Data creazione</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->type ? $project->type->name : '-' }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                        </td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->client }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->url }}</td>
                        <td>{{ $project->date_creation }}</td>
                        <td>
                            <div class="d-flex ">
                                <a class="btn btn-sm btn-secondary" href="{{ route('projects.edit', $project) }}">Edit</a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-sm btn-danger" type="submit" value="Elimina">
                                </form>
                                @if ($project->trashed())
                                    <form action="{{ route('projects.restore', $project) }}" method="POST">
                                        @csrf
                                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
