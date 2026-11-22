@extends('layout.auth')
@section('title', 'Daftar Akun - Peminjaman Lab')
@section('content')
    <div class="login-card">
        <h1>Daftar Akun</h1>
        <p class="card-sub">Lengkapi data diri Anda di bawah ini</p>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <span>Mohon periksa kembali data yang Anda masukkan.</span>
            </div>
        @endif

        <form method="POST" action="{{ url('/register') }}">
            @csrf

            <div class="field">
                <label for="name">Nama Lengkap</label>
                <input class="input" type="text" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Nama Lengkap" required autofocus>
                @error('name')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="nim_nip">NIM</label>
                <input class="input" type="text" id="nim_nip" name="nim_nip" value="{{ old('nim_nip') }}"
                    placeholder="Nomor Induk Mahasiswa" required>
                @error('nim_nip')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input class="input" type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="email@gmail.com" required>
                @error('email')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="no_wa">Nomor WhatsApp</label>
                <input class="input" type="text" id="no_wa" name="no_wa" value="{{ old('no_wa') }}"
                    placeholder="08xxxxxxxxxx" required>
                @error('no_wa')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="kelas_jurusan">Kelas dan Jurusan</label>
                <input class="input" type="text" id="kelas_jurusan" name="kelas_jurusan"
                    value="{{ old('kelas_jurusan') }}" placeholder="Contoh: SI A / Sistem Informasi" required>
                @error('kelas_jurusan')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <div class="field-control">
                    <input class="input" type="password" id="password" name="password" placeholder="Minimal 8 karakter" required>
                    <button class="field-toggle" type="button" id="toggle-password" aria-label="Tampilkan password" aria-pressed="false">
                        <i class="bi bi-eye icon-show"></i>
                        <i class="bi bi-eye-slash icon-hide"></i>
                    </button>
                </div>
                @error('password')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="password_confirmation">Konfirmasi Password</label>
                <div class="field-control">
                    <input class="input" type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                    <button class="field-toggle" type="button" id="toggle-password-confirmation" aria-label="Tampilkan password" aria-pressed="false">
                        <i class="bi bi-eye icon-show"></i>
                        <i class="bi bi-eye-slash icon-hide"></i>
                    </button>
                </div>
            </div>

            <button class="btn-primary" type="submit">Daftar Sekarang</button>
        </form>
    </div>

    <div class="register-row">
        <span>Sudah punya akun?</span>
        <a class="link" href="{{ route('login') }}">Login di sini</a>
    </div>
@endsection

@section('script')
    <script>
        function setupPasswordToggle(buttonId, inputId) {
            const toggleBtn = document.getElementById(buttonId);
            const passwordInput = document.getElementById(inputId);

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', function () {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    this.classList.toggle('is-revealed', isPassword);

                    this.setAttribute('aria-pressed', isPassword ? 'true' : 'false');
                    this.setAttribute('aria-label', isPassword ? 'Sembunyikan password' : 'Tampilkan Password');
                });
            }
        }

        setupPasswordToggle('toggle-password', 'password');
        setupPasswordToggle('toggle-password-confirmation', 'password_confirmation');
    </script>
@endsection