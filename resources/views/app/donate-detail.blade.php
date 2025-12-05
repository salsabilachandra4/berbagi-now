@extends('layouts.app')
@section('title', 'Donate')

@section('content')
    <div class="h-100 gap-5 row justify-content-center text-black py-5">
        <h1 class="text-center">Donate Now</h1>
        <form class="border d-flex row rounded rounded-5 shadow-sm p-5 justify-content-center w-50">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Donatur</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-5">
                <label for="exampleInputPassword1" class="form-label">Jumlah</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" inputmode="numeric" min="" class="form-control"
                        aria-label="Amount (to the nearest dollar)">
                </div>
            </div>
            <button type="submit" class="btn bg-black rounded-pill w-75 py-3 text-white">Submit</button>
        </form>
    </div>
@endsection
