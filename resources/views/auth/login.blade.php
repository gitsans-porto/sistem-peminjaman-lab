<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
    <div class="login">
        <div class="login-brand">
            <div>
                <p class="brand-name">Peminjaman Lab</p>
                <p class="brand-campus">Kampus 4 Universitas Negeri Gorontalo</p>
            </div>

            <div class="brand-mid">
                <p class="brand-headline">Peminjaman Lab Komputer tanpa antre di Ruangan Server</p>
                <p class="brand-copy">Ajukan sesuai jadwal tetap kelas atau di luar jadwal, pantau persetujuan Aslab,
                    dan catat pengambilan kunci dengan rapi.</p>
            </div>

            <p class="brand-foot">Sistem Informasi Peminjaman Lab Komputer</p>
            <p class="brand-tagline">Sistem Informasi Peminjaman Lab Komputer, Kampus 4 Universitas Negeri Gorontalo.
            </p>
        </div>

        <main class="login-form">
            <div class="login-card">
                <h1>Masuk</h1>
                <p class="card-sub">Pakai email dan password akun Anda</p>
                @if(session('success'))
                    <div class="alert alert-succes" role="status">
                        <span>{{ session('success') }}</span>

                    </div>
                @endif
                @if ($errors->has('credential'))
                    <div class="alert alert-danger" role="alert">
                        <span>{{ $errors->first('credentials') }}</span>
                    </div>
                @endif

                <form id="login-form" method="POST" action="{{ url('/login') }}">
                    @csrf

                    <div class="field">
                        <label for="email">Email</label>
                        <input class="input" type="email" id="email" name="email" value="{{ old('email') }}"
                               placeholder="nama@email.com" autocomplete="username" required autofocus
                               @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
                        @error('email')
                            <p class="field-error" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <div class="field-control">
                            <input class="input" type="password" id="password" name="password"
                                   placeholder="Masukkan password" autocomplete="current-password" required
                                   @error('password') aria-invalid="true" aria-describedby="password-error" @enderror>
                            <button class="field-toggle" type="button" id="toggle-password"
                                    aria-label="Tampilkan password" aria-pressed="false">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="field-error" id="password-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="btn-primary" type="submit" id="login-submit">Masuk</button>
                </form>
                <p class="forgot"><a class="link" href="{{ url('/lupa-password') }}">Lupa password?</a></p>

            </div>

            <div class="register-row">
                <span>Belum punya akun?</span>
                <a class="link" href="{{ url('/register') }}">Daftar di sini</a>
            </div>

        </main>
    </div>
</body>

</html>