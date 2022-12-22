@extends('user.template')
@section('title', 'Welcome to YukParkir!')

@section('content')

<style>
    a:hover{
        color: #000;
        text-decoration: none;
    }
</style>
<div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-70vh overflow-auto p-4">
    <p class="text-blueDark text-xl text-center">Telusuri Tempat Parkir yang Tersedia</p>
    <div class="search mt-3 ">
        <form action="{{ route('map.searchmap') }}" method="post">
            @csrf

            <input type="text" autocomplete="off" name="search" id="search" class="w-100 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange focus:border-orange focus:outline-none block py-3 px-1 text-center dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lokasi, Kode Pos, ...">

            <button type="submit" class="mt-1 focus:outline-none text-white w-full bg-orange hover:bg-orange font-medium rounded-lg text-l mr-2 mb-2 p-2 dark:focus:ring-yellow-900">Cari</button>

        </form>
    </div>
    <p class="text-blueDark text-xl mt-3">Rekomendasi</p>
    @if($home->count() == 0)
    <div class="text-center" style="padding: 60px;margin-bottom:50px;">
        <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
        <br>
        <h5 style="margin-top: 20px;">Tidak ada parkir</h5>
    </div>
    @else

    @foreach ($home as $pd)
    <a href="/detail/{{$pd['id']}}">
    <div class="block w-full p-4 bg-white border border-gray-200 rounded-lg shadow-md mt-4">
        <div class="w-full flex justify-center">
            <img src="/storage/{{ $pd->image }}" class="rounded-xl w-1/5" alt="tempat parkir">
            <div class="w-4/5 px-2">
                <p class="truncate text-lg font-medium">{{$pd->name}}</p>
                <p class="truncate">{{$pd->lokasi}}</p>
                <p class="truncate">Jam Operasi: 05:00-24:00</p>
                <p class="truncate">Parkir Tersedia: {{$pd->slot}}/{{$pd->slotmaksimal}}</p>
                <p class="truncate">Rp {{$pd->biaya}}/jam</p>
            </div>
        </div>
    </div>
    </a>
    @endforeach

    @endif
</div>
@endsection