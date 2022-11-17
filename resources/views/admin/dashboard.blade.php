@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endpush
@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $kategori }}</h3>
                <p>Total Kategori</p>
            </div>
            <div class="icon">
                <i class="bi bi-card-checklist"></i>
            </div>
            <a href="{{ route('kategori.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>{{ $produk }}</h3>

                <p>Total Produk</p>
            </div>
            <div class="icon">
                <i class="bi bi-car-front-fill"></i>
            </div>
            <a href="{{ route('produk.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $member }}</h3>
                <p>Total Customer</p>
            </div>
            <div class="icon">
                <i class="fa fa-id-card"></i>
            </div>
            <a href="{{ route('customer.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $supplier }}</h3>

                <p>Total Supplier</p>
            </div>
            <div class="icon">
                <i class="fa fa-truck"></i>
            </div>
            <a href="{{ route('supplier.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
                <h3 class="box-title">Laporan Pendapatan {{ tanggal_indonesia($tanggal_awal, false)}} s/d {{tanggal_indonesia($tanggal_akhir,false)}}</h3>
        <div class="box">
            <div class="box-header with-border">
                <button type="button" onclick="updatePeriode()" class="btn btn-info btn-sm"><i class="fa fa-plus-circle"></i> Ubah Periode</button>
                <a href="{{ route('dashboard.export_pdf', [$tanggal_awal, $tanggal_akhir]) }}" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Export PDF</a> 
                 
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped table-bordered table-penjualan">
                    <thead style="background-color:#00C3CB;">
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        <th>Penjualan</th>
                        <th>Pembelian</th>
                        <th>Pendapatan</th>
                    </thead>
                </table>
            </div>  
        </div>
    </div>
</div>
@includeIf('admin.form')
@endsection
@push('scripts')
<script src="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    let table, table1;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('dashboard.data', [$tanggal_awal,$tanggal_akhir]) }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'tanggal'},
                {data: 'penjualan'},
                {data: 'pembelian'},
                {data: 'pendapatan'}
            ],
            dom: 'Brt',
            bSort: false,
            bPaginate:false,

        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose:true
        });
    });

    function updatePeriode() {
        $('#modalperiode').modal('show');
    }
</script>
@endpush