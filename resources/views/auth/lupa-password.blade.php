@extends('layout.auth')
@section('title', 'login')
@section('content')
    <div class="login-card">
        <h1>Lupa Password</h1>
        <p class="card-sub">Masukkan Email Akun dan Buat Password Baru</p>

        <form method="POST" action="{{ url('/lupa-password') }}">
            <div class="field">
                <label for="email">Email</label>
                <input class="input" type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="username"
                    required autofocus>
                @error('email')
                    <p class="fiel-error" id="email-error"> {{ $message }} </p>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <div class="field-control">
                    <input class="input" type="password" id="password" name="password" placeholder="Masukkan Password Baru"
                        autocomplete="new-password" required>
                    <button class="field-toggle" type="button" id="toggle-password">
                        <i class="bi bi-eye icon-show"></i>
                        <i class="bi bi-eye-slash icon-hide"></i>
                    </button>
                </div>

                @error('password')
                    <p class="field-error" id="password-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="field">
                <label for="password-confirmation">Konfirmasi Password</label>
                <div class="field-control">
                    <input class="input" type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Ulangi password baru" autocomplete="new-password" required>
                    <button class="field-toggle" type="button" id="toggle-password-confirmation">
                        <i class="bi bi-eye icon-show"></i>
                        <i class="bi bi-eye-slash icon-hide"></i>
                    </button>
                </div>
            </div>

            <button class="btn-primary" type="submit">Simpan Password Baru</button>
        </form>
        <p class="forgot">Kembali ke<a class="link" href="{{ url('/login') }}"> Login</a></p>
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

                });
            }
        }

        setupPasswordToggle('toggle-password', 'password');
        setupPasswordToggle('toggle-password-confirmation', 'password_confirmation');
    </script>
@endsection