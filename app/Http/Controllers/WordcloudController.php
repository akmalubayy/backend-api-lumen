<?php

//namespace selalu di atas perhatikan
namespace App\Http\Controllers;
use App\Wordcloud;
use Illuminate\Http\Request;

class WordcloudController extends Controller
{
    public function index()
    {
        $data = Wordcloud::all();
        return response()->json($data);
    }

    public function show($id)
    {
        $data = Wordcloud::find($id);
        return response()->json($data);
    }

    public function store (Request $request)
    {
        $data = new Wordcloud();
        $data->word = $request->input('word');
        $data->total = $request->input('total');
        $data->save();

        return response()->json(['message' => 'Word Berita Berhasil Ditambah']);
    }

        public function update(Request $request,$id)
    {
        //dd($request->all());
        $data = \App\Wordcloud::find($id);
        $data->update($request->all());
        $data->save();
        
        return response()->json(['message' => 'Word Berita Berhasil Diupdate']);
    }

    public function delete($id)
    {
        $data = \App\Wordcloud::find($id);
        $data->delete();
        // return redirect('/siswa')->with('sukses','Data berhasil dihapus');
         return response()->json(['message' => 'Word Berita Berhasil Dihapus']);
    }
}