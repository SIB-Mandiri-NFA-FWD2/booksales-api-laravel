<?php

namespace App\Http\Controllers;

use App\Models\Authors;

class AuthorController extends Controller
{
    public function index(){
        $author = Authors::all();
        
        return view('authors', ['authors' => $author]);
    }
}
