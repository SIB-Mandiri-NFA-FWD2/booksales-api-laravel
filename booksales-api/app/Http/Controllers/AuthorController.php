<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'required|string'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $image = $request->file('photo');
        $image->store('authors', 'public');

        $author = Authors::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio
        ]);

        return response()->json([
            "success" => true,
                "message" => "Get All Resource",
                "data" => $author
        ], 201); 
    }
}
