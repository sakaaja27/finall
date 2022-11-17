<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\Pembelian;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\Produk;
use PDF;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kategori = Kategori::where('status','1')->count();
        $produk = Produk::count();
        $supplier = Supplier::where('status','1')->count();
        $member = Member::where('status','1')->count();
        $tanggal_awal = date('Y-m-d',mktime(0,0,0, date('m'),1,date('Y')));
        $tanggal_akhir = date('Y-m-d');
        if (auth()->user()->level == 1) {
            return view('admin.dashboard', compact('kategori', 'produk', 'supplier', 'member', 'tanggal_awal', 'tanggal_akhir'));
        } else {
            return view('kasir.dashboard');
        }    
    }

    public function getData($awal, $akhir)
    {
        $no = 1;
        $data = array();
        $pendapatan = 0;
        $total_pendapatan = 0;
        // looping wktu dari var awal kurangsama dg var akhir
        while (strtotime($awal) <= strtotime($akhir)) {
            $tanggal = $awal;
            $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));
            // strtotime = wktu berjalan 
            $total_penjualan = Penjualan::where('created_at', 'LIKE', "%$tanggal%")->sum('bayar');
            $total_pembelian = Pembelian::where('created_at', 'LIKE', "%$tanggal%")->sum('bayar');
            $pendapatan = $total_penjualan - $total_pembelian ;
            $total_pendapatan += $pendapatan;

            $row = array();
            $row['DT_RowIndex'] = $no++;
            $row['tanggal'] = tanggal_indonesia($tanggal, false);
            $row['penjualan'] ='Rp. '. format_uang($total_penjualan);
            $row['pembelian'] = 'Rp. '. format_uang($total_pembelian);
            $row['pendapatan'] ='Rp. '. format_uang($pendapatan);
            $data[] = $row;
        }

        $data[] = [
            'DT_RowIndex' => '',
            'tanggal' => '',
            'penjualan' => '',
            'pembelian' => 'Total Pendapatan',
            'pendapatan' => 'Rp. '. format_uang($total_pendapatan),
        ];

        return $data;
    }

    public function data($awal, $akhir)
    {
        $data = $this->getData($awal, $akhir);
        return datatables()->of($data)->make(true);
    }


    public function refresh(Request $request)
    {
       $kategori = Kategori::where('status','1')->count();
        $produk = Produk::count();
        $supplier = Supplier::where('status','1')->count();
        $member = Member::where('status','1')->count();
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        return view('admin.dashboard',compact('tanggal_awal','tanggal_akhir','kategori','produk','supplier','member'));
    }

    public function exportPDF($awal,$akhir){
        $data =  $this->getData($awal,$akhir);
        $pdf = PDF::loadView('admin.pdf',compact('awal','akhir','data'));
        $pdf->setPaper('a4','portrait');
        return $pdf->stream('Laporan-Pendapatan-' .date('Y-m-d-his').'pdf');
    }

   
}
