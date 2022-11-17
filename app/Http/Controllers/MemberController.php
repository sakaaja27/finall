<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.index');
    }


    public function data()
    {
        $member = Member::orderBy('kode_member')->where('status','1')->get();

        return datatables()->of($member)->addIndexColumn()->addColumn('select_all', function ($produk) {
            return '
            <input type="checkbox" name="id_member[]" value="'. $produk->id_member .'">
            ';
        })
        ->addColumn('kode_member', function ($member) {
            return '<span class="label label-info">'. $member->kode_member .'<span>';
        })
        ->addColumn('aksi', function ($member) {
            return '
            <div class="btn-group">
            <button type="button" onclick="editForm(`'. route('customer.update', $member->id_member) .'`)" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" onclick="deleteData(`'. route('customer.destroy', $member->id_member) .'`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div>
            ';
        })
        ->rawColumns(['aksi', 'select_all', 'kode_member'])->make(true);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $member = Member::latest()->first() ?? new Member();
        $kode_member = (int) $member->kode_member +1;
        $member = new Member();
        $member->kode_member = tambah_nol_didepan($kode_member, 5);
        $member->nama = $request->nama;
        $member->telepon = $request->telepon;
        $member->alamat = $request->alamat;
        $member->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function show($id)
    {
        $member = Member::find($id);
        return response()->json($member);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $member = Member::find($id)->update($request->all());
        return response()->json('Data berhasil disimpan', 200);
    }

    
    public function destroy($id)
    {
        $member = Member::where('id_member',$id)->first();
     $update = Member::updateOrCreate(['id_member' => $id],[
        'status' => '0',
        'kode_member' => $member['kode_member'],
        'nama' => $member['nama'],
        'alamat' => $member['alamat'],
        'telepon' => $member['telepon'],
        ]);
        return response(null, 204);
    }

}
