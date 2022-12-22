@extends('user.template')
@section('title', 'Katalog User')

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
    <title>User</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>

<body>
    <?php

    use App\Models\User; ?>
    <div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-80vh overflow-auto p-4">
        <div class="row" style="justify-content: space-between;">
            <div class="col-sm-3 d-flex ml-4 bg-white border border-gray-200 shadow-md overflow-auto" style="height:70px;align-items:center;border-radius:10px">
                <div class="row">
                    <div class="col" style="margin-right: 80px;">
                        <p>Admin</p>
                    </div>
                    <div class="col">
                        <i class="fa-solid fa-user" style="font-size: 30px;padding-left:1px;"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 d-flex mr-4 bg-white border border-gray-200 shadow-md overflow-auto" style="height:70px;align-items:center;border-radius:10px">
                <a style="text-align: center;" href="/logout">Logout</a>
            </div>
        </div>
        <br>
        <p class="col-sm-12 text-blueDark text-xl mt-2" style="font-size: 25px;">Katalog User</p>
        <div class="col-sm-12 tablestart">
            <form action="{{ route('admin.searchuser') }}" method="post" class="row">
                @csrf
                <div class="col-sm-10">
                    <input type="text" id="search" class="form-control" placeholder="Cari User" name="search">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="focus:outline-none text-blueDark w-full bg-orange hover:bg-orange font-bold rounded-lg text-l mr-2 mb-2 p-2 dark:focus:ring-yellow-900">Cari</button>
                </div>

            </form>
        </div>
        @if ($data->count() == 0)
        <div class="text-center" style="padding: 60px;margin-bottom:50px;">
            <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
            <br>
            <h5 style="margin-top: 20px;font-weight:bold;">Tidak ada pengguna!</h5>
        </div>
        @else
        <div id="container" class="col-sm-12 tablestart">
            <table class="table">
                <thead>
                </thead>
                <tbody>
                    @foreach ($data as $dt)

                    @if($dt->role == 'member' )
                    <tr class="bg-white border border-gray-200 rounded-2xl shadow-md overflow-auto">
                        <td><i class="fa-solid fa-user" style="font-size: 30px;padding-left:1px;"></i><br>
                        </td>
                        <td>{{ $dt->name }}</td>
                        <td>{{$dt->id}}</td>
                        <td>{{$dt->email}}</td>
                        <td>{{$dt->password}}</td>
                    </tr>

                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    </div>
</body>

</html>
@endsection