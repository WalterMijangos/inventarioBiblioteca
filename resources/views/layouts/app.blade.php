<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Mini Sistema de Biblioteca</a>
                <div>
                    <a class="btn btn-outline-light btn-sm" href="{{ route('books.index') }}">Libros</a>
                    <a class="btn btn-outline-light btn-sm" href="{{ route('authors.index') }}">Autores</a>
                </div>
        </div>
        <!--<div class="container mt-2">
            <form class="d-flex mt-3" role="search">
                
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>-->
    </nav>
    
    <div class="container mt-4">
        @yield('content')
    </div>
    <div class="container mb-4">
        @yield('pagination')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>
