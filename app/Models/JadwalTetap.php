<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTetap extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'mata_kuliah',
        'dosen_pengampu',
        'kelas_prodi',
        'angkatan',
    ];

    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }
}