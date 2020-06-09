<?php

//namespace selalu di atas perhatikan
namespace App\Http\Controllers;
use App\Sentiment;
use Illuminate\Http\Request;

class SentimentController extends Controller
{
    public function index()
    {
        $data = Sentiment::all();
        return response()->json($data);
    }

    public function show($id)
    {
        $data = Sentiment::find($id);
        return response()->json($data);
    }

    public function store (Request $request)
    {
        $data = new Sentiment();
        $data->sentiment = $request->input('sentiment');
        $data->jumlah = $request->input('jumlah');
        $data->save();

        return response()->json(['message' => 'Sentiment Berita Berhasil Ditambah']);
    }

        public function update(Request $request,$id)
    {
        //dd($request->all());
        $data = \App\Sentiment::find($id);
        $data->update($request->all());
        $data->save();
        
        return response()->json(['message' => 'Sentiment Berita Berhasil Diupdate']);
    }

    public function delete($id)
    {
        $data = \App\Sentiment::find($id);
        $data->delete();
        // return redirect('/siswa')->with('sukses','Data berhasil dihapus');
         return response()->json(['message' => 'Sentiment Berita Berhasil Dihapus']);
    }
}