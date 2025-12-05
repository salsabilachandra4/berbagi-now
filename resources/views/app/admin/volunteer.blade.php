@extends('layouts.app')
@section('title', 'Volunteer')

@section('content')
    <div class="h-100 gap-5 row justify-content-center text-black py-5">
        <h1 class="text-center">Volunteer</h1>
        <div class="d-flex justify-content-between">
            <table class="table table-striped border">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Open Donasi</th>
                        <th scope="col">Lihat Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Ivan Gunawan</td>
                        <td>11</td>
                        <td><a href="/admin/volunteer-detail"><i class="fa-solid fa-eye"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Ivin Guniwin</td>
                        <td>8</td>
                        <td><a href="/admin/volunteer-detail"><i class="fa-solid fa-eye"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Ivun Gunuwun</td>
                        <td>10</td>
                        <td><a href="/admin/volunteer-detail"><i class="fa-solid fa-eye"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
