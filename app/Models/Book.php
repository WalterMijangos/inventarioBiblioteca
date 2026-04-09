<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable =[
        'title',
        'year',
        'author_id',
        'stock'
    ];

    //esta funcion es para relacionar el libro con el autor que se va a colocar en el formulario.
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
