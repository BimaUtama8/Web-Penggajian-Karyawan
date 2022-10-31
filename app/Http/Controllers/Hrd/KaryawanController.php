<?php

namespace App\Http\Controllers\Hrd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    function detailKaryawan($id, Request $request){
        $karyawan = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')->where('id_karyawan', $id)->get();

        return view('hrd.karyawan.detailKaryawan', [
            'karyawan'  => $karyawan
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
            'namakaryawan'  =>'required',
            'alamat'        =>'required',
            'tempat_lahir'  =>'required',
            'tanggal_lahir' =>'required',
            'agama'         =>'required',
            'gaji'          =>'required',
            'jekel'         =>'required',
            'telepon'       =>'required',
            'tanggungan'    =>'required',
            'status'        =>'required',
        ]);

        $id_user = User::orderBy('id_user', 'desc')->first()->id_user+1;
        $id_karyawan = Karyawan::orderBy('id_karyawan', 'desc')->first()->id_karyawan+1;
        $karyawan = Karyawan::count()+1;
        $karyawan_id = "500".$karyawan; 
        Karyawan::create([
            'id_karyawan'   =>$karyawan_id,
            'id_user'       =>$id_user,
            'id_jabatan'    =>$request->jabatan,
            'nama'          =>$request->namakaryawan,
            'alamat'        =>$request->alamat,
            'tempat_lahir'  =>$request->tempat_lahir,
            'tanggal_lahir' =>$request->tanggal_lahir,
            'agama'         =>$request->agama,
            'gaji'          =>$request->gaji,
            'kelamin'       =>$request->jekel,
            'telepon'       =>$request->telepon,
            'tanggungan'    =>$request->tanggungan,
            'status'        =>$request->status,
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
            'id_karyawan'   =>$id_karyawan,
            'email'         =>$request->email,
            'password'      =>bcrypt('12345'),
            'level'         =>$jabatan,
            'active'        =>1,
        ]);
        
        return redirect()->route('show_gaji')->with('success', 'Data Berhasil Ditambahkan');
    }

    function tampilEditKaryawan($id){
        $karyawan = Karyawan::find($id);
        $option_jabatan = Jabatan::find($id);
        return view('hrd/karyawan/editKaryawan', [
            'data' => $karyawan
        ]);
    }

    function editKaryawan($id, Request $request){
        $request->validate([
            'namakaryawan'  =>'required',
            'alamat'        =>'required',
            'tempat_lahir'  =>'required',
            'tanggal_lahir' =>'required',
            'agama'         =>'required',
            'gaji'          =>'required',
            'jekel'         =>'required',
            'telepon'       =>'required',
            'tanggungan'    =>'required',
            'status'        =>'required',
        ]);
        $data_karyawan = Karyawan::find($id);
        $data_karyawan -> nama          = $request -> namakaryawan;
        $data_karyawan -> alamat        = $request -> alamat;
        $data_karyawan -> tempat_lahir  = $request -> tempat_lahir;
        $data_karyawan -> tanggal_lahir = $request -> tanggal_lahir;
        $data_karyawan -> agama         = $request -> agama;
        $data_karyawan -> gaji          = $request -> gaji;
        $data_karyawan -> kelamin       = $request -> jekel;
        $data_karyawan -> telepon       = $request -> telepon;
        $data_karyawan -> tanggungan    = $request -> tanggungan;
        $data_karyawan -> status        = $request -> status;
        $data_karyawan -> save();

        return redirect()->route('show_karyawan')->with('success', 'Data Berhasil Diubah');
    }

    function hapusKaryawan($id){
        $hapus_karyawan = Karyawan::find($id);
        $hapus_karyawan->delete();
        return redirect()->route('show_karyawan')->with('success', 'Data Berhasil Dihapus');
    }
}
