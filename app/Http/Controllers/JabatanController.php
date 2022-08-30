<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    function tampilJabatan(){
        $data = Jabatan::all();
        return view('hrd/jabatan/jabatan', [
            'jabatan' => $data,
        ]);
    }

    function tambahJabatan(){
        $id_jabatan = Jabatan::count()+1;
        $kode_jabatan = "900".$id_jabatan;
        return view('hrd/jabatan/tambahJabatan', [
            'kode_jabatan' => $kode_jabatan,
        ]);
    }

    
    function createJabatan(){
        return view('hrd.jabatan.jabatan');
    }

    function storeJabatan(Request $request){
        // $jabatan = Jabatan::count()+1;
        // $jabatan_id = "900".$jabatan; 
        $request->validate([
            'namajabatan'=>'required',
            'tunjanganmakan'=>'required',
            'tunjangantransport'=>'required',
        ]);

        Jabatan::create([
            // 'id_jabatan' => $jabatan_id,
            'nama_jabatan' => $request->namajabatan,
            'tunjangan_makan' => $request->tunjanganmakan,
            'tunjangan_transportasi' => $request->tunjangantransport,
        ]);

        return redirect()->route('show_jabatan')->with('success', 'Data Berhasil Ditambahkan');
    }
}
