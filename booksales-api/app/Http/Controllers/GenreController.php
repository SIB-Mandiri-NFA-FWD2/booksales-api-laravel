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

    public function show($id){
        $genres = Genres::find($id);

        if (!$genres) {
            return response()->json([
                'success' => false,
                'message' => 'Genre tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Genre ditemukan',
            'data' => $genres
        ], 200);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $genres = Genres::find($id);

        if (!$genres) {
            return response()->json([
                'success' => false,
                'message' => 'Genre tidak ditemukan'
            ], 404);
        }

        $genres->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui',
            'data' => $genres
        ], 201);
    }

    public function destroy($id){
        $genres = Genres::find($id);

        if (!$genres) {
            return response()->json([
                'success' => false,
                'message' => 'Genrestidak ditemukan'
            ], 404);
        }

        $genres->delete();

        return response()->json([
            'success' => true,
            'message' => 'Genres berhasil dihapus'
        ], 200);
    }
}