<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=pembelian.xls");
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
                             <th colspan="5" style="text-align: center;"><strong>Laporan Pembelian</strong></th>
                        </tr>
                        <tr>
                            <th></th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Tanggal </th>
                            <th>Supplier</th>
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Diskon</th>
                            <th>Total Bayar</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembeli as $key => $item)
                            <tr>
                                <td width="5%">{{ $key+1 }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->supplier->nama }}</td>
                                <td>{{ $item->total_item }}</td>
                                <td>{{ $item->total_harga }}</td>
                                <td>{{ $item->diskon }}</td>
                                <td>{{ $item->bayar }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
