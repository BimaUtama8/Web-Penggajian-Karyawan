<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidasiController extends Controller
{
    function validasiGaji(){
        return view ('manager.validasi.validasiGaji');
    }
}
