@extends('layout.master')
@section('header')
    <h2>Kelola Akun dan Akses</h2>
@endsection
@section('custom-content')
    <main class="app-main">
      <div class="app-content-header">
        <div class="container-fluid">
          <h3 class="mb-0">
          </h3>
        </div>
      </div>
      <div class="app-content">
        <div class="container-fluid">
            <!-- Card 1 -->
          <div class="card">
            <!-- Card Header -->
            <div class="card-header">
                <h1>Akun User Aktif</h1>
                <h5 class="card-title"></h5>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="border rounded-3 overflow-auto">
                    <table border="0" class="table table-bordered text-center align-middle mb-0">
                        <thead style="font-weight: bold;">
                            <tr>
                                <th scope="row">Nama</th>
                                <th scope="row">Email</th>
                                <th scope="row">NIM</th>
                                <th scope="row">Jenis Pengguna</th>
                                <th scope="row">Prodi dan Kelas</th>
                                <th scope="row">Nomor WA</th>
                                <th scope="row" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akun as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->nim_nip}}</td>
                                <td>
                                @php
                                    $i=0;
                                @endphp
                                @foreach($user->roles as $role)
                                    @if ($i > 0)
                                        ||
                                    @endif
                                        {{$role->nama_role}}
                                    @php
                                    $i++;
                                    @endphp
                                @endforeach
                                </td>
                                <td>{{$user->kelas_jurusan}}</td>
                                <td>{{$user->no_wa}}</td>
                                <td><form method="POST" action="{{ route('admin.delete', ['nim_nip'=>$user->nim_nip])}}"
                                    onsubmit="return confirm(@js('Yakin Ingin menghapus akun atas nama '.$user->name.'?'))">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                    </form>
                                <a href="{{ url('/update-user/'.$user->nim_nip) }}"><button type="button" class="btn btn-info"><i class="bi bi-pencil-square"></i></button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div><br>

            <!-- Card 2 Untuk Yang menampilkan akun yang sudah dihapus-->
          <div class="card" style="background-color: #001F3F; !important">
            <!-- Card Header -->
            <div class="card-header">
                <h1 style="color: white; !important;">Akun yang sudah dihapus</h1>
                <h5 class="card-title"></h5>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="border rounded-3 overflow-auto">
                    <table class="table table-dark table-bordered text-center align-middle mb-0">
                        <thead style="font-weight: bold;">
                            <tr >
                                <th scope="row">Nama</th>
                                <th scope="row">Email</th>
                                <th scope="row">NIM</th>
                                <th scope="row">Jenis Pengguna</th>
                                <th scope="row">Prodi dan Kelas</th>
                                <th scope="row">Nomor WA</th>
                                <th scope="row" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akundeleted as $user)
                            <tr>
                                <td>{{$user->name }}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->nim_nip}}</td>
                                <td>
                                @php
                                    $i=0;
                                @endphp
                                @foreach($user->roles as $role)
                                    @if ($i > 0)
                                        ||
                                    @endif
                                        {{$role->nama_role}}
                                    @php
                                    $i++;
                                    @endphp
                                @endforeach</td>
                                <td>{{$user->kelas_jurusan}}</td>
                                <td>{{$user->no_wa}}</td>
                                <td><a href="{{ url('/update-user/'.$user->nim_nip) }}"><button type="button" class="btn btn-info"><i class="bi bi-pencil-square"></i></button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

          </div>

      </div>

    </main>
@endsection