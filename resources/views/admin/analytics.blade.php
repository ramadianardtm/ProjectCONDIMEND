@extends('user.template')
@section('title', 'Analytics - Admin')

@section('content')
<!doctype html>
<html>

<style>
    .tablestart {
        padding: 20px;
    }

    .btn-edit {
        color: #183153;
        font-weight: 400;
        width: 170px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #D98829;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>

<body>
    <?php

use App\Models\reservasi;
use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    ?>
    <?php
    $saldoadmin = User::find(Auth::user()->id);?>
    <div class="w-10/12 ml-3 ">
        <div class="row mb-2 overflow-auto">
            <div class="p-3 col-sm-4">
                <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-4">
                    <p class="text-blueDark text-xl" style="font-size: 16px;">Pendapatan Total</p>
                    <p class="text-blueDark text-xl">Rp {{$saldoadmin->saldo}}</p>
                </div>
            </div>
            <div class="p-3 col-sm-4">
                <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-4">
                    <p class="text-blueDark text-xl" style="font-size: 16px;">Pendapatan Bulan Lalu</p>
                    <p class="text-blueDark text-xl">Rp {{$saldoadmin->saldo}}</p>
                </div>
            </div>
            <div class="p-3 col-sm-4">
                <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-4">
                    <p class="text-blueDark text-xl" style="font-size: 16px;">Pendapatan Akumulatif</p>
                    <p class="text-blueDark text-xl">Rp {{$saldoadmin->saldo}}</p>
                </div>
            </div>
            @foreach($analytics as $ca)
            @endforeach
            <div class="p-3 col-sm-4">
                <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-4">
                    <p class="text-blueDark text-xl" style="font-size: 16px;">Total User</p>
                    <?php
                    $user = User::where('role', '=', 'member');
                    $jumlahuser = $user->count() ?>
                    <p class="text-blueDark text-xl">{{$jumlahuser}}</p>
                </div>
            </div>
            <div class="p-3 col-sm-4">
                <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-4">
                    <p class="text-blueDark text-xl" style="font-size: 16px;">Total Perusahaan</p>
                    <?php
                    $perusahaan = User::where('role', '=', 'pengelola');
                    $jumlahperusahaan = $perusahaan->count() ?>
                    <p class="text-blueDark text-xl">{{$jumlahperusahaan}}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection