<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Presensi;


class AbsensiController extends Controller
{
    function tampilPresensi(){
        $optionkaryawan = Karyawan::all();
        return view('absen.absen', [
            'karyawan' => $optionkaryawan
        ]);
    }

    function cekPresensi(Request $request){

        $request->validate([
            'karyawan'=>'required',
        ]);

        $absensi = Presensi::join('karyawan', 'karyawan.id_karyawan', '=', 'presensi.id_karyawan')
        ->where('karyawan.id_karyawan', $request->karyawan)->orderBy('presensi.masuk', 'DESC')
        ->get();
        //dd($absensi);
        return view('absen.cekPresensi', [
            'absensi' => $absensi
        ]);
    }
    function cekInAbsen(Request $request){
        Presensi::create([
            'id_karyawan' => $request->id_karyawan,
            'masuk' => now(),
            'status' => 1,
        ]);
        return redirect()->route('presensi')->with('success', 'Data Berhasil Ditambahkan');
    }
    function cekOutAbsen(Request $request){
        $absen = Presensi::where('id_karyawan',$request->id_karyawan)
        ->where('keluar',null)
        ->first();
        $absen->keluar = now();
        $absen->save();
        return redirect()->route('presensi')->with('success', 'Data Berhasil Ditambahkan');
    }
}
