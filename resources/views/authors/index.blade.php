@extends('layouts.app')

@section('title', 'Lista de autores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><i class="bi bi-person"></i> Lista de autores</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"> Agregar autor </i></a>
    </div>

    @if($authors->isEmpty())
        <p>No hay autores disponibles.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><i class="bi bi-file-earmark-person"> ID </i></th>
                    <th><i class="bi bi-person-lines-fill"> Nombre </i></th>
                    <th><i class="bi bi-globe"> Nacionalidad </i></th>
                    <th><i class="bi bi-pencil-square"> Acciones </i></th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->name }}</td><!-- Aquí se muestra el nombre del autor -->
                        <td>{{$author->nationality}} </td>
                        <td>
                            <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"> Editar </i></a>

                            <!-- Formulario para eliminar el autor -->
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este autor?')"><i class="bi bi-trash"> Eliminar </i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
@endsection
