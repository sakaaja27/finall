<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=penjualan.xls");
?>
<div class="modal fade" id="modal-supplier" tabindex="-1" role="dialog" aria-labelledby="modal-supplier">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                </div>
                <div class="modal-body">
                    <table class="table table-stiped table-bordered table-supplier">
                       <thead>
                        <tr>
                            <th></th>
                            <th colspan="5" style="text-align: center;"><strong>Laporan Penjualan</strong></th>
                        </tr>
                        <tr>
                            <th></th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Tanggal </th>
                            <th>Kode Member</th>
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Total Bayar</th>
                            <th>Diterima</th>
                            <th>Kasir</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $key => $item)
                            <tr>
                                <td width="5%">{{ $key+1 }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->member->kode_member }}</td>
                                <td>{{ $item->total_item }}</td>
                                <td>{{ $item->total_harga }}</td>
                                <td>{{ $item->bayar }}</td>
                                <td>{{ $item->diterima }}</td>
                                <td>{{ $item->user->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
