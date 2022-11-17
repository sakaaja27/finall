<?php

namespace App\Exports;

use App\Models\Pembelian;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PembelianExport implements FromView,WithHeadings,ShouldAutoSize
{
    public function view(): View
    {
        return view('pembelian.excel', [
            'pembeli' => Pembelian::all()
        ]);
    }

    public function headings(): array{
        return [
            'No',
            'Tanggal',
            'Nama Supplier',
            'Totak item',
            'Total harga',
            'Diskon',
            'Total bayar',
        ];
    }
}

