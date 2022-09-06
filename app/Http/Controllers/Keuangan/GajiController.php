<?php

namespace App\Http\Controllers\Keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gaji;

class GajiController extends Controller
{
    function index(){
        return view('keuangan.gaji.gaji');
    }
}
