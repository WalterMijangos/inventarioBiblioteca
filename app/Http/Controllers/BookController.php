<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use App\Models\Author;

use App\Http\Requests\StoreBookRequest;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author');

        //filtro para mostrar solo al autor y sus libros
        if(request('author_id')){
            $books->where('author_id', request('author_id'));
        }

        //buscador de titulo o autor de un libro
        if(request('search')){
            //aqui se hace consulta para que se pueda bucar el libro por titulo o por el nombre de autor.
            $books->where(function($query){
                //aqui se consulta el titulo del libro para que se pueda buscar el libro en el buscador y lo muestre
                $query->where('title', 'like', '%' . request('search') . '%')
                //el orwherehas es para que el se pueda buscar el nombre del autor y que muestre el libro que se busco
                ->orWhereHas('author', function($query){
                    //aqui se consulta el nombre del autor para que se pueda buscar el libro por el autor que se busca.
                    $query->where('name', 'like', '%' . request('search') . '%');
                });
            });
        }
        
        //aqui coloque la paginacion para que se muestre 10 libros y que cuando se cmbie de pagina con un filtro o busqueda se mantenga eso sin que cambie o elimine
        $books = $books->paginate(10)->withQueryString();
        
        $authors = Author::all();

        return view('books.index',compact('books', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        Book::create($request->all());
        return redirect()->route('books.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();

        return view('books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, Book $book)
    {
        $book->update($request->all());
        
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
