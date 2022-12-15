<?php

namespace App\Http\Controllers\Hrd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Iuran;
use App\Models\Presensi;
use App\Models\Jabatan;
use App\Models\Transaksi;
use App\Models\User;
use PDF;

class KaryawanController extends Controller
{
    function tampilKaryawan(){
        $data = Karyawan::leftjoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')->get();
        return view('hrd/karyawan/karyawan', [
            'karyawan' => $data
        ]);
    }

    function tampilSlip(){
        $gaji = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')
        ->join('transaksi', 'transaksi.id_karyawan', '=', 'karyawan.id_karyawan')
        ->where('status_slip', 2)
        ->where('total_tmakan', '>', 0)
        ->get();
        
        return view ('hrd.karyawan.slipGaji', [
            'gaji'  => $gaji,
        ]);
    }

    function print($id){
        $cetak = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')
        ->join('transaksi', 'transaksi.id_karyawan', '=', 'karyawan.id_karyawan')
        ->where('transaksi.id_gaji', $id)
        ->first();
        
        $potongan = $cetak->jaminan_ht + $cetak->jaminan_p + $cetak->biaya_jabatan;

        // dibawah ini untuk cek view manual html
        return view ('hrd.karyawan.print', [
            'cetak'   => $cetak,
            'potongan'=> $potongan
        ]);
    }

    function printSpt($id){
        $cetak = Karyawan::join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.id_jabatan')
        ->join('transaksi', 'transaksi.id_karyawan', '=', 'karyawan.id_karyawan')
        ->where('transaksi.id_gaji', $id)
        ->first();
        
        $penghasilan_bersih = $cetak->penghasilan_bruto - $cetak->biaya_jabatan - $cetak->jaminan_ht - $cetak->jaminan_p;
        $orderdate      = explode('-', $cetak['tanggal_masuk']);
            $year           = $orderdate[0];
            $selisih_thn    = date('Y')-$year;
            $month          = $orderdate[1];
            $selisih        = 12 - $month;
            $kali = 0 + $selisih;
            $penghasilan_setahun = 0;
            for($i = 0; $i <= $selisih; $i++){
                if($selisih == $i && $selisih_thn == 0){
                    $penghasilan_setahun = $penghasilan_bersih * $kali;
                }else if($selisih_thn > 0){
                    $penghasilan_setahun = $penghasilan_bersih * 12;
                }else{
                    $penghasilan_setahun = 0;
                }
            }
        
            $pajak_penghasilan = 0;
            if($cetak['status'] == 'Tidak Menikah' && $cetak['tanggungan'] == '0'){
                $pajak_penghasilan = 54000000;
            }else if($cetak['status'] == 'Tidak Menikah' && $cetak['tanggungan'] == '1'){
                $pajak_penghasilan = 58500000;
            }else if($cetak['status'] == 'Tidak Menikah' && $cetak['tanggungan'] == '2'){
                $pajak_penghasilan = 63000000;
            }else if($cetak['status'] == 'Tidak Menikah' && $cetak['tanggungan'] == '3'){
                $pajak_penghasilan = 67500000;
            }else if($cetak['status'] == 'Menikah' && $cetak['tanggungan'] == '0'){
                $pajak_penghasilan = 58500000;
            }else if($cetak['status'] == 'Menikah' && $cetak['tanggungan'] == '1'){
                $pajak_penghasilan = 63000000;
            }else if($cetak['status'] == 'Menikah' && $cetak['tanggungan'] == '2'){
                $pajak_penghasilan = 67500000;
            }else if($cetak['status'] == 'Menikah' && $cetak['tanggungan'] == '3'){
                $pajak_penghasilan = 72000000;
            }else{
                $pajak_penghasilan = 0;
            }    

        $pkp_setahun   = $penghasilan_setahun-$pajak_penghasilan;   
        $tunjangan_pph = $cetak->pajak_penghasilan/12;
        $tunjangan     = $cetak->total_tmakan + $cetak->total_ttransportasi + $cetak->upah_lembur;
        $hasil_bruto   = $cetak->gaji + $tunjangan + $tunjangan_pph;
        $potongan      = $cetak->jaminan_ht + $cetak->jaminan_p + $cetak->biaya_jabatan;
        

        // dibawah ini untuk cek view manual html
        return view ('hrd.karyawan.printSpt', [
            'cetak'                 => $cetak,
            'potongan'              => $potongan,
            'penghasilan_setahun'   => $penghasilan_setahun,
            'tunjangan'             => $tunjangan,
            'hasil_bruto'           => $hasil_bruto,
            'tunjangan_pph'         => $tunjangan_pph,
            'pajak_penghasilan'     => $pajak_penghasilan,
            'pkp_setahun'           => $pkp_setahun
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
            'tanggal_masuk' =>'required',
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
            'tanggal_masuk' =>$request->tanggal_masuk,
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
        
        return redirect()->route('show_karyawan')->with('toast_success', 'Data Berhasil Ditambahkan');
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
            'tanggal_masuk' =>'required',
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
        $data_karyawan -> tanggal_masuk = $request -> tanggal_masuk;
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

        return redirect()->route('show_karyawan')->with('toast_success', 'Data Berhasil Diubah');
    }

    function hapusKaryawan($id){
        $hapus_karyawan = Karyawan::find($id);
        $hapus_karyawan->delete();
        return redirect()->route('show_karyawan')->with('toast_success', 'Data Berhasil Dihapus');
    }

}
