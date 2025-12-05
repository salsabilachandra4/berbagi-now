@extends('layouts.app')
@section('title', 'Volunteer')

@section('content')
    <div class="h-100 row justify-content-center text-black py-5">
        <h1 class="text-start mb-4 border-bottom fw-semibold">Detail Volunteer</h1>
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item fw-bold col-2">Nama</li>
            <li class="list-group-item col-4">Ivan Gunawan</li>
            <li class="list-group-item fw-bold col-2">Jumlah Open Donasi</li>
            <li class="list-group-item col-4">Ivan Gunawan</li>
        </ul>
        <ul class="list-group mb-5 list-group-horizontal">
            <li class="list-group-item fw-bold col-2">Perusahaan</li>
            <li class="list-group-item col-4">PT Telkom Indonesia</li>
            <li class="list-group-item fw-bold col-2">Status</li>
            <li class="list-group-item col-4">
                <span class="badge text-bg-success">
                    Premium
                </span>
            </li>
        </ul>

        <div class="d-flex row gap-5 col-12 justify-content-center py-5" id="about">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/landing_page.jpg') }}" class="card-img-top" alt="...">
                <div class="mb-2">
                    <h5 class="card-title">Pray for Medan</h5>
                    <p class="card-text">Donasi untuk saudara kita yang terkena bencana alam di Medan Sumatera Barat.</p>
                </div>
                <div class="d-flex row">
                    <span class="py-2 border-top fw-semibold">081234567891</span>
                    <span class="py-2 border-top fw-semibold">BNI a.n Ivan Gunawan (123456789)</span>
                    <span class="py-2 border-top fw-semibold">Rp. 1.000.000</span>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/landing_page.jpg') }}" class="card-img-top" alt="...">
                <div class="mb-2">
                    <h5 class="card-title">Pray for Medan</h5>
                    <p class="card-text">Donasi untuk saudara kita yang terkena bencana alam di Medan Sumatera Barat.</p>
                </div>
                <div class="d-flex row">
                    <span class="py-2 border-top fw-semibold">081234567891</span>
                    <span class="py-2 border-top fw-semibold">BNI a.n Ivan Gunawan (123456789)</span>
                    <span class="py-2 border-top fw-semibold">Rp. 1.000.000</span>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/landing_page.jpg') }}" class="card-img-top" alt="...">
                <div class="mb-2">
                    <h5 class="card-title">Pray for Medan</h5>
                    <p class="card-text">Donasi untuk saudara kita yang terkena bencana alam di Medan Sumatera Barat.</p>
                </div>
                <div class="d-flex row">
                    <span class="py-2 border-top fw-semibold">081234567891</span>
                    <span class="py-2 border-top fw-semibold">BNI a.n Ivan Gunawan (123456789)</span>
                    <span class="py-2 border-top fw-semibold">Rp. 1.000.000</span>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/landing_page.jpg') }}" class="card-img-top" alt="...">
                <div class="mb-2">
                    <h5 class="card-title">Pray for Medan</h5>
                    <p class="card-text">Donasi untuk saudara kita yang terkena bencana alam di Medan Sumatera Barat.</p>
                </div>
                <div class="d-flex row">
                    <span class="py-2 border-top fw-semibold">081234567891</span>
                    <span class="py-2 border-top fw-semibold">BNI a.n Ivan Gunawan (123456789)</span>
                    <span class="py-2 border-top fw-semibold">Rp. 1.000.000</span>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/landing_page.jpg') }}" class="card-img-top" alt="...">
                <div class="mb-2">
                    <h5 class="card-title">Pray for Medan</h5>
                    <p class="card-text">Donasi untuk saudara kita yang terkena bencana alam di Medan Sumatera Barat.</p>
                </div>
                <div class="d-flex row">
                    <span class="py-2 border-top fw-semibold">081234567891</span>
                    <span class="py-2 border-top fw-semibold">BNI a.n Ivan Gunawan (123456789)</span>
                    <span class="py-2 border-top fw-semibold">Rp. 1.000.000</span>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/landing_page.jpg') }}" class="card-img-top" alt="...">
                <div class="mb-2">
                    <h5 class="card-title">Pray for Medan</h5>
                    <p class="card-text">Donasi untuk saudara kita yang terkena bencana alam di Medan Sumatera Barat.</p>
                </div>
                <div class="d-flex row">
                    <span class="py-2 border-top fw-semibold">081234567891</span>
                    <span class="py-2 border-top fw-semibold">BNI a.n Ivan Gunawan (123456789)</span>
                    <span class="py-2 border-top fw-semibold">Rp. 1.000.000</span>
                </div>
            </div>
        </div>
    </div>
@endsection
