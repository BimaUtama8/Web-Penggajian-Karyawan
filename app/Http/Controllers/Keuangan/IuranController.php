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
        $jht = Iuran::where('id_setting', 1)->first();
        $jp = Iuran::where('id_setting', 2)->first();
        return view('keuangan/iuran/iuran', [
            'karyawan' => $data,
            'jht' => $jht,
            'jp' => $jp
        ]);
    }

    function tampilEditIuran(){
        $jht = Iuran::where('id_setting', 1)->first();
        $jp = Iuran::where('id_setting', 2)->first();
        return view('keuangan/iuran/editIuran',[
            'jht' => $jht,
            'jp' => $jp
        ]);
    }

    function editIuran(Request $request){
        $request->validate([
            'jht' => 'required',
            'jp'  => 'required'
        ]);

        $updatejht = Iuran::where('id_setting', 1)->first();
        $updatejht -> jht = $request->jht;
        $updatejht -> save();

        $updatejp = Iuran::where('id_setting', 2)->first();
        $updatejp -> jp = $request->jp;
        $updatejp -> save();

        return redirect()->route('show_iuran')->with('success', 'Data Berhasil Diubah');
    }
}
