<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $genres = Genres::all();
        
        return view('genres', ['genres' => $genres]);
    }
}