@extends('user.template')
@section('title', 'Dashboard - Riwayat')

@section('content')
<div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-70vh overflow-auto p-4">
    <p class="text-blueDark text-xl">Riwayat Parkir</p>


    @if($reservasis->count() == 0)
    <div class="text-center" style="padding: 60px;margin-bottom:50px;">
        <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
        <br>
        <h5 style="margin-top: 20px;">Tidak ada riwayat</h5>
    </div>
    @else

    @foreach ($reservasis as $pd)
    @if($pd->info == 'nonaktif' && $pd->status == 'confirmed')
    <div class="block w-full p-4 bg-white border border-gray-200 rounded-lg shadow-md mt-4">
        <div class="w-full flex justify-center">
            <img src="/storage/{{ $pd->image }}" class="rounded-xl w-1/5" alt="tempat parkir">
            <div class="w-4/5 px-2">
                <p class="truncate text-lg font-medium">{{$pd->name}}</p>
                <p class="truncate">{{$pd->lokasi}}</p>
                <p class="truncate">{{$pd->checkindate}}</p>
                <p class="truncate">{{$pd->checkintime}} - {{$pd->checkouttime}} ({{$pd->lamaparkir}} jam)</p>
                <p class="truncate">Rp {{$pd->biayatotal}}</p>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    
    @endif
</div>
@endsection