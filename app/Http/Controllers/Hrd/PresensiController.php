<?php

namespace App\Http\Controllers\Hrd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Presensi;

class PresensiController extends Controller
{
    function index(){
        return view('hrd.presensi.presensi');
    }
}
