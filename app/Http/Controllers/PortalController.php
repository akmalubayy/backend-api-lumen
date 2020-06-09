<?php

//namespace selalu di atas perhatikan
namespace App\Http\Controllers;

use App\Portal;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        $data = Portal::all();
        return response()->json($data);
    }

    public function show($id)
    {
        $data = Portal::find($id);
        return response()->json($data);
    }

    public function store (Request $request)
    {
        $data = new Portal();
        $data->portal = $request->input('portal');
        $data->total = $request->input('total');
        $data->save();

        return response()->json(['message' => 'Portal Berita Berhasil Ditambah']);
    }

        public function update(Request $request,$id)
    {
        //dd($request->all());
        $data = \App\Portal::find($id);
        $data->update($request->all());
        $data->save();
        
        return response()->json(['message' => 'Portal Berita Berhasil Diupdate']);
    }

    public function delete($id)
    {
        $data = \App\Portal::find($id);
        $data->delete();
        // return redirect('/siswa')->with('sukses','Data berhasil dihapus');
         return response()->json(['message' => 'Portal Berita Berhasil Dihapus']);
    }
}