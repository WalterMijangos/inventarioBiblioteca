<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('year');
            $table->foreignId('author_id')->constrained()->onDelete('cascade'); //esto es para relacionar la tabla de libros con la tabla de autores
            $table->integer('stock')->default(0); //esto es para colocar el stock y que el valor por defecto sea 0
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
