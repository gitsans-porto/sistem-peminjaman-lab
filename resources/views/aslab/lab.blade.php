@extends('layout.master')

@section('header')
    <h2>Daftar Lab</h2>
@endsection

@section('title')

@section('card-header')
    <div class="d-flex align-items-center">
        <h6 class="p-1 flex-grow-1 mb-0">Daftar Laboratorium Komputer Jurusan Informatika</h6>

        <div class="p-2">
            <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle"></i> Tambah</a>
        </div>
    </div>
@endsection

@section('card-body')
   
    <table class="table table-bordered text-center align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lab</th>
                <th>Lokasi</th>
                <th>Kapasitas</th>
                <th>Fasilitas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($labs as $lab)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lab->nama_lab }}</td>
                    <td>{{ $lab->lokasi }}</td>
                    <td>{{ $lab->kapasitas }}</td>
                    <td>{{ $lab->fasilitas }}</td>
                    <td class="align-items-center">
                        <form action="{{ route('labs.toggle', $lab) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn {{ $lab->status->color() }}" style="min-width: 120px;">
                                  {{ $lab->status->label() }}
                            </button>
                        </form>
                    </td>
                    <td class="align-items-center">
                        <a href="#" class="btn btn-sm btn-outline-primary"">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('lab.destroy', $lab) }}" method="POST" class="d-inline form-hapus">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal untuk tambah data lab -->
    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Lab</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" action="{{ route('lab.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_lab" class="form-label">Kode Lab</label>
                        <input type="text" class="form-control" id="kode_lab" name="kode_lab" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_lab" class="form-label">Nama Lab</label>
                        <input type="text" class="form-control" id="nama_lab" name="nama_lab" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas</label>
                        <input for="floatinginput" type="number" class="form-control" id="kapasitas" name="kapasitas" required>
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Akhir Modal untuk tambah data lab  -->
    
    <!-- Script untuk notif perubahan status -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 3000,
            });
        </script>
    @endif
    
@endsection