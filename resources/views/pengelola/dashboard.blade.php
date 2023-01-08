@extends('user.template')
@section('title', 'Dashboard - Pengelola')

@section('content')
<!doctype html>
<html>

<style>
    .tablestart {
        padding: 20px;
    }

    .btn-active {
        color: #4bff61;
        font-weight: 400;
        width: 230px;
        font-size: 16px;
        border: solid 1px #4bff61;
        border-radius: 10px;
        background-color: #fff;
    }

    .btn-edit {
        color: #fff;
        font-weight: 400;
        width: 230px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #564b46;
    }

    .btn-edit:hover {
        color: #fff;
        font-weight: 400;
        width: 230px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #876f61;
    }

    .btn-slot {
        background-color: #DDDDDD;
        border: none;
    }

    .text-prim {
        color: #564b46;
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

    use Illuminate\Support\Facades\Auth; ?>
    <div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-80vh overflow-auto p-4">
        <div class="row">
            <p class="col text-prim text-xl" style="font-size: 25px;">Incoming Orders</p>
            <div class="col-sm-12 tablestart">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                        <?php $pengelola_info = App\Models\User::find(Auth::user()->id); ?>
                        @if($data->count() == 0)
                        <div class="text-center" style="padding: 60px;margin-bottom:50px;">
                            <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
                            <br>
                            <h5 style="margin-top: 20px;">No Incoming Orders</h5>
                        </div>
                        @else
                        @foreach ($data as $pd)
                        <?php $user_info = App\Models\User::find($pd->user_id); ?>
                        <?php $order_info = App\Models\AddProduct::find($pd->product_id); ?>
                        <?php $trainer_info = App\Models\Trainer::find($pd->trainer_id); ?>

                        @if($pd->status == 'unconfirmed' && $pd->info == 'belummulai' )
                        <tr id="sid{{ $pd->id }}" class="bg-white border border-gray-200 rounded-2xl shadow-md overflow-auto">
                            <td><i class="fa-solid fa-user" style="font-size: 30px;padding-left:1px;"></i></td>
                            <td>{{ $user_info->name }}</td>
                            <td>{{ $order_info->name }}<br>
                                <b>IDR {{ $order_info->price }}</b>
                            </td>
                            <td>
                                <button style="border:solid 1px #564b46;border-radius:5px;padding-top:3px;padding-bottom:3px;padding-left:7px;padding-right:7px;">
                                    <p class="text-prim" style="font-size: 12px;">Trainer</p>
                                </button>
                                <p>{{$trainer_info->name}}</p>
                            </td>
                            <form action="{{ route('pengelola.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="id" name="id" value="{{$pd->id}}">
                                <input type="hidden" id="status" name="status" value="confirmed">
                                <input type="hidden" id="info" name="info" value="aktif">
                                <td>
                                    <button class="btn btn-edit mx-2" type="submit" href="">Accept</button>
                                </td>
                            </form>
                        </tr>
                        @endif

                        @endforeach

                        @endif
                    </tbody>
                </table>
            </div>
            <p class="col text-prim text-xl" style="font-size: 25px;">Active Orders</p>
            <div class="col-sm-12 tablestart">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>

                        @if($data->count() == 0)
                        <div class="text-center" style="padding: 60px;margin-bottom:50px;">
                            <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
                            <br>
                            <h5 style="margin-top: 20px;">No incoming orders</h5>
                        </div>
                        @else
                        @foreach ($data as $pd)

                        @if($pd->status == 'confirmed' && $pd->info == 'aktif')

                        <?php $user_info = App\Models\User::find($pd->user_id); ?>
                        <tr class="bg-white border border-gray-200 rounded-2xl shadow-md overflow-auto">
                            <td><i class="fa-solid fa-user" style="font-size: 30px;padding-left:1px;"></i></td>
                            <td>{{ $user_info->name }}</td>
                            <td>{{ $order_info->name }}<br>
                                <b>IDR {{ $order_info->price }}</b>
                            </td>
                            <td>
                                <button style="border:solid 1px #564b46;border-radius:5px;padding-top:3px;padding-bottom:3px;padding-left:7px;padding-right:7px;">
                                    <p class="text-prim" style="font-size: 12px;">Trainer</p>
                                </button>
                                <p>{{$trainer_info->name}}</p>
                            </td>
                            <td>
                                <button class="btn btn-active mx-2" type="button" style="cursor: auto;">Active</button>
                            </td>
                        </tr>
                        @endif
                        @endforeach

                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
<script>
    for (var i = 0; i < document.getElementsByClassName('aselole').length; i++) {
        var y = document.getElementsByClassName('slotsekarang')[i].value;
        var a = document.getElementsByClassName('saldosekarang')[i].value;
        var b = document.getElementsByClassName('biayatotal')[i].value;
        console.log(document.getElementsByClassName('aselole').length);
        console.log(y);
        console.log(a);
        console.log(b);
        var slotnow = parseInt(y);
        var saldoadmin = parseInt(a);
        var totalbiaya = parseInt(b);

        var saldosekarang = saldoadmin + totalbiaya;
        var sisa_slot = (slotnow - 1);
        console.log(saldosekarang);
        console.log(sisa_slot);
        document.getElementsByClassName("slot")[i].value = sisa_slot;
        document.getElementsByClassName("saldo")[i].value = saldosekarang;
    }
</script>
<script>
    function tes() {
        var saldoskrg = document.getElementById('saldouser').value;
        var inputsaldo = document.getElementById('saldotarik').value;

        console.log(saldoskrg);
        console.log(inputsaldo);

        var saldonow = parseInt(saldoskrg);
        var saldoskrg = parseInt(inputsaldo);

        var saldonew = (saldonow - saldoskrg);
        console.log('saldobaru' + saldonew);

        document.querySelector("[name=saldotarik]").value = saldonew;
    }
</script>

</html>
@endsection