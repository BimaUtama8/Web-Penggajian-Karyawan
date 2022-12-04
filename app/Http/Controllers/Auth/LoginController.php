<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use Auth;

class LoginController extends Controller
{
    use Notifiable;

    public function index(){
        return view('login.login'); 
    }

    public function login(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            if(Auth::user()->level == 'hrd'){
                return redirect(Auth::user()->level.'/karyawan');
            }else if(Auth::user()->level == 'keuangan'){
                return redirect(Auth::user()->level.'/jabatan');
            }else{
                return redirect(Auth::user()->level.'/validasi/validasiGaji');
            }
            
        }
        return redirect('/')->withErrors(['Alamat Email atau Kata Sandi Salah']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
