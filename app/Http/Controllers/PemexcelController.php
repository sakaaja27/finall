<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Pembeliandetail;
use App\Models\Produk;
use App\Models\Supplier;
use App\Exports\PembelianExport;
use Maatwebsite\Excel\Facades\Excel;

class PemexcelController extends Controller
{
    public function index()
    {
        $pembeli = Pembelian::with('supplier')->get();
        return view('pembelian.excel',compact('pembeli'));
    }

    public function exportexcel() 
{
    return Excel::download(new PembelianExport, 'laporan-pembelian.xlsx');
}
}
