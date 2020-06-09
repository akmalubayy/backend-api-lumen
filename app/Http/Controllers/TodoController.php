<?php

//namespace selalu di atas perhatikan
namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $data = Todo::all();
        return response()->json($data);
    }

    public function show($id){
        $data = Todo::find($id);
        return response()->json($data);
    }

    public function store (Request $request){
        $data = new Todo();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();

        return response()->json(['message' => 'Berhasil Tambah Data']);
    }
}