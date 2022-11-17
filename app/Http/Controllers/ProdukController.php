<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $kategori = Kategori::where('status','1')->pluck('nama_kategori','id_kategori');
        return view('produk.index', compact('kategori'));
    }
    public function data()
    {
        $produk = Produk::with('kategori');
        return datatables()->of($produk)->addIndexColumn()
        ->addColumn('kode_produk', function ($produk) {
            return '<span class="label label-info">'. $produk->kode_produk .'</span>';
        })
         ->addColumn('nama_kategori', function ($produk) {
            return $produk->kategori->nama_kategori;
        })
        ->addColumn('harga_beli', function ($produk) {
            return format_uang($produk->harga_beli);
        })
        ->addColumn('harga_jual', function ($produk) {
            return format_uang($produk->harga_jual);
        })
        ->addColumn('stok', function ($produk) {
            return format_uang($produk->stok);
        })
        ->addColumn('aksi', function ($produk) {
            return '
            <div class="btn-group">
            <button type="button" onclick="editForm(`'. route('produk.update', $produk->id_produk) .'`)" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></button>
            
            </div>
            ';
        })
        ->rawColumns(['aksi','kode_produk'])
        ->make(true);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $produk = Produk::latest()->first() ?? new Produk();
        $request['kode_produk'] = 'P'. tambah_nol_didepan((int)$produk->id_produk +1, 6);

        $produk = Produk::create($request->all());

        return response()->json('Data berhasil disimpan');
    }

    public function show($id)
    {
        $produk = Produk::find($id);

        return response()->json($produk);
    }
    public function edit($id)
    {
       // kagak adaa
    }
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->update($request->all());
        return response()->json('Data berhasil disimpan', 200);
    }
}
