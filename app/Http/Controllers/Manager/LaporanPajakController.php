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

class LaporanPajakController extends Controller
{
    function laporanPajak(){
        $tahun = Presensi::selectRaw('YEAR(masuk) as tahun')
        ->groupBy('tahun')
        ->get();

        return view ('manager.laporanPajak.laporanPajak', [
            'tahun' => $tahun,
        ]);
    }

    function laporanBulan(){
        $tahun = Presensi::selectRaw('YEAR(masuk) as tahun')
        ->groupBy('tahun')
        ->get();
        return view('manager.laporanPajak.laporanBulan', [
            'tahun' => $tahun,
        ]);
    }

    function printPajak(Request $request){
        $this->validate($request,[
            'tahun' => 'required'
        ]);

        $tahun = $request->tahun;
        $data = Karyawan::join('transaksi', 'transaksi.id_karyawan', '=', 'karyawan.id_karyawan')
        ->where('transaksi.tahun', $tahun)
        ->where('transaksi.status_slip', 2)
        ->get();

        $total_pajak = Transaksi::sum('pajak_penghasilan');

        $pdf = PDF::loadview('manager.laporanPajak.printPajak',[
            'data'      => $data,
            'total_pajak' => $total_pajak,
            'tahun'     => $tahun
        ]);
        // return $pdf->download('Laporan-Pajak.pdf');

        // dibawah ini untuk cek view manual html
        return view ('manager.laporanPajak.printPajak', [
            'data'        => $data,
            'total_pajak' => $total_pajak,
            'tahun'     => $tahun
        ]);
    }

    function printBulan(Request $request){
        $this->validate($request,[
            'bulan' => 'required',
            'tahun' => 'required'
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $data = Karyawan::join('transaksi', 'transaksi.id_karyawan', '=', 'karyawan.id_karyawan')
        ->where('transaksi.bulan', $bulan)
        ->where('transaksi.tahun', $tahun)
        ->where('transaksi.status_slip', 2)
        ->get();

        // $pajak = $data[0]['pajak_pengasilan']/12;
        $pdf = PDF::loadview('manager.laporanPajak.printBulan',[
            'data'      => $data,
            'bulan'     => $bulan,
            'tahun'     => $tahun
        ]);
        // return $pdf->download('Laporan-Pajak.pdf')->setPaper($custom_paper);

        // dibawah ini untuk cek view manual html
        return view ('manager.laporanPajak.printBulan', [
            'data'        => $data,
            'bulan'       => $bulan,
            'tahun'       => $tahun
        ]);
    }
}
