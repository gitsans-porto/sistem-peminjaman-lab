@extends('layout.auth')
@section('title', 'Login')

@section('content')
    <div class="login-card">
                <h1>Masuk</h1>
                <p class="card-sub">Pakai email dan password akun Anda</p>
                @if(session('success'))
                    <div class="alert alert-success" role="status">
                        <span>{{ session('success') }}</span>

                    </div>
                @endif
                @if ($errors->has('credentials'))
                    <div class="alert alert-danger" role="alert">
                        <span>{{ $errors->first('credentials') }}</span>
                    </div>
                @endif

                <form id="login-form" method="POST" action="{{ url('/login') }}">
                    @csrf

                    <div class="field">
                        <label for="email">Email</label>
                        <input class="input" type="email" id="email" name="email" value="{{ old('email') }}"
                               placeholder="email@gmail.com" autocomplete="username" required autofocus
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
                                <i class="bi bi-eye icon-show"></i>
                                <i class="bi bi-eye-slash icon-hide"></i>
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
@endsection
            
@section('script')
    <script>
        const toggleBtn = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');

        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', function(){
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                this.classList.toggle('is-revealed', isPassword);

                this.setAttribute('aria-pressed', isPassword ? 'true' : 'false');
                this.setAttribute('aria-label', isPassword ? 'Sembunyikan password' : 'Tampilkan Password');
            });
        }
        
    </script>
@endsection
    
</body>

</html>