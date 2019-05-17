<?php

namespace App\Http\Controllers;
use App\Buku;
use App\Http\Resources\BukuResource;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
      $data = Buku::paginate(10);

      return BukuResource::collection($data);
    }

    public function store(Request $request)
    {
        
        $data = $request->isMethod('put') ? Buku::findOrFail
        ($request->id) : new Buku;

        $data->id = $request->input('id');
        $data->judul = $request->input('judul');
        $data->gambar = $request->input('gambar');
        $data->penulis = $request->input('penulis');
        $data->tahun = $request->input('tahun');
        $data->penerbit = $request->input('penerbit');
        $data->kategori = $request->input('kategori');

        if($data->save()){
            return new BukuResource($data);

        }

    }

    public function show($id)
    {
        //Get single Buku
        $data = Buku::findOrFail($id);

        //Return single Buku as resource
        return new BukuResource($data);
    }

    public function destroy($id)
    {
        //Get single Buku
        $data = Buku::findOrFail($id);

        if($data->delete()){
            return new BukuResource($data);
        }
    }
    public function getData(Request $request){
        $list = [];
        if($request->input('judul') !=null)  {
            $list = Buku::where('judul','like','%'.$request->input('judul').'%')->get();
        }  
        return response()->json($list);
    }
}
