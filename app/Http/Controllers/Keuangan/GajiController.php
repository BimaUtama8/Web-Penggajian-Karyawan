<?php

namespace App\Http\Controllers\Keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gaji;
use App\Models\Karyawan;
use App\Models\Presensi;

class GajiController extends Controller
{
    function index(){
        return view('keuangan.gaji.gaji');
    }

    function tampilGaji(){
        $karyawan = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')->get();
        return view('keuangan/gaji/gaji', [
            'karyawan' => $karyawan
        ]);
    }

    function detailGaji($id){
        $data = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')->get();
        $total_hari = Presensi::where('id_karyawan', $id)
                                ->where('status',$id)
                                ->whereTime('keluar', '<=', '17:00:00')
                                ->count();
        $total_lembur = Presensi::where('id_karyawan', $id)
                                ->where('status',$id)
                                ->whereTime('keluar', '>', '17:00:00')
                                ->count();
        return view('keuangan/gaji/detailGaji', [
            'karyawan' => $data,
            'jhk'      => $total_hari
        ]);
    }
}
