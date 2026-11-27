<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\User;
use App\Models\Peminjaman;
use App\Enums\LabStatus;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function beranda()
    {
        $mahasiswa = auth()->user();
        $labs = Lab::all(); 
        $peminjamanAktif = Peminjaman::with('lab')
            ->where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'disetujui'])
            ->latest()
            ->first();

        return view('mahasiswa.beranda', compact('mahasiswa', 'labs', 'peminjamanAktif'));
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

    public function ajukan()
    {
        $labs = Lab::all();
        return view('mahasiswa.ajukan', compact('labs'));
    }

    public function storeAjukan(Request $request)
    {
        $validated = $request->validate([
            'lab_id'             => 'required|exists:labs,id',
            'tanggal_peminjaman' => 'required|date',
            'jam_mulai'          => 'required',
            'jam_selesai'        => 'required|after:jam_mulai',
            'keperluan'          => 'required|string|max:200',
        ]);

        $lab = Lab::findOrFail($validated['lab_id']);
        if ($lab->status === LabStatus::Maintenance) {
            return back()->withErrors(['lab_id' => 'Laboratorium ini sedang dalam masa maintenance dan tidak bisa dipinjam.'])->withInput();
        }

        Peminjaman::create([
        'user_id'            => auth()->id(), 
        'lab_id'             => $validated['lab_id'],
        'tipe_peminjaman'    => 'non_jadwal', 
        'tanggal_peminjaman' => $validated['tanggal_peminjaman'],
        'jam_mulai'          => $validated['jam_mulai'],
        'jam_selesai'        => $validated['jam_selesai'],
        'keperluan'          => $validated['keperluan'],
    ]);
    return redirect()->route('mahasiswa.beranda');
    }
}

