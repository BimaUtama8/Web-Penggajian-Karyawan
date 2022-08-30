<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function hrdIndex()
    {
        return view('hrd.index');
    }

    public function keuanganIndex()
    {
        return view('keuangan.index');
    }
}
