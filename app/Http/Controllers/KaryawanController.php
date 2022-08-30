<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Jabatan;


class KaryawanController extends Controller
{
    function tampilKaryawan(){
        $data = Karyawan::join('jabatan', 'jabatan.ID_JABATAN', '=', 'karyawan.ID_JABATAN')->get();
        return view('hrd/karyawan/karyawan', [
            'karyawan' => $data
        ]);
    }

    function tambahKaryawan(){
        $nip = Karyawan::count()+1;
        $kode_nip = "500".$nip;
        $option_jabatan = Jabatan::all();
        return view('hrd/karyawan/tambahKaryawan', [
            'option_jabatan' => $option_jabatan,
            'kode_nip' => $kode_nip,
        ]);
    }

    function storeKaryawan(Request $request){
        $karyawan = Karyawan::count()+1;
        $karyawan_id = "500".$karyawan; 
        $request->validate([
            'namakaryawan'=>'required',
            'alamat'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'agama'=>'required',
            'gaji'=>'required',
            'jekel'=>'required',
            'telepon'=>'required',
        ]);

        Karyawan::create([
            'ID_KARYAWAN'=>$karyawan_id,
            'ID_JABATAN'=>$request->jabatan,
            'NAMA'=>$request->namakaryawan,
            'ALAMAT'=>$request->alamat,
            'TEMPAT_LAHIR'=>$request->tempat_lahir,
            'TANGGAL_LAHIR'=>$request->tanggal_lahir,
            'AGAMA'=>$request->agama,
            'GAJI'=>$request->gaji,
            'KELAMIN'=>$request->jekel,
            'TELEPON'=>$request->telepon,
        ]);
        return redirect()->route('show_jabatan')->with('success', 'Data Berhasil Ditambahkan');
    }
}
