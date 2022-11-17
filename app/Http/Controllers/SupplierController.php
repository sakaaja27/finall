<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        return view('supplier.index');
    }
    public function data()
    {
        $supplier = Supplier::orderBy('id_supplier', 'desc')->where('status','1')->get();
        return datatables()->of($supplier)->addIndexColumn()
            ->addColumn('aksi', function ($supplier) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('supplier.update', $supplier->id_supplier) .'`)" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`'. route('supplier.destroy', $supplier->id_supplier) .'`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
        $supplier = Supplier::create($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }
    public function show($id)
    {
        $supplier = Supplier::find($id);

        return response()->json($supplier);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id)->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }
    public function destroy($id)
    {
        $supplier = Supplier::where('id_supplier',$id)->first();
     $update = Supplier::updateOrCreate(['id_supplier' => $id],[
        'status' => '0',
        'nama' => $supplier['nama'],
        'alamat' => $supplier['alamat'],
        ]);
        return response(null, 204);
    }
}
