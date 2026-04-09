@extends('layouts.app')

@section('title', 'Lista de libros')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><i class="bi bi-book"></i> Lista de libros</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Agregar libro</a>
    </div>

    <!--Secion para el buscador y el filtro de author-->
    <div>
        <div class="container mt-2">
<!--Aqui esta la seccion para el buscador donde se piede buscar el titulo de un libro o el autor y muestre el resultado en la tabla-->
            <form class="mb-3 d-flex gap-2" method="GET" action="{{route('books.index')}}"> 
                <input class="form-control" type="search" placeholder="Buscar Libro o autor..." name="search" value="{{ request('search') }}"/>

<!--Aqui se coloco el filtro del autor que se selecciona dentro de la lista de autores creados y que este tiene como funcion que cuando se selecione un autor muestre todos los libros de ese autor y el cambio lo aplica despues de seleccionar-->
                <select name="author_id" class="form-select" onchange="this.form.submit()">
                    <option value="">Todos los autores</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" 
                            {{ request('author_id') == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
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
@section('pagination')
    <div class="float-end">
        {{ $books->links() }}
</div>
@endsection
