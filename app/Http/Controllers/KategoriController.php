<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index');
    }
    public function data()
    {
        $kategori = Kategori::orderBy('id_kategori', 'desc')->where('status','1');

        return datatables()->of($kategori)->addIndexColumn()
        ->addColumn('aksi', function ($kategori) {
            return '
            <div class="btn-group">
            <button onclick="editForm(`'. route('kategori.update', $kategori->id_kategori) .'`)" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></button>
            <button onclick="deleteData(`'. route('kategori.destroy', $kategori->id_kategori) .'`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            </div>
            ';
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return response()->json('Data berhasil disimpan', 200);
    }


    public function show($id)
    {
        $kategori = Kategori::find($id);

        return response()->json($kategori);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->update();

        return response()->json('Data berhasil disimpan', 200);
    }
    public function destroy($id)
    {
       $kategori = kategori::where('id_kategori',$id)->first();
       $update = kategori::updateOrCreate(['id_kategori' => $id],[
        'status' => '0',
        'nama_kategori' => $kategori['nama_kategori'],
    ]);
       return response(null, 204);
   }
}
