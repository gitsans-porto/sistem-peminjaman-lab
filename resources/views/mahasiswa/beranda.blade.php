@extends('layout.master')

@section('header')
        <h4 class="mb-0 fw-bold">Beranda</h4>
@endsection

@section('custom-content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0"></h3>
        </div>
    </div>

     <div class="app-content">
        <div class="container-fluid">

            <div class="alert alert-info alert-dismissible" role="alert">
                <i class="bi bi-info-circle me-2"></i>
                Status lab diperbarui Aslab. Lab berstatus maintenance tidak bisa dipinjam.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Status Peminjaman</h5>
                </div>
                <div class="card-body text-center">
                    <i class="bi bi-inbox fs-1 text-secondary mb-2"></i>
                    <h5 class="fw-bold">Belum ada peminjaman aktif</h5>
                    <p class="text-secondary mb-0">Konfirmasi jadwal tetap di bawah untuk mulai meminjam lab.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Jadwal tetap kelas Anda hari ini</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted text-center">Belum ada jadwal tetap untuk hari ini.</p>
                    <button type="button" class="btn btn-outline-secondary w-100">Ajukan Baru</button>
                </div>
            </div>

             <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Lab tersedia hari ini</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted text-center">Data lab akan tampil di sini.</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
