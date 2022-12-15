<?php

namespace App\Http\Controllers\Hrd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use RealRashid\SweetAlert\Facades\Alert;

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
        $request->validate([
            'namajabatan'=>'required',
        ]);

        Jabatan::create([
            'nama_jabatan' => $request->namajabatan,
        ]);

        return redirect()->route('show_jabatan')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    function tampilEditJabatan($id){
        $jabatan = Jabatan::find($id);
        return view('hrd/jabatan/editJabatan', [
            'data'  => $jabatan
        ]);
    }
    
    function editJabatan($id, Request $request){
        $request->validate([
            'namajabatan'  => 'required'
        ]);
        $data_jabatan = Jabatan::find($id);
        $data_jabatan -> nama_jabatan = $request->namajabatan;
        $data_jabatan -> save();

        return redirect()->route('show_jabatan')->with('toast_success', 'Data Berhasil Diubah');
    }

    function hapusJabatan($id){
        $hapus_jabatan = Jabatan::find($id);
        $hapus_jabatan->delete();
        return redirect()->route('show_jabatan')->with('toast_success', 'Data Berhasil Dihapus');
    }
}
