@extends('user.template')
@section('title', 'Dashboard - Riwayat')

@section('content')

<style>
    .btn-linkacc {
        color: #838383;
        font-weight: 400;
        width: 180px;
        font-size: 16px;
        border: solid 1px #ACB8C2;
        border-radius: 10px;
    }

    .payment-logo {
        justify-content: center;
        text-align: center;
        display: block;
        align-items: center;
        object-fit: fill;
    }
    .btn-edit{
        color: #183153;
        font-weight: 400;
        width: 230px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #D98829;
    }
</style>

<div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-80vh overflow-auto p-4">
    <div class="row">
        <div class="class col-md-12">
            <div class="row d-flex">
                <div class="col-md-3 d-flex">
                    <img class="payment-logo" src="{{ asset('images/dana.png') }}" alt="dana">
                </div>
                <div class="col-md-3 d-flex">
                    <button class="btn btn-linkacc">Link Account</button>
                </div>
                <div class="col-md-3 d-flex">
                    <img class="payment-logo" src="{{ asset('images/gopay.png') }}" alt="dana">
                </div>
                <div class="col-md-3 d-flex">
                    <button class="btn btn-linkacc">Link Account</button>
                </div>
            </div>
        </div>
        <div class="class col-md-12">
            <div class="row d-flex" style="margin-top: 30px;">
                <div class="col-md-3 d-flex">
                    <img class="payment-logo" src="{{ asset('images/ovo.png') }}" alt="dana">
                </div>
                <div class="col-md-3 d-flex">
                    <button class="btn btn-linkacc">Link Account</button>
                </div>
                <div class="col-md-3 d-flex">
                    <img class="payment-logo" src="{{ asset('images/shopeepay.png') }}" alt="dana">
                </div>
                <div class="col-md-3 d-flex">
                    <button class="btn btn-linkacc">Link Account</button>
                </div>
            </div>
        </div>
    </div>
    <hr size="1" color="#DDDDDD" style="width: 100%;margin-top:50px;">

    <div class="mt-4">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="hidden" value="{{ $user->id }}" name="id">
            </div>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">Nama</label>
                <div class="col-sm-10">
                    <input value="{{ $user->name }}" type="text" class="form-control" placeholder="Name" name="name">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">E-mail</label>
                <div class="col-sm-10">
                    <input value="{{ $user->email }}" type="text" class="form-control" placeholder="Email" name="email">
                </div>
            </div>

            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
            </div>

            <div class="form-group mt-5" style="float: right;">
                <button type="submit" class="btn btn-edit mx-2">Modifikasi</button>
            </div>

        </form>
    </div>

</div>
@endsection