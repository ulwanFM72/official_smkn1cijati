<x-guest-layout>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control" required autofocus autocomplete="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input id="password" type="password" name="password"
                       class="form-control" required autocomplete="current-password">

                <button type="button" id="togglePassword"
                        class="btn btn-outline-secondary d-flex align-items-center"
                        aria-label="Tampilkan password">

                    {{-- Mata (password tersembunyi) --}}
                    <svg id="iconEye" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>

                    {{-- Mata dicoret (password terlihat) --}}
                    <svg id="iconEyeOff" class="d-none" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17.94 17.94A10.07 10.07 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 012.623-4.19M9.9 4.24A9.12 9.12 0 0112 4c4.478 0 8.268 2.943 9.543 7a9.97 9.97 0 01-1.563 3.029M1 1l22 22"/>
                        <path d="M14.12 14.12a3 3 0 11-4.24-4.24"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label class="form-check-label" for="remember">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Log in
        </button>

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input  = document.getElementById('password');
            const button = document.getElementById('togglePassword');
            const eyeOn  = document.getElementById('iconEye');
            const eyeOff = document.getElementById('iconEyeOff');

            button.addEventListener('click', function () {
                const isHidden = input.type === 'password';

                input.type = isHidden ? 'text' : 'password';
                eyeOn.classList.toggle('d-none', isHidden);
                eyeOff.classList.toggle('d-none', !isHidden);
                button.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Tampilkan password');
            });
        });
    </script>

</x-guest-layout>