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

// Route::get('/', function () {
//     return view('hrd/index');
// });

Route::get('/', [Auth\LoginController::class, 'index'])->name('login');
Route::post('/auth', [Auth\LoginController::class, 'login'])->name('auth_login');
Route::get('/logout', [Auth\LoginController::class, 'logout'])->name('logout');


//level hrd
Route::middleware('auth', 'validatelevels:hrd')->group(function () {
    Route::view('hrd/dashboard', 'hrd.index')->name('dashboard_hrd');});

    //Get method
    Route::get('/index', function () {return view('hrd/index');});
    //Data Karyawan
    Route::get('/karyawan', function () { return view('hrd/karyawan');});
    Route::get('/karyawan', [KaryawanController::class, 'tampilKaryawan']);
    Route::get('/tambahkaryawan', [KaryawanController::class, 'tambahKaryawan'])->name('tambah_karyawan');

    //Data Jabatan
    Route::get('/jabatan', function () { return view('hrd/jabatan');});
    Route::get('/jabatan', [JabatanController::class, 'tampilJabatan'])->name('show_jabatan');
    Route::get('/tambahjabatan', [JabatanController::class, 'tambahJabatan'])->name('tambah_jabatan');

    //Data Presensi
    Route::get('/presensi', function () { return view('hrd/presensi/presensi');});

    //Data Iuran
    Route::get('/iuran', function () { return view('hrd/iuran/iuran');});

    //Data PTKP
    Route::get('/ptkp', function () { return view('hrd/ptkp/ptkp');});

    //Data Aturan PPh 21
    Route::get('/pph', function () { return view('hrd/pph/pph');});

    //Data Gaji
    Route::get('/gaji', function () { return view('hrd/gaji/gaji');});


    //Post Method
    Route::post('/storejabatan', [JabatanController::class, 'storeJabatan'])->name('store_jabatan');


//level keuangan
Route::middleware('auth', 'validatelevels:keuangan')->group(function () {
    Route::view('keuangan/dashboard', 'keuangan.index')->name('dashboard_keuangan');
});
    //Get Method

//level manager
Route::middleware('auth', 'validatelevels:manager')->group(function () {
    Route::view('manager/dashboard', 'manager.index')->name('dashboard_manager');
});
    //Get Method

// //Route Tampilan Sidebar 
// Route::get('/index', function () {return view('hrd/index');});
// Route::get('/karyawan', function () { return view('hrd/karyawan');});
// Route::get('/jabatan', function () { return view('hrd/jabatan');});
// Route::get('/gaji', function () { return view('hrd/gaji');});
// Route::get('/user', function () { return view('hrd/user');});


// //Route Data Karyawan
// Route::get('/karyawan', [KaryawanController::class, 'tampilKaryawan']);
// Route::get('/tambahkaryawan', [KaryawanController::class, 'tambahKaryawan'])->name('tambah_karyawan');

// //Route Data Jabatan
// Route::get('/jabatan', [JabatanController::class, 'tampilJabatan'])->name('show_jabatan');
// Route::get('/tambah.jabatan', [JabatanController::class, 'tambahJabatan']);

// Route::post('/storejabatan', [JabatanController::class, 'storeJabatan'])->name('store_jabatan');



