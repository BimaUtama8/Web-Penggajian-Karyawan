<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Iuran;
use Illuminate\Http\Request;

class IuranController extends Controller
{
    function index(){
        return view('keuangan.iuran.iuran');
    }
}
