<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\User;


class KaryawanController extends Controller
{
    function tampilKaryawan(){
        $data = Karyawan::leftjoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')->get();
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
        
        $request->validate([
            'namakaryawan'=>'required',
            'alamat'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'agama'=>'required',
            'gaji'=>'required',
            'jekel'=>'required',
            'telepon'=>'required',
            'tanggungan'=>'required',
            'status'=>'required',
        ]);

        $id_user = User::orderBy('id_user', 'desc')->first()->id_user+1;
        $id_karyawan = Karyawan::orderBy('id_karyawan', 'desc')->first()->id_karyawan+1;
        $karyawan = Karyawan::count()+1;
        $karyawan_id = "500".$karyawan; 
        Karyawan::create([
            'id_karyawan'=>$karyawan_id,
            'id_user'=>$id_user,
            'id_jabatan'=>$request->jabatan,
            'nama'=>$request->namakaryawan,
            'alamat'=>$request->alamat,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'agama'=>$request->agama,
            'gaji'=>$request->gaji,
            'kelamin'=>$request->jekel,
            'telepon'=>$request->telepon,
            'tanggungan'=>$request->tanggungan,
            'status'=>$request->status,
        ]);

        if($request->jabatan == '9002'){
            $jabatan = 'manager';
        }elseif($request->jabatan == '9003'){
            $jabatan = 'hrd';
        }elseif($request->jabatan == '9004'){
            $jabatan = 'keuangan';
        }else{
            $jabatan = NULL;
        }
        User::create([
            'id_karyawan'=>$id_karyawan,
            'email'=>$request->email,
            'password'=>bcrypt('12345'),
            'level'=>$jabatan,
            'active'=>1,
        ]);
        
        return redirect()->route('show_karyawan')->with('success', 'Data Berhasil Ditambahkan');
    }
}
