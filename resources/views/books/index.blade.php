@extends('layouts.app')

@section('title', 'Lista de libros')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><i class="bi bi-book"></i> Lista de libros</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Agregar libro</a>
    </div>

    @if($books->isEmpty())
        <p>No hay libros disponibles.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Año</th>
                    <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->year }}</td>
                        <td>{{ $book->author->name }}</td> <!-- Aquí se muestra el nombre del autor -->
                        <td>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Editar</a>

                            <!-- Formulario para eliminar el libro -->
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este libro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
@endsection

