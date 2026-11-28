@extends('layout.master')

@section('header')
    <h2>Status Lab</h2>
@endsection

@section('title')

@section('card-header')
    <h5>Status Ruangan</h5>
@endsection

@section('card-body')

    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama lab</th>
                    <th>Status</th>
                    <th>Kapasitas</th>
                    <th>Lokasi</th>
                    <th>Fasilitas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($labs as $lab)
                    <tr>
                        <td>{{ $lab->kode_lab }}</td>
                        <td>{{ $lab->nama_lab }}</td>
                        <td>
                            <span
                                class="badge {{ $lab->status === \App\Enums\LabStatus::Tersedia ? 'bg-succes' : 'bg-warning text-dark'}} px-3 px-2">{{ $lab->status->label() }}</span>
                        </td>
                        <td>{{ $lab->kapasitas }}</td>
                        <td>{{ $lab->lokasi }}</td>
                        <td>{{ $lab->fasilitas ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-secondary py-4">Belum ada data lab.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="alert alert-warning d-flex align-items-center mb-0" role="alert">
        <i class="bi bi-exclamation-triangle me-2"></i>
        <span>Lab berstatus maintenance tidak bisa dipinjam sampai Aslab mengubah statusnya kembali menjadi
            tersedia.</span>
    </div>
@endsection