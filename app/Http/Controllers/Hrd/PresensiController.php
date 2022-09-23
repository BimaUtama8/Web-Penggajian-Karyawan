<?php

namespace App\Http\Controllers\Hrd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\Karyawan;
use Carbon\Carbon;

class PresensiController extends Controller
{
    function tampilPresensi(){
        $data = Karyawan::all();
        return view('hrd.presensi.presensi', [
            'karyawan' => $data
        ]);
    }

    function detailPresensi($id){
        $data = Presensi::join('karyawan', 'karyawan.id_karyawan', '=', 'presensi.id_karyawan')->where('presensi.id_karyawan', $id)->get();    

        $hari_kerja = Presensi::where('id_karyawan', $id)
        ->where('status', 1)
        ->whereTime('masuk', '<=', '9:00:00')
        ->count();

        $lembur = Presensi::where('id_karyawan', $id)
        ->where('status', 3)
        ->whereTime('keluar', '>', '17:00:00')
        ->get();
        // foreach($lembur as $lem => $val){
        //     // $keluar = strtotime('17:00:00');
        //     // $getTime = strtotime($val->keluar);
        //     // $diff = floor(($getTime-$keluar)/3600);
        //     return $val;
        // }
        $hasil = 0;
        for($i = 0; $i < count($lembur) ;$i++){
            $keluar = strtotime('17:00:00');
            $pecah = explode(' ', $lembur[$i]['keluar']);
            $waktu = strtotime($pecah[1]);
            $beda = floor(($waktu - $keluar)/3600);
            $hasil+=$beda;
        }

        

        return view('hrd.presensi.detailPresensi', [
            'presensi' => $data,
            'jhk' => $hari_kerja,
            'jum_lem' => $hasil,
        ]);
    }
}
