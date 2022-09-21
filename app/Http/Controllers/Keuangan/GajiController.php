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
        if($ht_jabatan >= 500000){
            $ht_jabatan = 500000;
        }                       
        $ht_makan           = $data[0]['tunjangan_makan'] * $total_hari;
        $ht_transportasi    = $data[0]['tunjangan_transportasi'] * $total_hari;
        $penghasilan_bruto  = $data[0]['gaji'] + $ht_makan + $ht_transportasi;
        $penghasilan_bersih = $penghasilan_bruto - $ht_jabatan - $ht_jht - $ht_jp;

        //Pajak Penghasilan
        $penghasilan_setahun= $penghasilan_bersih * 12;
            //PTKP
            if($data[0]['status'] == 'Belum Menikah' && $data[0]['tanggungan'] == '0'){
                $pajak_penghasilan = $penghasilan_setahun - 54000000;
            }else if($data[0]['status'] == 'Belum Menikah' && $data[0]['tanggungan'] == '1'){
                $pajak_penghasilan = $penghasilan_setahun - 58500000;
            }else if($data[0]['status'] == 'Belum Menikah' && $data[0]['tanggungan'] == '2'){
                $pajak_penghasilan = $penghasilan_setahun - 63000000;
            }else if($data[0]['status'] == 'Belum Menikah' && $data[0]['tanggungan'] == '3'){
                $pajak_penghasilan = $penghasilan_setahun - 67500000;
            }else if($data[0]['status'] == 'Menikah' && $data[0]['tanggungan'] == '0'){
                $pajak_penghasilan = $penghasilan_setahun - 58500000;
            }else if($data[0]['status'] == 'Menikah' && $data[0]['tanggungan'] == '1'){
                $pajak_penghasilan = $penghasilan_setahun - 63000000;
            }else if($data[0]['status'] == 'Menikah' && $data[0]['tanggungan'] == '2'){
                $pajak_penghasilan = $penghasilan_setahun - 67500000;
            }else if($data[0]['status'] == 'Menikah' && $data[0]['tanggungan'] == '3'){
                $pajak_penghasilan = $penghasilan_setahun - 72000000;
            }

            //PKP
            if($pajak_penghasilan <= 0){
                $pph = "Tidak Kena Pajak";
            }else if($pajak_penghasilan >= 0 && $pajak_penghasilan <= 60000000){
                $pph = $pajak_penghasilan * 0.05;
            }else if($pajak_penghasilan > 60000000 && $pajak_penghasilan <= 250000000){
                $pph = $pajak_penghasilan * 0.15;
            }else if($pajak_penghasilan > 250000000 && $pajak_penghasilan <= 500000000){
                $pph = $pajak_penghasilan * 0.25;
            }else if($pajak_penghasilan > 500000000 && $pajak_penghasilan <= 5000000000){
                $pph = $pajak_penghasilan * 0.3;
            }else if($pajak_penghasilan > 5000000000){
                $pph = $pajak_penghasilan * 0.35;
            }

            
            if($pph == 'Tidak Kena Pajak'){
                $pph_bulan = "Tidak Kena Pajak";
            }else{
                $pph_bulan = $pph / 12;
            }

        return view('keuangan/gaji/detailGaji', [
            'karyawan'          => $data,
            'jhk'               => $total_hari,
            'ht_jht'            => $ht_jht,
            'ht_jp'             => $ht_jp,
            'ht_jabatan'        => $ht_jabatan,
            'ht_makan'          => $ht_makan,
            'ht_transportasi'   => $ht_transportasi,
            'penghasilan_bruto' => $penghasilan_bruto,
            'penghasilan_bersih'=> $penghasilan_bersih,
            'pajak_penghasilan' => $pajak_penghasilan,
            'pph'               => $pph,
            'pph_bulan'         => $pph_bulan
        ]);
    }
    
    function storeSlip(Request $request){
        
    }
}
