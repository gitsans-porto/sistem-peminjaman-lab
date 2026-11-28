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
                <div class="card-body">
                    @if ($peminjamanAktif)
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <small class="text-secondary d-block">Mata kuliah</small>
                                <h5 class="fw-bold mb-0 text-dark">{{ $peminjamanAktif->keperluan }}</h5>
                            </div>
                            <div>
                                @if ($peminjamanAktif->status === 'disetujui')
                                    <span class="badge bg-success-subtle text-success-emphasis px-3 py-2 rounded-2">
                                        Disetujui
                                    </span>
                                @elseif ($peminjamanAktif->status === 'pending')
                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-2">
                                        Pending
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            <small class="text-secondary d-block">Lab</small>
                            <div class="fw-bold text-dark">{{ $peminjamanAktif->lab->nama_lab }}</div>
                        </div>

                        @if ($peminjamanAktif->status === 'disetujui')
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <button type="button" class="btn w-100 py-2 text-white fw-medium" style="background-color: #001F3F;">
                                        Ambil Kunci
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-outline-danger w-100 py-2 fw-medium">
                                        Batalkan
                                    </button>
                                </div>
                            </div>
                        @else
                            <div>
                                <button type="button" class="btn btn-outline-danger w-100 py-2 fw-medium">
                                    Batalkan
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-inbox fs-1 text-secondary mb-2 d-block"></i>
                            <h5 class="fw-bold">Belum ada peminjaman aktif</h5>
                            <p class="text-secondary mb-0">Konfirmasi jadwal tetap di bawah untuk mulai meminjam lab.</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Jadwal tetap kelas Anda hari ini</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted text-center my-3">Belum ada jadwal tetap untuk hari ini.</p>
                    <a href="{{ route('mahasiswa.ajukan') }}" class="btn btn-outline-secondary w-100">
                        Ajukan Baru
                    </a>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Lab tersedia hari ini</h5>
                </div>
                <div class="card-body">
                    @forelse ($labs as $lab)
                        <div class="d-flex justify-content-between align-items-center py-2">
                            <div>
                                <div class="fw-bold">{{ $lab->nama_lab }}</div>
                                <small class="text-secondary">{{ $lab->kapasitas }} kursi, {{ $lab->lokasi }}</small>
                            </div>
                            <span class="badge {{ $lab->status === \App\Enums\LabStatus::Tersedia ? 'bg-success' : 'bg-warning text-dark' }} px-3 py-2">
                                {{ $lab->status->label() }}
                            </span>
                        </div>
                        @if (!$loop->last)
                            <hr class="my-2">
                        @endif
                    @empty
                        <p class="text-muted text-center my-3">Belum ada data laboratorium yang terdaftar.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
