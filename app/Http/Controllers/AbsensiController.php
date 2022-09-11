<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;


class AbsensiController extends Controller
{
    function tampilPresensi(){
        $optionkaryawan = Karyawan::all();
        return view('absen.absen', [
            'karyawan' => $optionkaryawan
        ]);
    }
}
