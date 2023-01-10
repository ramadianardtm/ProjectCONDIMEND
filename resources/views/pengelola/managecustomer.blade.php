@extends('user.template')
@section('title', 'Manage Customers')

@section('content')
<!doctype html>
<html>

<style>
    .tablestart {
        padding: 20px;
    }

    .btn-edit {
        color: #fff;
        font-weight: 400;
        font-size: 16px;
        border-radius: 4px;
        background-color: #564b46;
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
    <div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-80vh overflow-auto p-4">
        <br>
        <p class="col-sm-12 text-blueDark text-xl mt-2" style="font-size: 25px;">Manage Users</p>

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
                    <th>
                    </th>
                    <th>
                        <p>Name</p>
                    </th>
                    <th>
                        <p>User ID</p>
                    </th>
                    <th>
                        <p>Email</p>
                    </th>
                    <th>
                        <p>Password</p>
                    </th>
                    <th>
                        <p>Action</p>
                    </th>
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
                        <td>*****</td>
                        <td>
                            <a href="edit-user/{{ $dt->id }}"><button type="button" class="btn btn-edit">Edit</button></a>
                            <a href="remove-user/{{ $dt->id }}"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
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