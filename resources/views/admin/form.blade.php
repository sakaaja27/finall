<div class="modal fade" id="modalperiode" tabindex="-1" role="dialog" aria-labelledby="modalperiode">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('dashboard.refresh') }}" method="get" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Periode Laporan</h4>
                </div>


                <div class="modal-body">
                    <div class="form-group row">
                        <label for="tanggal_awal" class="col-lg-2 col-lg-offset-1 control-label">Tanggal Awal</label>
                        <div class="col-lg-6">
                            <input type="text" name="tanggal_awal" id="tanggal_awal" class="form-control datepicker" required autofocus style="border-radius: 0 !important;" value="{{ request('tanggal_awal')}}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="tanggal_akhir" class="col-lg-2 col-lg-offset-1 control-label">Tanggal Akhir</label>
                        <div class="col-lg-6">
                            <input type="text" name="tanggal_akhir" id="tanggal_akhir" class="form-control datepicker" required style="border-radius: 0 !important;" value="{{ request('tanggal_akhir')}}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>

                
                <div class="modal-footer">
                    <button class="btn btn-info btn-sm"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>