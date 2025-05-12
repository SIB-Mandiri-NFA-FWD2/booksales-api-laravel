<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $data = new Genres();
        $genres = $data -> getGenres();
        return view('genres', ['genres' => $genres]);
    }
}
