<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name'
    ];

    //esta funcion es para relacionar el autor con los libros quie se vayan a colocar en la vista
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
