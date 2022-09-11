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
        $data = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')->get();
        return view('keuangan/gaji/gaji', [
            'karyawan' => $data
        ]);
    }
}
