<?php

namespace App\Http\Controllers;

use App\Models\Authors;

class AuthorController extends Controller
{
    public function index(){
        $author = Authors::all();
        
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $author
        ], 200);
    }
}
