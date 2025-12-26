<?php

namespace App\Http\Controllers;

use App\Models\DetailDonasi;
use App\Models\Donasi;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $volunteer = User::where('role', 'volunteer')->count();
        $donasi = Donasi::count();
        $donatur = DetailDonasi::count();

        return view('app.admin.dashboard', [
            'volunteer' => $volunteer,
            'donasi' => $donasi,
            'donatur' => $donatur,
        ]);
    }

    public function volunteer()
    {
        $data = User::where('role', 'volunteer')->get();
        $jumlah_donasi = Donasi::selectRaw('user_id, COUNT(id) as total')
            ->groupBy('user_id')
            ->pluck('total', 'user_id');
        return view('app.admin.volunteer', [
            'data' => $data,
            'jumlah_donasi' => $jumlah_donasi,
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $data = Donasi::where('user_id', $id)->get();
     $donasi = Donasi::count();
        $jumlah_donasi = DetailDonasi::selectRaw('donasi_id, SUM(nominal_donasi) as total_nominal')
            ->groupBy('donasi_id')
            ->get()->pluck('total_nominal', 'donasi_id');

        return view('app.admin.volunteer-detail', [
            'user' => $user,
            'data' => $data,
            'donasi' => $donasi,
            'jumlah_donasi' => $jumlah_donasi,
        ]);
    }
}
