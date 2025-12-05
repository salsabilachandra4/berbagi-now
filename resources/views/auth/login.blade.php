@extends('layouts.auth')
@section('title', 'Login')

@section('content')
    <div class="min-vh-100 row align-items-center justify-content-center text-black py-5">
        <div class="d-flex text-center row gap-5 col-5 border rounded-5 py-5 align-items-center justify-content-center">
            <h1 class="">Login</h1>
            <form class="d-flex row justify-content-center">
                <div class="mb-3 text-start">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-5 text-start">
                    <label for="inputPassword5" class="form-label">Password</label>
                    <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                </div>
                <button type="submit" class="btn bg-black rounded-pill py-3 text-white">Submit</button>
            </form>
            <span class="text-dark">
                Belum punya akun? <a class="text-black text-decoration-none fw-semibold" href="/register">Daftar.</a>
            </span>
        </div>
    </div>
@endsection
