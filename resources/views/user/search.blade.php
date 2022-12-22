@extends('user.template')
@section('title', 'Dashboard - Cari')

@section('content')
<div class="w-3/12 px-4">
    <a href="{{ route('map.map') }}">
        <button type="button" class="focus:outline-none text-blueDark w-full mt-2 bg-orange hover:bg-orange font-bold rounded-lg text-xl px-5 py-6 mr-2 mb-2 dark:focus:ring-yellow-900">Cari
            Parkir</button>
    </a>
    <?php

    use Illuminate\Support\Facades\Auth;
    ?>
    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md">
        <h5 class="mb-2 text-xl font-medium tracking-tight text-gray-900 dark:text-white">Cash YukParkir</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Saldo</p>
        <?php
        $user_info = App\Models\User::find(Auth::user()->id); ?>
        <?php
        $admin_saldo = App\Models\User::where('role','=','admin')->value('saldo'); ?>
        <?php
        $admin_id = App\Models\User::where('role','=','admin')->value('id'); ?>

        <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Rp {{$user_info->saldo}}</p>
    </div>
    <button type="button" class="focus:outline-none text-blueDark w-full mt-2 bg-orange hover:bg-orange font-bold rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Top
        Up</button>
    <button type="button" class="focus:outline-none text-blueDark w-full mt-2 bg-orange hover:bg-orange font-bold rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Tarik
        Saldo</button>
</div>
<div class="w-7/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-70vh overflow-auto p-4">
    <p class="text-blueDark text-xl">Reservasi Aktif Parkir</p>

    @if($reservasis->count() == 0)
    <div class="text-center" style="padding: 60px;margin-bottom:50px;">
        <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
        <br>
        <h5 style="margin-top: 20px;">Tidak ada reservasi aktif</h5>
    </div>
    @else

    @foreach ($reservasis as $pd)
    @if($pd->info == 'aktif' && $pd->status == 'confirmed')
    <div class="aselole block w-full p-4 bg-white border border-gray-200 rounded-lg shadow-md mt-4">
        <div class="w-full flex justify-center">
            <img src="/storage/{{ $pd->image }}" class="rounded-xl w-1/5" alt="tempat parkir">
            <div class="w-4/5 px-2">
                <p class="truncate text-lg font-medium">{{$pd->name}}</p>
                <p class="truncate">{{$pd->lokasi}}</p>
                <p class="cidate">{{$pd->checkindate}}</p>
                <p class="truncate">{{$pd->checkintime}} - {{$pd->checkouttime}} ({{$pd->lamaparkir}} jam)</p>
                <p class="cotime" style="display: none;">{{$pd->checkouttime}}</p>
                <p class="citime" style="display: none;">{{$pd->checkintime}}</p>
                <p class="codate" style="display: none;">{{$pd->checkoutdate}}</p>
                <p class="truncate">{{$pd->biayatotal}}</p>
            </div>
        </div>
        <div class="mt-2 flex justify-between items-start">
            <div class="contain flex justify-between items-center w-100 px-20 py-3 bg-green rounded-lg mr-3">
                <p>Durasi Tersisa</p>
                <p class="durasisisa" id="durasisisa"></p>
            </div>
            <input class="slotsekarang" type="hidden" id="slotsekarang" name="slotsekarang" value="{{$pd->slot}}">
            <input class="adminsaldo" type="hidden" id="adminsaldo" name="adminsaldo" value="{{$admin_saldo}}">
            <input class="total_biaya" type="hidden" id="total_biaya" name="total_biaya" value="{{$pd->biayatotal}}">
            <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$pd->id}}">
                <input class="adminid" type="hidden" id="adminid" name="adminid" value="{{$admin_id}}">
                <input type="hidden" id="parkir_id" name="parkir_id" value="{{$pd->parkir_id}}">
                <input class="slot" type="hidden" id="slot" name="slot">
                <input class="saldo" type="hidden" id="saldo" name="saldo">
                <input type="hidden" id="info" name="info" value="nonaktif">
                <div class="tombolselesai" style="display: none;">
                    <button type="submit" class="bg-orange text-center py-3 rounded-lg" style="cursor: pointer;width:130px">
                        Selesai
                    </button>
                </div>
                <div class="tombolbatal" style="display: none;">
                    <button type="submit" class="bg-red text-center py-3 rounded-lg" style="cursor: pointer;width:130px">
                        Batalkan
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
    @endforeach
    @endif
    <script>
        for (var i = 0; i < document.getElementsByClassName('aselole').length; i++) {
            var y = document.getElementsByClassName('slotsekarang')[i].value;
            var a =  document.getElementsByClassName('adminsaldo')[i].value;
            var b = document.getElementsByClassName('total_biaya')[i].value;

            var slotnow = parseInt(y);
            var saldoadmin = parseInt(a);
            var totalbiaya = parseInt(b);

            var saldosekarang = saldoadmin+totalbiaya;
            var sisa_slot = (slotnow + 1);
            document.getElementsByClassName("slot")[i].value = sisa_slot;
            document.getElementsByClassName("saldo")[i].value = saldosekarang;
    }
    </script>
    <script>
        var days;
        var hours;
        var minutes;
        var seconds;

        class Test {
            constructor() {}


            Call(checkindate, checkouttime, checkintime, checkoutdate, i) {
                var waktusekarang = new Date().getTime();
                var now = new Date(checkindate + " " + checkintime).getTime();
                var countDownDate = new Date(checkoutdate + " " + checkouttime).getTime();
                if (now <= waktusekarang) {
                    var x = setInterval(function() {
                        //Tabel Atas
                        var now = new Date().getTime();
                        //now += 4;

                        var distance = countDownDate - now;
                        days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementsByClassName("durasisisa")[i].innerHTML = "DONE";
                            document.getElementsByClassName("tombolselesai")[i].style.display = "block";
                        } else {
                            document.getElementsByClassName("durasisisa")[i].innerHTML = hours + ":" +
                                minutes + ":" + seconds;
                        }
                    }, 1);
                } else if (waktusekarang > now) {
                    document.getElementsByClassName("durasisisa")[i].innerHTML = "DONE";
                    document.getElementsByClassName("tombolselesai")[i].style.display = "block";
                } else if (waktusekarang < now) {
                    document.getElementsByClassName("contain")[i].style.background = "#DDDDDD";
                    document.getElementsByClassName("durasisisa")[i].innerHTML = "WAITING";
                    document.getElementsByClassName("tombolbatal")[i].style.display = "block";
                }
            }
        }

        for (var i = 0; i < <?php echo json_encode($reservasis->count()) ?>; i++) {
            var checkouttime = document.getElementsByClassName("cotime")[i].innerHTML.toString();
            var checkintime = document.getElementsByClassName("citime")[i].innerHTML.toString();
            var checkindate = document.getElementsByClassName("cidate")[i].innerHTML.toString();
            var checkoutdate = document.getElementsByClassName("codate")[i].innerHTML.toString();
            const coba = new Test();
            coba.Call(checkintime, checkouttime, checkindate, checkoutdate, i);
        }
    </script>

    @endsection