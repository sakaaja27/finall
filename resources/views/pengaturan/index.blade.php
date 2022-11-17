@extends('layouts.master')
@section('title')
    Pengaturan
@endsection
@section('breadcrumb')
    @parent
    <li class="active">Pengaturan</li>
@endsection

@section('content')
<div class="row" >
    <div class="col-lg-12" >
        <div class="box" style=" background: linear-gradient(to right, #d3cce3, #e9e4f0);">
            <form action="{{ route('setting.update')}}" method="post" class="form-setting" data-toggle="validator" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="alert alert-success alert-dismissible" style="display:none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-check-circle"></i> Perubahan berhasil
                    </div>
                    <div class="form-group row ">
                        <label for="nama_perusahaan" class="col-lg-2 control-label">Nama Prushaan</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama_perusahaan" class="form-control" id="nama_perusahaan" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="nama_perusahaan" class="col-lg-2 control-label">Alamat</label>
                        <div class="col-lg-6">
                            <textarea type="text" name="alamat" class="form-control" id="alamat" rows="3" required></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="nama_perusahaan" class="col-lg-2 control-label">No Telepon</label>
                        <div class="col-lg-6">
                            <input type="text" name="telepon" class="form-control" id="telepon" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="path_logo" class="col-lg-2 control-label">Logo</label>
                        <div class="col-lg-4">
                            <input type="file" name="path_logo" class="form-control" id="path_logo" required autofocus
                            onchange="preview('.tampil-logo', this.files[0])">
                            <!-- preview buat ganti foto -->
                            <span class="help-block with-errors"></span>
                            <br>
                            <div class="tampil-logo"></div>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-center">
                     <button class="btn btn-info btn-sm"><i class="fa fa-save"></i>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script >
    $(function () {
        showData();
        $('.form-setting').validator().on('submit', function (e) {
            if (! e.preventDefault()){
                $.ajax({
                    url: $('.form-setting').attr('action'),
                    type : $('.form-setting').attr('method'),
                    data : new FormData($('.form-setting')[0]),
                    async:false,
                    processData:false,
                    contentType:false,
                })
                .done(response=> {
                    showData();
                    $('.alert').fadeIn();

                    setTimeout(() => {
                        $('.alert').fadeOut();
                    },2000);
                })
                .fail(errors => {
                    alert('gaiso nyimpen data');
                    return;
                });
            }
        });
    });
    function showData(){
        $.get('{{ route('setting.show') }}')
            .done( response => {
                $('[name=nama_perusahaan]').val(response.nama_perusahaan);
                $('[name=telepon]').val(response.telepon);
                $('[name=alamat]').val(response.alamat);
                $('.tampil-logo').html(`<img src="{{ url('/') }}${response.path_logo}" width="200">`);
                
            })
            .fail(errors => {
                alert('gaiso nampillan data')
                return;
            })
    }
</script>
@endpush