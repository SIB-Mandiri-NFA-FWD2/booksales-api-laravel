<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Authors;
use App\Models\Genres;

use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('books')
            ->join('genres', 'books.genre_id', '=', 'genres.id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->select(
                'books.*',
                'genres.name as genres_name',
                'authors.name as authors_name'
            )
            ->get()
            ->map(function($book) {
                return (array) $book;
            })
            ->toArray();

        return view('books', ['books' => $books]);
    }
}
