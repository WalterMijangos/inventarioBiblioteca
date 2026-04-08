@extends('layouts.app')
@section('title', 'Crear Libro')


@section('content')
<h1><i class="bi bi-plus"></i> Crear Nuevo Libro</h1>
<a href="{{route('books.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-left"></i></a>

<form action="{{route('books.store')}}" method="POST" class="card p-4 shadow"> 
    @csrf
    <div class=" mb-3">
        <label for="title" class="form-label">Titulo del Libro:</label>
        <input type="text" name="title" placeholder ="Ingrese el titulo del libro..." class="form-control">
        <!--alerta de error para el titulo-->
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Año de Publicacion:</label>
        <input type="text" name="year" placeholder ="Ingrese el año de publicacion..." class="form-control">
        <!--//alerta de error para el año-->
        @error('year')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="author_id" class="form-label">Autor:</label>
        <select name="author_id" class="form-select">
            <option value=""> Seleccione un autor: </option>
            @foreach($authors as $author)
            <option value="{{$author->id}}"> 
                {{$author->name}} 
            </option>
            @endforeach
        </select>
        <!--//alerta de error para el autor-->
        @error('author_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> <i class="bi bi-floppy"></i> Guardar</button>
    </div>
</form>
@endsection
