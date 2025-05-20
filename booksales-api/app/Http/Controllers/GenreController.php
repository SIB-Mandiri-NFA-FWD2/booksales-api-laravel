<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index(){
        $genres = Genres::all();
        
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $genres
        ], 200);    
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'description' => 'required|string'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $genres = Genres::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            "success" => true,
                "message" => "Get All Resource",
                "data" => $genres
        ], 201); 
    }
}