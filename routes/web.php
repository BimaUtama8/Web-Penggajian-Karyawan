<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Auth\LoginController::class, 'index'])->name('login');
Route::post('/auth', [Auth\LoginController::class, 'login'])->name('auth_login');
Route::get('/logout', [Auth\LoginController::class, 'logout'])->name('logout');



//Presensi
Route::get('/presensi', [AbsensiController::class, 'tampilPresensi'])->name('presensi');
Route::post('/presensi/cekPresensi', [AbsensiController::class, 'cekPresensi'])->name('cek_presensi');
Route::post('/presensi/cekPresensi/cekInAbsen/{id}', [AbsensiController::class, 'cekInAbsen'])->name('cek_in');
Route::post('/presensi/cekPresensi/cekOutAbsen/{id}', [AbsensiController::class, 'cekOutAbsen'])->name('cek_out');

//level hrd
Route::middleware('auth', 'validatelevels:hrd')->group(function () {
    Route::view('hrd/dashboard', 'hrd.index')->name('dashboard_hrd');

    //Get method
    // Route::get('/index', function () {return view('hrd/index');});
        //Data Karyawan
        Route::get('hrd/karyawan', [Hrd\KaryawanController::class, 'tampilKaryawan'])->name('show_karyawan');
        Route::get('hrd/tambahkaryawan', [Hrd\KaryawanController::class, 'tambahKaryawan'])->name('tambah_karyawan');
        Route::get('hrd/editKaryawan/{id}', [Hrd\KaryawanController::class, 'tampilEditKaryawan'])->name('edit_karyawan');
        Route::get('hrd/hapusKaryawan/{id}', [Hrd\KaryawanController::class, 'hapusKaryawan'])->name('hapus_karyawan');
        Route::get('hrd/detailKaryawan/{id}', [Hrd\KaryawanController::class, 'detailKaryawan'])->name('detail_karyawan');
        Route::get('hrd/tampilSlip', [Hrd\KaryawanController::class, 'tampilSlip'])->name('show_slip');

        //Data Jabatan
        Route::get('hrd/jabatan', [Hrd\JabatanController::class, 'tampilJabatan'])->name('show_jabatan');
        Route::get('hrd/tambahjabatan', [Hrd\JabatanController::class, 'tambahJabatan'])->name('tambah_jabatan');
        Route::get('hrd/editJabatan/{id}', [Hrd\JabatanController::class, 'tampilEditJabatan'])->name('edit_jabatan');
        Route::get('hrd/hapusJabatan/{id}', [Hrd\JabatanController::class, 'hapusJabatan'])->name('hapus_jabatan');

        //Data Presensi
        Route::get('hrd/tampilPresensi', [Hrd\PresensiController::class, 'tampilPresensi'])->name('show_presensi');
        Route::get('hrd/pilihDetail/{id}', [Hrd\PresensiController::class, 'pilihDetail'])->name('show_pilih_detail');
        Route::post('hrd/detailPresensi', [Hrd\PresensiController::class, 'detailPresensi'])->name('show_detail_presensi');

    //Post Method
        //Data Karyawan
        Route::post('hrd/storekaryawan', [Hrd\KaryawanController::class, 'storeKaryawan'])->name('store_karyawan');
        Route::get('hrd/print/{id}', [Hrd\KaryawanController::class, 'print'])->name('print');
        Route::get('hrd/printSpt/{id}', [Hrd\KaryawanController::class, 'printSpt'])->name('print_spt');
        //Data Jabatan
        Route::post('hrd/storejabatan', [Hrd\JabatanController::class, 'storeJabatan'])->name('store_jabatan');
    
    //Put Method
        //Data Karyawan
        Route::put('hrd/editkaryawan/{id}', [Hrd\KaryawanController::class, 'editKaryawan'])->name('store_edit_karyawan');
        //Data jabatan
        Route::put('hrd/editjabatan/{id}', [Hrd\JabatanController::class, 'editJabatan'])->name('store_edit_jabatan');
});



//level keuangan
Route::middleware('auth', 'validatelevels:keuangan')->group(function () {
    Route::view('keuangan/dashboard', 'keuangan.index')->name('dashboard_keuangan');

    
    //Get Method
        //Data Jabatan
        Route::get('keuangan/jabatan', [Keuangan\JabatanController::class, 'tampilJabatan'])->name('show_jabatan_keuangan');
        Route::get('keuangan/tambahjabatan', [Keuangan\JabatanController::class, 'tambahJabatan'])->name('tambah_jabatan_keuangan');
        Route::get('keuangan/editJabatan/{id}', [Keuangan\JabatanController::class, 'tampilEditJabatan'])->name('edit_jabatan_keuangan');
        Route::get('keuangan/hapusJabatan/{id}', [Keuangan\JabatanController::class, 'hapusJabatan'])->name('hapus_jabatan_keuangan');
        //Data Iuran
        // Route::get('keuangan/tampilIuran', [Keuangan\IuranController::class, 'tampilIuran'])->name('show_iuran');
        // Route::get('keuangan/tampilEditIuran', [Keuangan\IuranController::class, 'tampilEditIuran'])->name('show_edit_iuran');
        //Data Gaji
        Route::get('keuangan/gaji', [Keuangan\GajiController::class, 'index'])->name('index_gaji');
        Route::get('keuangan/tampilGaji', [Keuangan\GajiController::class, 'tampilGaji'])->name('show_gaji');
        Route::get('keuangan/detailGaji/{id}', [Keuangan\GajiController::class, 'detailGaji'])->name('show_detail_gaji');
        Route::get('keuangan/reqValidasi', [Keuangan\GajiController::class, 'reqValidasi'])->name('show_req');
        Route::get('keuangan/sValidasi', [Keuangan\GajiController::class, 'sValidasi'])->name('s_validasi');
    
    //Put Method
        //Data Jabatan
        Route::put('keuangan/editjabatan/{id}', [Keuangan\JabatanController::class, 'editJabatan'])->name('store_edit_jabatan_keuangan');
        Route::put('keuangan/editjabatan', [Keuangan\IuranController::class, 'editIuran'])->name('store_edit_iuran');
        //Data Gaji
        Route::put('keuangan/editGaji', [Keuangan\GajiController::class, 'editGaji'])->name('edit_gaji');
        
    //POST Method
        Route::post('keuangan/print_out', [Keuangan\GajiController::class, 'printOut'])->name('print_out');
        Route::post('keuangan/detailGaji/', [Keuangan\GajiController::class, 'hitungGaji'])->name('hitung_gaji');
        Route::post('keuangan/rValidasi', [Keuangan\GajiController::class, 'rValidasi'])->name('r_validasi');
});        



//level manager
Route::middleware('auth', 'validatelevels:manager')->group(function () {
    Route::view('manager/dashboard', 'manager.index')->name('dashboard_manager');

    //Get Method
        //Validasi Slip Gaji
        Route::get('manager/validasi/validasiGaji', [Manager\ValidasiController::class, 'validasiGaji'])->name('validasi_gaji');
        Route::get('manager/validasi/detailSlip/{id}', [Manager\ValidasiController::class, 'detailSlip'])->name('detail_slip');
        //Laporan Pajak
        Route::get('manager/laporanPajak/laporanPajak', [Manager\LaporanPajakController::class, 'laporanPajak'])->name('laporan_pajak');
        Route::get('manager/laporanBulan', [Manager\LaporanPajakController::class, 'laporanBulan'])->name('laporan_bulan');
        //Laporan Gaji
        Route::get('manager/laporanGaji/laporanGaji', [Manager\LaporanGajiController::class, 'laporanGaji'])->name('laporan_gaji');
    
    //Put Method
        //Validasi Slip Gaji
        Route::put('manager/simpanValidasi', [Manager\ValidasiController::class, 'simpanValidasi'])->name('simpan_validasi');

    //Post Method
        //Laporan Pajak
        Route::post('manager/printPajak', [Manager\LaporanPajakController::class, 'printPajak'])->name('print_pajak');
        //Laporan Bulan
        Route::post('manager/printBulan', [Manager\LaporanPajakController::class, 'printBulan'])->name('print_bulan');
        //Laporan Gaji
        Route::post('manager/printGaji', [Manager\LaporanGajiController::class, 'printGaji'])->name('print_gaji');

});