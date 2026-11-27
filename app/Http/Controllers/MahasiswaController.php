<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lab;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function beranda(){
        $mahasiswa = auth()->user();
        $labs = Lab::all();
        return view('mahasiswa.beranda', compact('mahasiswa', 'labs'));
    } 

    public function riwayat(){
        return view('mahasiswa.riwayat');
    } 

    public function statusLab(){
        return view('mahasiswa.status-lab');
    } 

    public function notifikasi(){
        return view('mahasiswa.notifikasi');
    } 

    public function akun(){
        return view('mahasiswa.akun');
    } 

    public function ajukan()
    {
    return view('mahasiswa.ajukan', compact('labs'));
    }
}

