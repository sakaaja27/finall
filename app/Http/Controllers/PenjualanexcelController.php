<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Pembeliandetail;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Member;
use App\Models\User;
use App\Models\Penjualan;
use App\Exports\PembelianExport;
use App\Exports\PenjualanExport;
use Maatwebsite\Excel\Facades\Excel;

class PenjualanexcelController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with('member','user')->where('status','1')->get();
        return view('penjualan.excel',compact('penjualan'));
    }

    public function export(Request $request) 
{
    return Excel::download(new PenjualanExport, 'laporan-penjualan.xlsx');
}
}
