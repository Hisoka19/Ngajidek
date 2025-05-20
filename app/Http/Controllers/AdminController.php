<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|pengajar']);
    }

public function index()
{
    return redirect()->route('filament.admin.pages.dashboard'); // ✅ Arahkan ke Filament
}


    public function addPengajar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $pengajar = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $pengajar->assignRole('pengajar');

        return redirect()->route('admin.dashboard')->with('success', 'Pengajar berhasil ditambahkan');
    }
}
