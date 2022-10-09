<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanGajiController extends Controller
{
    function laporanGaji(){
        return view ('manager.laporanGaji.laporanGaji');
    }
}
