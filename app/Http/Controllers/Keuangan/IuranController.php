<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Iuran;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class IuranController extends Controller
{
    function tampilIuran(){
        $data = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=','karyawan.id_jabatan')->get();
        return view('keuangan/iuran/iuran', [
            'karyawan' => $data
        ]);
    }
}
