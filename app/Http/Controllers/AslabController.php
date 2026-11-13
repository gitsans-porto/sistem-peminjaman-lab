<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AslabController extends Controller
{
    public function pengajuan(){
        $roleAktif = 'aslab';
        return view('aslab.pengajuan',['role' => $roleAktif]);
    }

    public function statuslab(){
        $roleAktif = 'aslab';
        return view('aslab.status-lab',['role' => $roleAktif]);
    }

    public function jadwaltetap(){
        $roleAktif = 'aslab';
        return view('aslab.jadwal-tetap',['role' => $roleAktif]);
    }

    public function RiwayatPeminjaman(){
        $roleAktif = 'aslab';
        return view('aslab.rekap-peminjaman',['role' => $roleAktif]);
    }

    public function akun(){
        $roleAktif = 'aslab';
        return view('aslab.akun',['role' => $roleAktif]);
    }
}
