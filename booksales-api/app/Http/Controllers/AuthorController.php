<?php

namespace App\Http\Controllers;

use App\Models\Authors;

class AuthorController extends Controller
{
    public function index(){
        $data = new Authors();
        $authors = $data -> getAuthors();
        return view('authors', ['authors' => $authors]);
    }
}
