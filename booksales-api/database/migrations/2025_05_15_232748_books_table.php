<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("books", function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->float('price');
            $table->integer('stock');
            $table->string('cover_photo');
            $table->integer('genre_id');
            $table->integer('author_id');
            $table->timestamps();
        });  
    }
};
