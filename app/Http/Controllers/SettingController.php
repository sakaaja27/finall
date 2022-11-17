<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
	public function index()
    {
        return view('pengaturan.index');
    } 

    public function show()
    {
    	return Setting::first();
    }

    public function update(Request $request)
    {
        $set = Setting::first();
        $set->nama_perusahaan = $request->nama_perusahaan;
        $set->telepon = $request->telepon;
        $set->alamat = $request->alamat;

        if ($request->hasFile('path_logo')) {
            $file= $request->file('path_logo');
            $nama = 'logo-' .date('YmdHis') .'.' .$file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $set->path_logo = "/img/$nama";
        }

        $set->update();
        return response()->json('Data berhasil');

    }
}
