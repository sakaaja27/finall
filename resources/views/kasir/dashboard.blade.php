@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body text-center">
                <h1>Selamat Datang Kasir</h1>
                <br><br>
                <a href="{{ route('transaksi.baru') }}" class="btn btn-info btn-lg">Transaksi Baru</a>
                <br><br><br>
            </div>
        </div>
    </div>
</div>
@endsection