<?php

namespace App\Http\Controllers\Keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gaji;
use App\Models\Iuran;
use App\Models\Karyawan;
use App\Models\Presensi;
use App\Models\Jabatan;

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
        $data = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')
        ->where('id_karyawan', $id)
        ->get();

        $jht = Iuran::where('id_setting', 1)->first();
        $jp = Iuran::where('id_setting', 2)->first();


        $total_hari = Presensi::where('id_karyawan', $id)
                                ->where('status', 1)
                                ->whereTime('masuk', '<=', '9:00:00')
                                ->count();
        $ht_jht             = $data[0]['gaji'] * ($jht['nilai']/100);
        $ht_jp              = $data[0]['gaji'] * ($jp['nilai']/100);
        $ht_jabatan         = $data[0]['gaji'] * 0.05;                        
        $ht_makan           = $data[0]['tunjangan_makan'] * $total_hari;
        $ht_transportasi    = $data[0]['tunjangan_transportasi'] * $total_hari;
        $penghasilan_bruto  = $data[0]['gaji'] + $ht_makan + $ht_transportasi;

        return view('keuangan/gaji/detailGaji', [
            'karyawan'          => $data,
            'jhk'               => $total_hari,
            'ht_jht'            => $ht_jht,
            'ht_jp'             => $ht_jp,
            'ht_jabatan'        => $ht_jabatan,
            'ht_makan'          => $ht_makan,
            'ht_transportasi'   => $ht_transportasi,
            'penghasilan_bruto' => $penghasilan_bruto
        ]);
    }
    
    function storeSlip(Request $request){
        
    }
}
