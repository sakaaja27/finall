<?php

namespace App\Exports;

use App\Models\Penjualan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PenjualanExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        return view('penjualan.excel', [
            'penjualan' => Penjualan::all()
        ]);
    }

}

