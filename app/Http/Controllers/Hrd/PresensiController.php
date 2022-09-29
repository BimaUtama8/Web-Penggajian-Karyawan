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

        $hari_masuk = Presensi::where('id_karyawan', $id)
        ->where('status', 1)
        ->whereTime('masuk', '<=', '9:00:00')
        ->count();
        $hari_lembur = Presensi::where('id_karyawan', $id)
        ->where('status', 3)
        ->whereTime('masuk', '<=', '9:00:00')
        ->count();
        $hari_kerja = $hari_masuk + $hari_lembur;

        $lembur = Presensi::where('id_karyawan', $id)
        ->where('status', 3)
        ->whereTime('keluar', '>', '17:00:00')
        ->get();

        $hasil = 0;
        for($i = 0; $i < count($lembur) ;$i++){
            $keluar = strtotime('17:00:00');
            $pecah = explode(' ', $lembur[$i]['keluar']);
            $waktu = strtotime($pecah[1]);
            $beda = floor(($waktu - $keluar)/3600);
            $hasil+=$beda;
        }

        //Upah Sejam
        $upah_jam = $data[0]['gaji'] * 0.00578;
        //Upah Lembur 1 Jam
        $upah_perjam = $upah_jam * 1.5;
        $upah_lembur = 0;
        $upah_lembur_pertama = 0;
        $upah_lembur_kedua = 0;
        $upah_lembur_ketiga = 0;
        if($hasil < 1){
            $upah_lembur = 0;
        }else if($hasil == 1){
            $upah_lembur_pertama = $upah_perjam;
        }else if($hasil == 2){
            $upah_lembur_kedua = $upah_jam * 2 + $upah_perjam;
        }else if($hasil > 2){
            $upah_lembur_ketiga = ($upah_jam * 2) + ($upah_perjam * $hasil);
        }

        $total_upah = 0;
        for($l = 0; $l < count($lembur);$l++){
            $total_upah = ($upah_lembur_pertama + $upah_lembur_kedua + $upah_lembur_ketiga);
        }


        return view('hrd.presensi.detailPresensi', [
            'presensi' => $data,
            'jhk' => $hari_kerja,
            'jum_lem' => $hasil,
            'total_upah' => $total_upah
        ]);
    }
}
