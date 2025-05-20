<?php

namespace App\Http\Controllers;

use App\Models\Books;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

            return response()->json([
                "success" => true,
                "message" => "Get All Resource",
                "data" => $books
            ], 200);  
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $image = $request->file('cover_photo');
        $image->store('books', 'public');

        $book = Books::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => $image->hashName(),
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ]);

        return response()->json([
            "success" => true,
                "message" => "Get All Resource",
                "data" => $book
        ], 201); 
    }
}
