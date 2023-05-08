@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Nuovo Progetto</h1>
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Immagine di copertina</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                    value="{{ old('image') }}" id="image" aria-describedby="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}" id="title" aria-describedby="titleHelp">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type-id" class="form-label">Categoria</label>
                <select class="form-select @error('type_id') is-invalid @enderror" aria-label="Default select example"
                    id="type-id" name="type_id">
                    <option value="" selected>Scegli la Categoria</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="technologies" class="form-label">Tecnologie usate</label>
                <div class="d-flex @error('technologies') is-invalid @enderror flex-wrap gap-3">

                    @foreach ($technologies as $key => $technology)
                        <div class="form-check">
                            <input name="technologies[]" @checked(in_array($technology->id, old('technologies', []))) class="form-check-input"
                                type="checkbox" value="{{ $technology->id }}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $technology->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                @error('technologies')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="client" class="form-label">Cliente</label>
                <input type="text" name="client" class="form-control @error('client') is-invalid @enderror"
                    value="{{ old('client') }}" id="client">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                    value="{{ old('description') }}" id="description">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Url</label>
                <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                    value="{{ old('url') }}" id="url">
                @error('url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date_creation" class="form-label">Data di creazione</label>
                <input type="text" name="date_creation" class="form-control @error('date_creation') is-invalid @enderror"
                    value="{{ old('date_creation') }}" id="date_creation">
                @error('date_creation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection
