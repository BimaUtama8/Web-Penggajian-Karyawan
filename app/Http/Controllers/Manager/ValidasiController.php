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
        ->where(function($s) {
            $s->where('status_slip', 1)->orWhere('status_slip', 2);
        })
        ->where('total_tmakan', '>', 0)
        ->get();
        
        return view ('manager.validasi.validasiGaji', [
            'data'  => $data,
        ]);
    }

    function detailSlip($id, Request $request){
        $slip = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')
        ->join('transaksi', 'transaksi.id_karyawan', '=', 'karyawan.id_karyawan')
        ->where('id_gaji', $id)
        ->get();
        
        return view('manager.validasi.detailSlip', [
            'slip'  => $slip,
        ]);
    }

    function simpanValidasi(Request $request){
        $request->validate([
            'id_gaji'   => 'required'
        ]);

        $gaji = Transaksi::where('id_gaji', $request->id_gaji)->first();
        
        $gaji->status_slip = 2;
        $gaji->save();

        return redirect()->route('validasi_gaji')->with('toast_success', 'Data Berhasil Divalidasi');
    }
}
