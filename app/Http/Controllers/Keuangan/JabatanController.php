<?php

namespace App\Http\Controllers\Keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    function tampilJabatan(){
        $data = Jabatan::all();
        return view('keuangan/jabatan/jabatan', [
            'jabatan' => $data,
        ]);
    }

    function tambahJabatan(){
        $option_jabatan = Jabatan::all();
        return view('keuangan/jabatan/tambahJabatan', [
            'option_jabatan' => $option_jabatan,
        ]);
    }

    
    function createJabatan(){
        return view('keuangan.jabatan.jabatan');
    }

    function storeJabatan(Request $request){
        // $jabatan = Jabatan::count()+1;
        // $jabatan_id = "900".$jabatan; 
        $request->validate([
            'namajabatan'=>'required',
        ]);

        Jabatan::create([
            // 'id_jabatan' => $jabatan_id,
            'nama_jabatan' => $request->namajabatan,
        ]);

        return redirect()->route('show_jabatan_keuangan')->with('success', 'Data Berhasil Ditambahkan');
    }
}
