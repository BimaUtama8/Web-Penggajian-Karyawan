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
    function cekPresensi($id){

        // $request->validate([
        //     'karyawan'=>'required',
        // ]);
        $absensi = Presensi::join('karyawan', 'karyawan.id_karyawan', '=', 'presensi.id_karyawan')
        ->where('karyawan.id_karyawan', $id)->orderBy('presensi.masuk', 'DESC')
        ->get();
        // dd($absensi);
        return view('absen.cekPresensi', [
            'absensi' => $absensi
        ]);
    }
    function cekInAbsen($id){
        Presensi::create([
            'id_karyawan' => $id,
            'masuk' => now(),
            'status' => 1,
        ]);
        return redirect()->route('cek_presensi', $id)->with('success', 'Data Berhasil Ditambahkan');
    }
    function cekOutAbsen($id){
        $absen = Presensi::find($id);
        $absen -> keluar = date('Y-m-d H:i:s') ;
        $absen -> save();
        return redirect()->route('presensi')->with('success', 'Data Berhasil Ditambahkan');
    }
}
