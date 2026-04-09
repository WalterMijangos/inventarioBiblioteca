@extends('layouts.app')
@section('title', 'Editar Autor')
@section('content')

<h1><i class="bi bi-pencil"></i> Editar Autor</h1>
<a href="{{route('authors.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-left"></i></a>

    <form action="{{ route('authors.update', $author) }}" method="POST" class="card p-4 shadow">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="name">Nombre Autor:</label>
            <input type="text" name="name" value="{{ $author->name }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="nationality">Nacionalidad del Autor:</label>
            <input type="text" name="nationality" value="{{ $author->nationality }}" class="form-control">
        </div>

    
        <div class="mb-3">
            <button type="submit" class="btn btn-success"><i class="bi bi-floppy"></i> Actualizar</button>
        </div>
        
    </form>

@endsection
