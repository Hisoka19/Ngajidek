<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index()
    {
        return view('pengajar.dashboard');
    }

    public function kelas()
    {
        return view('pengajar.kelas');
    }

    public function siswa()
    {
        return view('pengajar.siswa');
    }
}
