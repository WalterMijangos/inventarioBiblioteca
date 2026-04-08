@extends('layouts.app')
@section('title', 'Editar Libro')
@section('content')

<h1><i class="bi bi-pencil"></i> Editar Libro</h1>
    
<a href="{{route('books.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-left"></i></a>

    <form action="{{ route('books.update', $book) }}" method="POST" class="card p-4 shadow">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="title">Titulo:</label>
            <input type="text" name="title" value="{{ $book->title }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="year">Año:</label>
            <input type="number" name="year" value="{{ $book->year }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Autor:</label>
            <select name="author_id" class="form-select">
                <option value=""> Seleccione un autor: </option>
                @foreach($authors as $author)
                <option value="{{$author->id}}" 
                    {{ $book->author_id == $author->id ? 'selected' : '' }}>
                    {{$author->name}} 
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success"><i class="bi bi-floppy"></i> Actualizar</button>
        </div>
        
    </form>

@endsection
