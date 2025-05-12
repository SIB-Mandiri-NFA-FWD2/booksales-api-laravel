<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Authors;
use App\Models\Genres;

class BookController extends Controller
{
    public function index()
{
    $book = new Books();
    $author = new Authors();
    $genre = new Genres();
    
    $books = $book->getBooks();
    $authors = $author->getAuthors();
    $genres = $genre->getGenres();

    $data = array_map(function($book) use ($authors, $genres) {
        $author = $authors[$book['author_id']];
        $genre = $genres[$book['genre_id']];
        return [
            'title' => $book['title'],
            'description' => $book['description'],
            'price' => $book['price'],
            'stock' => $book['stock'],
            'cover_photo' => $book['cover_photo'],
            'author' => $author['name'],
            'genre' => $genre['name']
        ];
    }, $books);

    return view('books', ['books' => $data]);
}
}