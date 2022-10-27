<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gaji;
use App\Models\Iuran;
use App\Models\Karyawan;
use App\Models\Presensi;
use App\Models\Jabatan;
use App\Models\Transaksi;

class ValidasiController extends Controller
{
    function validasiGaji(){
        $data = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')
        ->join('transaksi', 'transaksi.id_karyawan', '=', 'karyawan.id_karyawan')
        ->where('status_slip', 1)
        ->where('total_tmakan', '>', 0)
        ->get();
        
        return view ('manager.validasi.validasiGaji', [
            'data'  => $data,
        ]);
    }

    function detailSlip($id, Request $request){
        $slip = Transaksi::where('id_gaji', $id)->get();
        
        return view('manager.validasi.detailSlip', [
            'slip'  => $slip
        ]);
    }
}
