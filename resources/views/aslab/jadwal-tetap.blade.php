@extends('layout.master')

@section('custom-content')
<main class="app-main">
    <div class="app-content-header py-3">
        <div class="container-fluid">
            {{-- <h3 class="mb-0">Jadwal Tetap Lab</h3> --}}
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="card shadow-sm">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 fw-bold p-1 flex-grow-1 mb-0">
                        <i class="bi bi-calendar-week me-2"></i>Jadwal Tetap Lab
                    </h5>
                    <div class="p-2">
                        <a href="" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahJadwal">
                        <i class="bi bi-plus-circle"></i> Tambah</a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Lab</th>
                                    <th scope="col">Hari</th>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Mata Kuliah</th>
                                    <th scope="col">Dosen</th>
                                    <th scope="col">Kelas / Prodi</th>
                                    <th scope="col">Angkatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwal as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->lab->nama_lab ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{ ucfirst($item->hari) }}
                                        </span>
                                    </td>
                                    <td>
                                    {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                                    </td>
                                    <td>{{ $item->mata_kuliah }}</td>
                                    <td>{{ $item->dosen_pengampu }}</td>
                                    <td>{{ $item->kelas_prodi }}</td>
                                    <td>{{ $item->angkatan }}</td>
                                    <td>
                                        <button 
                                            type="button" 
                                            class="btn btn-outline-warning btn-sm"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalEditJadwal"
                                            data-id="{{ $item->id }}"
                                            data-lab="{{ $item->lab_id }}"
                                            data-hari="{{ $item->hari }}"
                                            data-jam-mulai="{{ $item->jam_mulai }}"
                                            data-jam-selesai="{{ $item->jam_selesai }}"
                                            data-mata-kuliah="{{ $item->mata_kuliah }}"
                                            data-dosen="{{ $item->dosen_pengampu }}"
                                            data-kelas="{{ $item->kelas_prodi }}"
                                            data-angkatan="{{ $item->angkatan }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#DeleteModal"
                                            data-action="{{ route('aslab.jadwal-tetap.destroy', $item->id) }}"
                                            data-nama="{{ $item->mata_kuliah }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox fs-4 d-block mb-1"></i>
                                        Belum ada jadwal tetap.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Untuk Tambah Jadwal Tetap --}}
    <div class="modal fade" id="modalTambahJadwal" tabindex="-1" aria-labelledby="modalTambahJadwalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalTambahJadwalLabel">Tambah Jadwal Tetap</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="{{ route('aslab.jadwal-tetap.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Lab</label>
                            <select name="lab_id" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Lab --</option>
                                @foreach ($labs as $lab)
                                    <option value="{{ $lab->id }}">{{ $lab->nama_lab }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Hari</label>
                            <select name="hari" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Hari --</option>
                                @foreach (['senin','selasa','rabu','kamis','jumat','sabtu'] as $hari)
                                    <option value="{{ $hari }}">{{ ucfirst($hari) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label fw-semibold">Jam Mulai</label>
                                <input type="time" name="jam_mulai" class="form-control" required>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label fw-semibold">Jam Selesai</label>
                                <input type="time" name="jam_selesai" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" class="form-control" placeholder="Nama mata kuliah" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Dosen Pengampu</label>
                            <input type="text" name="dosen_pengampu" class="form-control" placeholder="Nama dosen" required>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label fw-semibold">Kelas / Prodi</label>
                                <input type="text" name="kelas_prodi" class="form-control" placeholder="cth: TI-A" required>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label fw-semibold">Angkatan</label>
                                <input type="text" name="angkatan" class="form-control" placeholder="cth: 2023" required>
                            </div>
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
    {{-- Akhiran Modal Untuk Tambah Jadwal Tetap --}}

    {{-- Modal untuk Edit Jadwal Tetap --}}
    <div class="modal fade" id="modalEditJadwal" tabindex="-1" aria-labelledby="modalEditJadwalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalEditJadwalLabel">Edit Jadwal Tetap</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form id="formEditJadwal" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Lab</label>
                            <select name="lab_id" id="edit_lab_id" class="form-select" required>
                                @foreach ($labs as $lab)
                                    <option value="{{ $lab->id }}">{{ $lab->kode_lab }} - {{ $lab->nama_lab }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Hari</label>
                            <select name="hari" id="edit_hari" class="form-select" required>
                                @foreach (['senin','selasa','rabu','kamis','jumat','sabtu'] as $hari)
                                    <option value="{{ $hari }}">{{ ucfirst($hari) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label fw-semibold">Jam Mulai</label>
                                <input type="time" name="jam_mulai" id="edit_jam_mulai" class="form-control" required>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label fw-semibold">Jam Selesai</label>
                                <input type="time" name="jam_selesai" id="edit_jam_selesai" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" id="edit_mata_kuliah" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Dosen Pengampu</label>
                            <input type="text" name="dosen_pengampu" id="edit_dosen_pengampu" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label fw-semibold">Kelas / Prodi</label>
                                <input type="text" name="kelas_prodi" id="edit_kelas_prodi" class="form-control" required>
                            </div>
                            <div class="col mb-3">
                                <label class="form-label fw-semibold">Angkatan</label>
                                <input type="text" name="angkatan" id="edit_angkatan" class="form-control" required>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- Akhiran Modal untuk Edit Jadwal Tetap --}}

    {{-- Modal untuk Hapus Jadwal Tetap --}}
    <div class="modal fade" id="DeleteModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog">
            <form id="deleteForm" action="" method="POST" class="modal-content">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-0">
                        Yakin ingin menghapus jadwal <strong id="deleteNama"></strong>?<br>
                        Data yang dihapus tidak dapat dikembalikan.
                    </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Akhiran Modal untuk Hapus Jadwal Tetap --}}


    @if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <script>
        const modalEdit = document.getElementById('modalEditJadwal')
        modalEdit.addEventListener('show.bs.modal', function (event) {
            const btn = event.relatedTarget
            // Ambil data dari tombol
            const id          = btn.getAttribute('data-id')
            const lab         = btn.getAttribute('data-lab')
            const hari        = btn.getAttribute('data-hari')
            const jamMulai    = btn.getAttribute('data-jam-mulai')
            const jamSelesai  = btn.getAttribute('data-jam-selesai')
            const mataKuliah  = btn.getAttribute('data-mata-kuliah')
            const dosen       = btn.getAttribute('data-dosen')
            const kelas       = btn.getAttribute('data-kelas')
            const angkatan    = btn.getAttribute('data-angkatan')
            // Set action form sesuai id jadwal
            document.getElementById('formEditJadwal').action = `/aslab/jadwal-tetap/${id}`
            // Isi field modal
            document.getElementById('edit_lab_id').value      = lab
            document.getElementById('edit_hari').value        = hari
            document.getElementById('edit_jam_mulai').value   = jamMulai
            document.getElementById('edit_jam_selesai').value = jamSelesai
            document.getElementById('edit_mata_kuliah').value = mataKuliah
            document.getElementById('edit_dosen_pengampu').value = dosen
            document.getElementById('edit_kelas_prodi').value = kelas
            document.getElementById('edit_angkatan').value    = angkatan
        })

    // Script untuk delete Jadwal tetap
    document.getElementById('DeleteModal').addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;
        if (!btn) return;

        document.getElementById('deleteForm').action = btn.dataset.action;
        document.getElementById('deleteNama').textContent = btn.dataset.nama;
    });
</script>
</main>
@endsection