@extends('layouts.auth')
@section('title', 'Login')

@section('content')
    <div class="min-vh-100 row align-items-center justify-content-center text-black py-5">
        <div class="d-flex text-center row gap-5 col-5 border rounded-5 py-5 align-items-center justify-content-center">
            <h1 class="">Login</h1>
            <form class="d-flex row justify-content-center" action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="mb-3 text-start">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="mb-5 text-start">
                    <label for="inputPassword5" class="form-label">Password</label>
                    <input type="password" id="inputPassword5" name="password" class="form-control"
                        aria-describedby="passwordHelpBlock">
                    @if ($errors->has('password'))
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>

                <div class="d-grid gap-3">
                    <button type="submit" class="btn bg-black rounded-pill py-3 text-white">Submit</button>

                    <div class="position-relative my-2">
                        <hr>
                        <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted" style="font-size: 0.8rem;">ATAU</span>
                    </div>

                    {{-- Tombol Google Baru --}}
                    <div class="mt-2">
                        <a href="{{ route('socialite.redirect', 'google') }}"
                           class="btn btn-outline-secondary w-100 py-3 rounded-pill d-flex align-items-center justify-content-center gap-2 font-semibold shadow-sm text-dark">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" width="20">
                            Login with Google
                        </a>
                    </div>
                </div>
            </form>

            <span class="text-dark mt-4">
                Belum punya akun? <a class="text-black text-decoration-none fw-semibold" href="/register">Daftar.</a>
            </span>
        </div>
    </div>
@endsection
