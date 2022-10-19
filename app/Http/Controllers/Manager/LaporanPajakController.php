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
}
