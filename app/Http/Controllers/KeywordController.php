<?php

//namespace selalu di atas perhatikan
namespace App\Http\Controllers;
use App\Keyword;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function index(){
        $data = Keyword::all();
        return response()->json($data);
    }

    public function show($id){
        $data = Keyword::find($id);
        return response()->json($data);
    }

    public function store (Request $request){
        $data = new Keyword();
        // $data->user_id = Auth::user->user_id;
        $data->user_id = '1';
        $data->keyword = $request->input('keyword');
        $data->status = '0';
        $data->save();
        return response()->json(['message' => 'Keyword Berhasil Ditambah']);
    }

    public function update(Request $request,$id)
    {
        //dd($request->all());
        $data = \App\Keyword::find($id);
        $data->update($request->all());
        $data->save();
        
        return response()->json(['message' => 'Keyword Berhasil Diupdate']);
    }

    public function delete ($id)
    {
    	$data = \App\Keyword::find($id);
    	$data->delete();

    	return response()->json(['message' => 'Keyword Berhasil Dihapus']);
    }
}