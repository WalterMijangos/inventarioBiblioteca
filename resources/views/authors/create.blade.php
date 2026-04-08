@extends('layouts.app')
@section('title', 'Crear Autor')

@section('content')
<h1><i class="bi bi-plus"></i> Crear Nuevo Autor</h1>
<a href="{{route('authors.index') }}" class="btn btn-primary mb-3"><i class="bi bi-arrow-left"></i></a>

<form action="{{route('authors.store')}}" method="POST" class="card p-4 shadow"> 
    @csrf
    <div class=" mb-3">
        <label for="name" class="form-label">Nombre del Autor:</label>
        <input type="text" name="name" placeholder ="Ingrese el nombre del autor..." class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary"> <i class="bi bi-floppy"></i> Guardar</button>
    </div>
</form>
@endsection
