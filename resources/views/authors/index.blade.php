@extends('layouts.app')

@section('title', 'Lista de autores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><i class="bi bi-person"></i> Lista de autores</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-primary">Agregar autor</a>
        <!--<div>
            <form class="d-flex mt-3" role="search"> 
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>-->
    </div>

    @if($authors->isEmpty())
        <p>No hay autores disponibles.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->name }}</td> <!-- Aquí se muestra el nombre del autor -->
                        <td>
                            <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-warning">Editar</a>

                            <!-- Formulario para eliminar el autor -->
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este autor?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
@endsection
