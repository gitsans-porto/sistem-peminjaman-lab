<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function beranda()
    {
        $mahasiswa = auth()->user();
        return view('mahasiswa.beranda', compact('mahasiswa'));
    }

    public function riwayat()
    {
        return view('mahasiswa.riwayat');
    }

    public function statusLab()
    {
        $labs = Lab::orderBy('kode_lab')->get();
        return view('mahasiswa.status-lab', compact('labs'));
    }

    public function notifikasi()
    {
        return view('mahasiswa.notifikasi');
    }

    public function akun()
    {
        return view('mahasiswa.akun');
    }
}

