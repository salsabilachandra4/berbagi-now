<?php

namespace App\Http\Controllers;

use App\Models\DetailDonasi;
use App\Models\Donasi;

class LandingController extends Controller
{
    public function index()
    {
        $data = Donasi::all();
         $jumlah_donasi = DetailDonasi::selectRaw('donasi_id, SUM(nominal_donasi) as total_nominal')
            ->groupBy('donasi_id')
            ->get()->pluck('total_nominal', 'donasi_id');

        return view('app.donasi', [
            'data' => $data,
            'jumlah_donasi' => $jumlah_donasi,
        ]);
    }

    public function show($id)
    {
        $donasi = Donasi::find($id);

        return view('app.donasi-detail', [
            'donasi' => $donasi,
        ]);
    }

    public function store($id)
    {
        $validatedData = request()->validate([
            'nama_donatur' => 'required|string',
            'nominal_donasi' => 'required|integer',
        ]);

        Donasi::find($id)->detailDonasi()->create($validatedData);

        return redirect('/donate')->with('success', 'Terima kasih telah berdonasi!');
    }
}
