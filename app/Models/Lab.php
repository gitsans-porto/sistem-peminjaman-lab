<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\LabStatus;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_lab',
        'nama_lab',
        'kapasitas',
        'lokasi',
        'status',
        'fasilitas',
    ];

    Protected $casts = [
        'status' => LabStatus::class,
    ];

    public function jadwalTetaps()
    {
        return $this->hasMany(JadwalTetap::class, 'lab_id');
    }

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'lab_id');
    }
}