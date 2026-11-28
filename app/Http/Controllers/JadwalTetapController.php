<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalTetap;
use App\Models\Lab;

class JadwalTetapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labs   = Lab::select('id', 'kode_lab', 'nama_lab')->get();
        $jadwal = JadwalTetap::with('lab')->orderBy('hari')->orderBy('jam_mulai')->get();
        return view('aslab.jadwal-tetap', compact('jadwal', 'labs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'lab_id'         => 'required|exists:labs,id',
            'hari'           => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
            'jam_mulai'      => 'required',
            'jam_selesai'    => 'required|after:jam_mulai',
            'mata_kuliah'    => 'required|string',
            'dosen_pengampu' => 'required|string',
            'kelas_prodi'    => 'required|string',
            'angkatan'       => 'required|string',
        ]);
        
        JadwalTetap::create($request->all());
        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jadwalTetap = JadwalTetap::findOrFail($id);
        $request->validate([
        'lab_id'         => 'required|exists:labs,id',
        'hari'           => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu,minggu',
        'jam_mulai'      => 'required',
        'jam_selesai'    => 'required|after:jam_mulai',
        'mata_kuliah'    => 'required|string',
        'dosen_pengampu' => 'required|string',
        'kelas_prodi'    => 'required|string',
        'angkatan'       => 'required|string',
        ]);

        $jadwalTetap->update($request->all());
        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalTetap $jadwalTetap)
    {
        $jadwalTetap->delete();
        return redirect()->back()->with('success', 'Jadwal berhasil dihapus!');
    }
}
