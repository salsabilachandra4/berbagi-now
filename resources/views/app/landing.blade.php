@extends('layouts.app')
@section('title', 'Landing Page')

@section('content')
    <div class="row vh-auto py-5 text-white" id="home">
        <div class="d-flex col-12">
            <span class="text fs-title text-black fw-semibold lh-1">Berbagi <br> Now</span>
        </div>

        <div class="col d-flex justify-content-end mb-5 text-center">
            <div class="col-6 d-flex text-center align-items-center">
                <span class="text-start text-black fs-5">
                    Mari berbagi untuk mereka yang membutuhkan. <br>
                    Setiap donasi membawa harapan baru. <br>
                    Bersama, kita bisa menciptakan perubahan nyata.
                </span>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <img src="{{ asset('assets/landing_page.jpg') }}" class="img-thumbnail w-75" alt="">
            </div>
        </div>

        <div class="d-flex row gap-4 col-12 justify-content-center py-5" id="about">
            <div class="col-12 text-center">
                <span class="fs-title text-black fw-semibold lh-1">About Us</span>
            </div>

            <div class="col-12 mb-5 d-flex align-items-center justify-content-center">
                <span class="text-center col-4 p-3 text-black">
                    <b>BerbagiNow</b> adalah platform donasi yang memudahkan siapa pun
                    untuk membuka, mengelola, dan menyalurkan penggalangan dana.
                </span>
            </div>

            {{-- LIST DONASI (DINAMIS) --}}
            <div class="row col-12 justify-content-center align-items-stretch gap-4">
                @foreach ($data as $donasi)
                    <div class="card p-0" style="width: 18rem;">
                        <a href="{{ url('donate-detail/' . $donasi->id) }}" class="text-decoration-none text-black">
                            <img src="{{ $donasi->image ? asset('storage/' . $donasi->image) : asset('assets/landing_page.jpg') }}"
                                 class="card-img-top"
                                 alt="{{ $donasi->judul }}"
                                 style="height: 200px; object-fit: cover;">

                            <div class="card-body">
                                <h5 class="card-title">{{ $donasi->judul }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($donasi->deskripsi, 50) }}</p>
                            </div>

                            <div class="card-footer bg-transparent">
                                <div class="d-flex flex-column gap-1">
                                    <span class="small text-secondary">{{ $donasi->nomor_hp }}</span>
                                    <span class="small">{{ $donasi->bank }} - {{ $donasi->nomor_rekening }}</span>
                                    <span class="fw-bold text-success">Rp. 0</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex col gap-4 col-12 justify-content-center py-5" id="contact">
            <div class="col-6 row d-flex align-items-center justify-content-start">
                <span class="text-black">
                    +62 812-3456-7890
                    <br>
                    berbaginow@gmail.com
                </span>
            </div>
            <div class="col-6 text-center">
                <span class="fs-title text-black fw-semibold lh-1">Contacts</span>
            </div>
        </div>
    </div>
@endsection
