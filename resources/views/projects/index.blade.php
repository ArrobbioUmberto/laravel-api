@extends('layouts.app')
@section('content')

<div class="container py-5">
    <div class="d-flex align-items-center">
        <div>
            <a class="btn btn-sm btn-primary" href="{{ route('projects.create') }}">Nuovo Progetto</a>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-striped table-inverse table-responsive">
        <thead>
            <tr>
                <th>ID</th>
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
                <td>
                    <a href="{{ route('projects.show',$project) }}">{{ $project->title }}</a>
                </td>
                <td>{{ $project->slug }}</td>
                <td>{{ $project->client }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->url }}</td>
                <td>{{ $project->date_creation }}</td>
                <td>
                    <div class="d-flex ">
                        <a class="btn btn-sm btn-secondary" href="{{ route('projects.edit',$project) }}">Edit</a>
                        <form action="{{ route('projects.destroy',$project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-sm btn-danger" type="submit" value="Elimina">
                        </form>
                        @if($project->trashed())
                        <form action="{{ route('projects.restore',$project) }}" method="POST">
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