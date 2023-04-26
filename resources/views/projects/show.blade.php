@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h1>{{ $project->title }}</h1>
                @if ($project->type)
                    <span class="badge rounded-pill bg-warning">{{ $project->type->name }}</span>
                @else
                    <span class="badge rounded-pill bg-secondary">Nessuna categoria</span>
                @endif
                <p>/{{ $project->client }}</p>
            </div>

            <div class="d-flex">
                <a class="btn btn-sm btn-secondary" href="{{ route('projects.edit', $project) }}">Modifica</a>
                @if ($project->trashed())
                    <form action="{{ route('projects.restore', $project) }}" method="POST">
                        @csrf
                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                    </form>
                @endif
            </div>

        </div>
    </div>
    <div class="container">
        <p>
            Descrizione: {{ $project->description }}
        </p>
        <p>
            URL: {{ $project->url }}
        </p>
        <p>
            {{ $project->date_creation }}
        </p>
    </div>
@endsection
