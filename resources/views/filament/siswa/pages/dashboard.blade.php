@extends('layouts.app')
@section('content')
<x-filament::page>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Menu Pengajar
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('pengajar.dashboard') }}" class="list-group-item list-group-item-action active">Dashboard</a>
                        <a href="{{ route('pengajar.kelas') }}" class="list-group-item list-group-item-action">Kelas Saya</a>
                        <a href="{{ route('pengajar.siswa') }}" class="list-group-item list-group-item-action">Daftar Siswa</a>
                        <a href="#" class="list-group-item list-group-item-action">Jadwal Mengajar</a>
                        <a href="#" class="list-group-item list-group-item-action">Profil</a>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Dashboard Siswa
                    </div>
                    <div class="card-body">
                        <h3>Selamat Datang, {{ Auth::user()->name }}!</h3>
                        <p>Ini adalah dashboard Siswa NgajiDek. Anda dapat mengelola kelas, siswa, dan jadwal mengajar dari sini.</p>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="card bg-info text-white">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Kelas Aktif</h5>
                                        <h2>0</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-success text-white">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Total Siswa</h5>
                                        <h2>0</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-warning text-white">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Jadwal Hari Ini</h5>
                                        <h2>0</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-filament::page>
@endsection