@extends('layouts.app')
@section('content')
    <div class="Container">
        <h1>Modifica: {{ $project->title }}</h1>
    </div>
    <div class="container">
        <form action="{{ route('projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <label for="title" class="form-label">Titolo</label>
                <div class="input-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder=""
                        aria-label="Username" aria-describedby="titleHelp" id="title" name="title"
                        value="{{ old('title', $project->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="type-id" class="form-label">Categoria</label>
                <select class="form-select @error('type_id') is-invalid @enderror" aria-label="Default select example"
                    id="type-id" name="type_id">
                    <option value="" selected>Scegli la Categoria</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <label for="client" class="form-label">Cliente</label>
                <div class="input-group">
                    <input type="text" class="form-control @error('client') is-invalid @enderror" placeholder=""
                        aria-label="Username" aria-describedby="basic-addon1" id="client" name="client"
                        value="{{ old('client', $project->client) }}">
                    @error('client')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="input-group mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <div class="input-group">
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        cols="30" rows="10">
                {{ old('description', $project->description) }}
                </textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">Url</label>
                <input class="form-control @error('url') is-invalid @enderror" type="text" id="url" name="url"
                    value="{{ old('url', $project->url) }}">
                @error('url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="input-group mb-3">
                <label for="slug" class="form-label">Slug</label>
                <div class="input-group">
                    <input type="text" placeholder="" class="form-control @error('slug') is-invalid @enderror"
                        id="slug" name="slug" value="{{ old('slug', $project->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="input-group mb-3">
                <label for="date_creation" class="form-label">Data di creazione</label>
                <div class="input-group">
                    <input type="text" class="form-control @error('date_creation') is-invalid @enderror" placeholder=""
                        aria-label="Username" id="date_creation" name="date_creation"
                        value="{{ old('date_creation', $project->date_creation) }}">
                    @error('date_creation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>


            <div class="col-auto mt-3">
                <button type="submit" class="btn btn-primary">Modifica</button>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary"> Torna alla Homepage</a>
            </div>
        </form>
    </div>
@endsection
