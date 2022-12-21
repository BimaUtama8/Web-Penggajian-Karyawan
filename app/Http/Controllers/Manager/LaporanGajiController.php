<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Models\Iuran;
use App\Models\Karyawan;
use App\Models\Presensi;
use App\Models\Jabatan;
use App\Models\Transaksi;
use PDF;

class LaporanGajiController extends Controller
{
    function laporanGaji(){
        $tahun = Presensi::selectRaw('YEAR(masuk) as tahun')
        ->groupBy('tahun')
        ->get();
        return view ('manager.laporanGaji.laporanGaji', [
            'tahun' => $tahun,
        ]);
    }
    
    function printGaji(Request $request){
        $this->validate($request, [
            'tahun' => 'required',
            'bulan' => 'required'
        ]);

        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $data = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')
        ->join('transaksi', 'transaksi.id_karyawan', '=', 'karyawan.id_karyawan')
        ->where('transaksi.tahun', $tahun)
        ->where('transaksi.bulan', $bulan)
        ->where('transaksi.status_slip', 1)
        ->get();

        $total_gaji = Transaksi::where('status_slip', 1)->sum('penghasilan_bersih');
        
        $pdf = PDF::loadview('manager.laporanGaji.printGaji',[
            'data'      => $data,
            'total_gaji'=> $total_gaji,
            'bulan'     => $bulan,
            'tahun'     => $tahun
        ]);
        // return $pdf->download('Laporan-Gaji.pdf');

        return view ('manager.laporanGaji.printGaji', [
            'data'      => $data,
            'total_gaji'=> $total_gaji,
            'bulan'     => $bulan,
            'tahun'     => $tahun
        ]);
    }
}
