<?php

namespace App\Http\Controllers\Keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gaji;
use App\Models\Iuran;
use App\Models\Karyawan;
use App\Models\Presensi;
use App\Models\Jabatan;
use App\Models\Transaksi;
use PDF;

class GajiController extends Controller
{
    function index(){
        return view('keuangan.gaji.gaji');
    }

    function tampilGaji(){
        $karyawan = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')->get();

        return view('keuangan/gaji/gaji', [
            'karyawan' => $karyawan,
        ]);
    }
    
    function reqValidasi(){
        $tahun = Presensi::selectRaw('YEAR(masuk) as tahun')
        ->groupBy('tahun')
        ->get();
        return view('keuangan.gaji.reqValidasi', [
            'tahun' => $tahun,
        ]);
    }

    function detailGaji($id){
        $id_karyawan = $id;
        $tahun = Presensi::selectRaw('YEAR(masuk) as tahun')
        ->groupBy('tahun')
        ->get();

        return view('keuangan/gaji/detailGaji', [
            'id_kar' => $id_karyawan,
            'tahun'  => $tahun
        ]);
    }

    function hitungGaji(Request $request){
        $this->validate($request, [
            'bulan'      => 'required',
            'tahun'      => 'required'
        ]);

        $id_karyawan = $request->id_karyawan;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $data = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')
        ->where('id_karyawan', $id_karyawan)
        ->get();

        $masuk = Presensi::selectRaw('DATE_FORMAT(masuk, "%M") as bulan')
        ->groupBy('bulan')
        ->get();

        $jht = Iuran::where('id_setting', 1)->first();
        $jp = Iuran::where('id_setting', 2)->first();

        //Jumlah Hari Kerja
        $hari_masuk = Presensi::where('id_karyawan', $id_karyawan)
                                ->where('status', 1)
                                ->whereMonth('masuk', '=', $bulan)
                                ->whereYear('masuk', '=', $tahun)
                                ->whereTime('masuk', '<=', '9:00:00')
                                ->count();
        $hari_lembur = Presensi::where('id_karyawan', $id_karyawan)
        ->where('status', 3)
        ->whereMonth('masuk', '=', $bulan)
        ->whereYear('masuk', '=', $tahun)
        ->whereTime('masuk', '<=', '9:00:00')
        ->count();
        $total_hari = $hari_masuk + $hari_lembur;

        //Jumlah Jam Lembur
        $lembur = Presensi::where('id_karyawan', $id_karyawan)
        ->where('status', 3)
        ->whereMonth('masuk', '=', $bulan)
        ->whereYear('masuk', '=', $tahun)
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
        
        //Hitung Upah Lembur
        $jumlah_lembur = $hasil;
        $gaji_kar = $data[0]['gaji'];
        $upah_jam = $gaji_kar * 0.00578;
        $upah_perjam = $upah_jam * 1.5;
        $upah_pertama = $upah_perjam;
        $upah_kedua = $upah_jam * 2 + $upah_perjam;
        $upah_ketiga = ($upah_jam * 2) + ($upah_perjam * $jumlah_lembur);
        $total_upah = 0;
        if($jumlah_lembur == 1){
            $total_upah = $upah_perjam;
        }else if($jumlah_lembur == 2){
            $total_upah = $upah_kedua;
        }else if($jumlah_lembur >= 3){
            $total_upah = $upah_ketiga;
        }
        
                     
        $ht_makan           = $data[0]['tunjangan_makan'] * $total_hari;
        $ht_transportasi    = $data[0]['tunjangan_transportasi'] * $total_hari;

        $penghasilan_bruto  = $data[0]['gaji'] + $ht_makan + $ht_transportasi + $total_upah;
        $ht_jabatan         = $penghasilan_bruto * 0.05;
        if($ht_jabatan >= 500000){
            $ht_jabatan = 500000;
        }
        $ht_jht             = $penghasilan_bruto * ($jht['nilai']/100);
        $ht_jp              = $penghasilan_bruto * ($jp['nilai']/100);  
        $penghasilan_bersih = $penghasilan_bruto - $ht_jabatan - $ht_jht - $ht_jp;

        //Pajak Penghasilan
            $orderdate      = explode('-', $data[0]['tanggal_masuk']);
            $year           = $orderdate[0];
            $selisih_thn    = date('Y')-$year;
            $month          = $orderdate[1];
            $selisih        = 12 - $month;
            $kali = 0 + $selisih;
            $penghasilan_setahun = 0;
            for($i = 0; $i <= $selisih; $i++){
                if($selisih == $i && $selisih_thn == 0){
                    $penghasilan_setahun = $penghasilan_bersih * $kali;
                }else if($selisih_thn > 0){
                    $penghasilan_setahun = $penghasilan_bersih * 12;
                }else{
                    $penghasilan_setahun = 0;
                }
            }
            
            //PTKP
            $pajak_penghasilan = 0;
            if($data[0]['status'] == 'Tidak Menikah' && $data[0]['tanggungan'] == '0'){
                $pajak_penghasilan = $penghasilan_setahun - 54000000;
            }else if($data[0]['status'] == 'Tidak Menikah' && $data[0]['tanggungan'] == '1'){
                $pajak_penghasilan = $penghasilan_setahun - 58500000;
            }else if($data[0]['status'] == 'Tidak Menikah' && $data[0]['tanggungan'] == '2'){
                $pajak_penghasilan = $penghasilan_setahun - 63000000;
            }else if($data[0]['status'] == 'Tidak Menikah' && $data[0]['tanggungan'] == '3'){
                $pajak_penghasilan = $penghasilan_setahun - 67500000;
            }else if($data[0]['status'] == 'Menikah' && $data[0]['tanggungan'] == '0'){
                $pajak_penghasilan = $penghasilan_setahun - 58500000;
            }else if($data[0]['status'] == 'Menikah' && $data[0]['tanggungan'] == '1'){
                $pajak_penghasilan = $penghasilan_setahun - 63000000;
            }else if($data[0]['status'] == 'Menikah' && $data[0]['tanggungan'] == '2'){
                $pajak_penghasilan = $penghasilan_setahun - 67500000;
            }else if($data[0]['status'] == 'Menikah' && $data[0]['tanggungan'] == '3'){
                $pajak_penghasilan = $penghasilan_setahun - 72000000;
            }else{
                $pajak_penghasilan = 0;
            }


            //PKP
            $pph = 0;
            if($pajak_penghasilan <= 0){
                $pph = 0;
            }else if($data[0]['npwp'] == 1 && $pajak_penghasilan >= 0 && $pajak_penghasilan <= 60000000){
                $pph = $pajak_penghasilan * 0.05;
            }else if($data[0]['npwp'] == 0 && $pajak_penghasilan >= 0 && $pajak_penghasilan <= 60000000){
                $pph = $pajak_penghasilan * 0.06;
            }else if($data[0]['npwp'] == 1 && $pajak_penghasilan > 60000000 && $pajak_penghasilan <= 250000000){
                $pph = $pajak_penghasilan * 0.15;
            }else if($data[0]['npwp'] == 0 && $pajak_penghasilan > 60000000 && $pajak_penghasilan <= 250000000){
                $pph = $pajak_penghasilan * 0.18;
            }else if($data[0]['npwp'] == 1 && $pajak_penghasilan > 250000000 && $pajak_penghasilan <= 500000000){
                $pph = $pajak_penghasilan * 0.25;
            }else if($data[0]['npwp'] == 0 && $pajak_penghasilan > 250000000 && $pajak_penghasilan <= 500000000){
                $pph = $pajak_penghasilan * 0.3;
            }else if($data[0]['npwp'] == 1 && $pajak_penghasilan > 500000000 && $pajak_penghasilan <= 5000000000){
                $pph = $pajak_penghasilan * 0.3;
            }else if($data[0]['npwp'] == 0 && $pajak_penghasilan > 500000000 && $pajak_penghasilan <= 5000000000){
                $pph = $pajak_penghasilan * 0.36;
            }else if($data[0]['npwp'] == 1 && $pajak_penghasilan > 5000000000){
                $pph = $pajak_penghasilan * 0.35;
            }

            //PPH Per Bulan
            if($pph <= 0 ){
                $pph_bulan = 0;
            }else{
                $pph_bulan = $pph / 12;
            }

            $npwp = $data[0]['npwp'];
            $status_npwp = 0;
            if($npwp == 0){
                $status_npwp = 'Tidak Ada';
            }else if($npwp == 1){
                $status_npwp = 'Ada';
            }


            Transaksi::updateOrCreate([
                'id_karyawan' => $id_karyawan,
                'bulan'       => $bulan
            ],[
                'id_karyawan'           => $id_karyawan,
                'bulan'                 => $bulan,
                'tahun'                 => $tahun,
                'lembur'                => $hasil,
                'jumlah_hari'           => $total_hari,
                'total_tmakan'          => $ht_makan,
                'total_ttransportasi'   => $ht_transportasi,
                'upah_lembur'           => $total_upah,
                'penghasilan_bruto'     => $penghasilan_bruto,
                'penghasilan_bersih'    => $penghasilan_bersih,
                'biaya_jabatan'         => $ht_jabatan,
                'jaminan_ht'            => $ht_jht,
                'jaminan_p'             => $ht_jp,
                'pajak_penghasilan'     => $pph,
            ]);

            return view('keuangan/gaji/cetakSlip', [
                'id_karyawan'       => $id_karyawan,
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
                'hasil'             => $hasil,
                'bulan'             => $bulan,
                'tahun'             => $tahun,
                'total_upah'        => $total_upah,
                'penghasilan_setahun' => $penghasilan_setahun,
                'npwp'              => $npwp,
                'status_npwp'       => $status_npwp
            ]);
            
    }

    function rValidasi(Request $request){
        $request->validate([
            'bulan'       => 'required',
            'tahun'       => 'required'
        ]);
        $status = Transaksi::where('bulan', $request->bulan)
        ->where('tahun', $request->tahun)
        ->update(['status_slip' => 1]);

        return redirect()->route('show_req')->with('success', 'Request Validasi Berhasil');
    }

    // function sValidasi(){
    //     $data = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')
    //     ->join('transaksi', 'transaksi.id_karyawan', '=', 'karyawan.id_karyawan')
    //     ->where(function($s){
    //         $s->where('status_slip', 0)->orWhere('status_slip', null);
    //     })
    //     ->get();
        
    //     return view('keuangan.gaji.tampilValidasi',[
    //         'data'      => $data,
    //     ]);
    // }

    function editGaji(Request $request){
        $request->validate([
            'id_karyawan' => 'required',
            'bulan'       => 'required',
            'tahun'       => 'required'
        ]);
        $status = Transaksi::where('id_karyawan', $request->id_karyawan)
        ->where('bulan', $request->bulan)
        ->where('tahun', $request->tahun)
        ->first();

        $status -> status_slip = 1;
        $status -> save();

        return redirect()->route('show_gaji')->with('success', 'Data Berhasil Ditambahkan');
    }

    function printOut(Request $request){
        // $cetak = Transaksi::all()->where('id_gaji', $id)
        // ->whereMonth('masuk', '=', $bulan)
        // ->whereYear('masuk', '=', $tahun)
        // ->get();
        $nama = $request->nama;
        $nip  = 1234;
        $jabatan = $request->jabatan;
        $gapok = $request->gapok;
        $bulan = $request->bulan;
        $pdf = PDF::loadview('keuangan.gaji.print_out',[
            'nama' => $nama,
            'nip'  => $nip,
            'jabatan'  => $jabatan,
            'gapok' => $gapok,
            'bulan' => $bulan,
        ]);
    	// return $pdf->download('gaji-'.$nama.'.pdf');

        // dibawah ini untuk cek view manual html
        return view ('keuangan.gaji.print_out', [
            'nama' => $nama,
            'nip'  => $nip,
            'jabatan'  => $jabatan,
            'gapok' => $gapok,
            'bulan' => $bulan,
        ]);
    }
    
}
