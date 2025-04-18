<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\NotifikasiPengajar;
use Illuminate\Support\Facades\Notification;

class KelasController extends Controller
{
    public function index()
{
    $kelas = Order::where('user_id', auth()->id())->where('status', 'success')->with('course')->get();
    return view('kelas.index', compact('kelas'));
}
public function tambahKelas(Request $request)
{
    // Simpan kelas baru ke database
    $kelas = Kelas::create($request->all());

    // Ambil semua pengajar
    $pengajar = User::where('role', 'pengajar')->get();

    // Kirim notifikasi ke semua pengajar
    Notification::send($pengajar, new NotifikasiPengajar());

    return redirect()->back()->with('success', 'Kelas berhasil ditambahkan dan notifikasi dikirim ke pengajar.');
}

}
