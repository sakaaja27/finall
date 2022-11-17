<?php

use App\Http\Controllers\{
    DashboardController,
    KategoriController,
    ProdukController,
    MemberController,
    PenjualanController,
    PembelianController,
    PembeliandetailController,
    PenjualanexcelController,
    PemexcelController,
    PenjualanDetailController,
    SupplierController,
    UserController,
    SettingController,
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => 'auth'], function () {
    // dashboard + laporannya
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/refresh', [DashboardController::class, 'refresh'])->name('dashboard.refresh');
    Route::get('/laporan/data/{awal}/{akhir}', [DashboardController::class, 'data'])->name('dashboard.data');
    Route::get('/laporan/pdf/{awal}/{akhir}', [DashboardController::class, 'exportPDF'])->name('dashboard.export_pdf');

    // user
    Route::get('/user/data', [UserController::class, 'data'])->name('user.data');
    Route::resource('/user', UserController::class);
    
// buat admin karena level 1 isine onok = kategori,produk,member/cust dll
    // kecuali transaksi karo penjualan
    Route::group(['middleware' => 'level:1'], function () {
        // kategori
        Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
        Route::resource('/kategori', KategoriController::class);


        // produk
        Route::get('/produk/data', [ProdukController::class, 'data'])->name('produk.data');
        Route::resource('/produk', ProdukController::class);

        // cust
        Route::get('/customer/data', [MemberController::class, 'data'])->name('customer.data');
        Route::resource('/customer', MemberController::class);

        // supplier
        Route::get('/supplier/data', [SupplierController::class, 'data'])->name('supplier.data');
        Route::resource('/supplier', SupplierController::class);

        // penjualan
        Route::get('/penjualan/data', [PenjualanController::class, 'data'])->name('penjualan.data');
        Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
        Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
        Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
        Route::get('/export', [PenjualanexcelController::class, 'export'])->name('export');
        Route::get('/penjuexcel', [PenjualanexcelController::class, 'index'])->name('penjuexcel');


        // pembelian 
        Route::get('/pembelian/{id}/create', [PembelianController::class,'create'])->name('pembelian.create');
         Route::get('/pembelian/data', [PembelianController::class,'data'])->name('pembelian.data');
        Route::resource('/pembelian', PembelianController::class)->except('create');
        Route::get('/exportexcel', [PemexcelController::class, 'exportexcel'])->name('exportexcel');
         Route::get('/tambahexcel', [PemexcelController::class, 'index'])->name('tambahexcel');
         
        // pem detail
        Route::get('/pembelian_detail/{id}/data', [PembeliandetailController::class,'data'])->name('pembelian_detail.data');
        Route::get('/pembelian_detail/loadform/{diskon}/{total}', [PembeliandetailController::class,'loadForm'])->name('pembelian_detail.load_form');
        Route::resource('/pembelian_detail', PembeliandetailController::class)
        ->except('create','show','edit');

        // setting
        Route::get('/setting',[SettingController::class,'index'])->name('setting.index');
        Route::get('/setting/first',[SettingController::class,'show'])->name('setting.show');
        Route::post('/setting',[SettingController::class, 'update'])->name('setting.update');




    });
// 
    Route::group(['middleware' => 'level:1,2'], function () {
        // penjualan
        Route::get('/transaksi/baru', [PenjualanController::class, 'create'])->name('transaksi.baru');
        Route::post('/transaksi/simpan', [PenjualanController::class, 'store'])->name('transaksi.simpan');
        Route::get('/transaksi/selesai', [PenjualanController::class, 'selesai'])->name('transaksi.selesai');
        Route::get('/profil', [UserController::class, 'profil'])->name('user.profil');
        Route::post('/profil', [UserController::class, 'updateProfil'])->name('user.update_profil');
        Route::get('/transaksi/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi.data');
        Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');
        Route::resource('/transaksi', PenjualanDetailController::class)
        ->except('create', 'show', 'edit');
    });



});