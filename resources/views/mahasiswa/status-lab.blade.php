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

            </tbody>
        </table>
    </div>
    <div class="alert alert-warning d-flex align-items-center mb-0" role="alert">
        <i class="bi bi-exclamation-triangle me-2"></i>
        <span>Lab berstatus maintenance tidak bisa dipinjam sampai Aslab mengubah statusnya kembali menjadi
            tersedia.</span>
    </div>
@endsection