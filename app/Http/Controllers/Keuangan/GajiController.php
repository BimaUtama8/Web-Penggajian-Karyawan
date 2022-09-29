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
        $masuk = Presensi::selectRaw('DATE_FORMAT(masuk, "%M") as bulan')
        ->groupBy('bulan')
        ->get();

        return view('keuangan/gaji/gaji', [
            'masuk'    => $masuk
        ]);
    }

    function sortirGaji($id, Request $request){
        $request->validate([
            'bulan'  =>'required',
        ]);

        $karyawan = Presensi::join('karyawan', 'karyawan.id_karyawan', '=', 'presensi.id_karyawan')->join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan');
        
        $masuk = Presensi::selectRaw('DATE_FORMAT(masuk, "%M") as bulan')
        ->groupBy('bulan')
        ->get();

        return view('keuangan/gaji/gaji', [
            'karyawan' => $karyawan,
            'masuk'    => $masuk
        ]);
    }

    function detailGaji($id){
        $data = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')
        ->where('id_karyawan', $id)
        ->get();

        $jht = Iuran::where('id_setting', 1)->first();
        $jp = Iuran::where('id_setting', 2)->first();


        $hari_masuk = Presensi::where('id_karyawan', $id)
                                ->where('status', 1)
                                ->whereTime('masuk', '<=', '9:00:00')
                                ->count();
        $hari_lembur = Presensi::where('id_karyawan', $id)
        ->where('status', 3)
        ->whereTime('masuk', '<=', '9:00:00')
        ->count();
        $total_hari = $hari_masuk + $hari_lembur;

        //Lembur
        $lembur = Presensi::where('id_karyawan', $id)
        ->where('status', 3)
        ->whereTime('keluar', '>', '17:00:00')
        ->get();
        $hasil = 0;
        for($i = 0; $i < count($lembur) ;$i++){
            $keluar         = strtotime('17:00:00');
            $pecah          = explode(' ', $lembur[$i]['keluar']);
            $waktu          = strtotime($pecah[1]);
            $beda           = floor(($waktu - $keluar)/3600);
            $hasil+=$beda;
        }
        

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

            //PPH Per Bulan
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
            'pph_bulan'         => $pph_bulan,
            'hasil'             => $hasil
        ]);
    }
    
}
