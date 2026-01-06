@extends('layouts.app')
@section('title', 'Donate')

@section('content')
    <div class="h-100 gap-5 row justify-content-center text-black py-5">
        <h1 class="text-center">Donate Now</h1>

        <div class="row col-12 justify-content-center align-items-stretch gap-5">
            @if ($donasi->isEmpty())
                <span class="text-center">Belum ada donasi.</span>
            @endif

            @foreach ($donasi as $item)
                <div class="card p-0" style="width: 18rem;">
                    <a href="{{ url('donate-detail/' . $item->id) }}" class="text-decoration-none text-black">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/landing_page.jpg') }}"
                             class="card-img-top"
                             alt="{{ $item->judul }}"
                             style="height: 200px; object-fit: cover;">
                    </a>

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text text-muted">
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}
                        </p>

                        <div class="d-flex flex-column gap-2">
                            <span class="small text-secondary">{{ $item->nomor_hp }}</span>

                            <span class="small">
                                {{ $item->bank }} a.n {{ $item->nama_rekening }} ({{ $item->nomor_rekening }})
                            </span>

                            <span class="fw-semibold">
                                Rp. {{ number_format($jumlah_donasi) }}
                            </span>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent d-flex gap-2">
                        <a href="{{ url('donate-detail/' . $item->id) }}" class="btn btn-sm btn-outline-primary">
                            Detail
                        </a>

                        <form action="{{ url('/volunteer/donasi/' . $item->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus donasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
