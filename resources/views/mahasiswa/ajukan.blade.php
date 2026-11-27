@extends('layout.master')

@section('header')
    <div>
        <h4 class="mb-0 fw-bold">Ajukan Peminjaman</h4>
    </div>
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

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title fw-bold mb-0">Perhatikan Sebelum Meminjam!</h5>
                </div>
                <div class="card-body">
                    <p class="mb-2">Pengajuan masuk ke Aslab untuk ditinjau. Hasilnya muncul di Notifikasi.</p>
                    <p class="mb-2">Kalau lab yang diminta penuh, Aslab bisa menawarkan lab terjadwal yang tidak terpakai.</p>
                    <p class="mb-0">Pembatalan hanya bisa selama status masih Menunggu atau Ditawari.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-block">
                    <h5 class="fw-bold mb-1">Data peminjaman</h5>
                    <p class="text-secondary small mb-0">Lengkapi lab, tanggal, jam, dan keperluan. Sistem memeriksa ketersediaan dan konflik jadwal sebelum pengajuan dikirim.</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.ajukan.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="lab_id" class="form-label fw-medium">Lab</label>
                            <select name="lab_id" id="lab_id" class="form-select" required>
                                <option value="" disabled selected>Pilih Laboratorium</option>
                                @foreach ($labs as $lab)
                                    <option value="{{ $lab->id }}" {{ $lab->status === \App\Enums\LabStatus::Maintenance ? 'disabled' : '' }}>
                                        {{ $lab->nama_lab }} {{ $lab->status === \App\Enums\LabStatus::Maintenance ? '(Maintenance - Tidak bisa dipinjam)' : '' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lab_id')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_peminjaman" class="form-label fw-medium">Tanggal</label>
                            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="form-control" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jam_mulai" class="form-label fw-medium">Jam mulai</label>
                                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="jam_selesai" class="form-label fw-medium">Jam selesai</label>
                                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="keperluan" class="form-label fw-medium">Keperluan</label>
                            <textarea name="keperluan" id="keperluan" rows="4" class="form-control" 
                                      placeholder="isi keperluan peminjaman lab disini" required></textarea>
                        </div>

                        <div class="row g-2">
                            <div class="col-md-6">
                                <button type="submit" class="btn w-100 py-2 text-white fw-medium" style="background-color: #001F3F;">
                                    Kirim pengajuan
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('mahasiswa.beranda') }}" class="btn btn-outline-secondary w-100 py-2 fw-medium">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="alert alert-warning border border-warning d-flex align-items-center mb-4" role="alert" 
                 style="background-color: #fffbeb; color: #854d0e;">
                <i class="bi bi-exclamation-triangle me-2 fs-5"></i>
                <div>Kunci diambil sendiri di meja depan Ruang Server dengan menaruh KTM.</div>
            </div>

        </div>
    </div>
</main>
@endsection
