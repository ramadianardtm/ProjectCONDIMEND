@extends('user.template')
@section('title', 'Detail Product')

@section('content')
<style>
    .detail {
        margin-left: 18rem;
        margin-right: 18rem;
    }

    .banner img {
        width: 100%;
    }

    .banner-grid-display {
        display: grid;
        grid-template-columns: 70% 30%;
    }

    .banner-grid-display3 {
        display: grid;
        grid-template-columns: 30% 45% 25%;
    }

    .banner-grid-display3 img {
        width: 100%;
    }

    .banner-grid-display img {
        width: 100%;
    }

    .pr-8 {
        padding-right: 8rem;
    }

    .pl-8 {
        padding-left: 8rem;
    }

    .btn-add {
        width: 140px;
        border-radius: 30px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }

    .btn-add:hover {
        width: 140px;
        border-radius: 30px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #a4a4a4;
        background-color: #a4a4a4;
        color: #fff;
    }

    .featured {
        width: 500px;
        height: 300px;
        object-fit: cover;
        cursor: pointer;
    }

    .detail-container {
        margin-left: 12rem;
        margin-right: 12rem;
    }

    .btn-cart {
        color: #fff;
        font-weight: 400;
        width: 230px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #564b46;
    }

    .btn-cart:hover {
        color: #fff;
        font-weight: 400;
        width: 230px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #876f61;
    }

    .btn-order {
        color: #fff;
        font-weight: 400;
        width: 180px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #564b46;
    }

    .btn-order:hover {
        color: #fff;
        font-weight: 400;
        width: 180px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #876f61;
    }
</style>

<div class="detail-container">
    <div class="home banner3 pt-2 mt-5" style="margin-bottom: 100px;">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="background-color: #fff;">
                <li class="breadcrumb-item"><a href="{{ route('user.product') }}" style="text-decoration: none;color: #000;font-weight: bold;">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$detail->name}}</li>
            </ol>
        </nav>
        <div class="row flex">
            <div class="col-sm-6">
                <img style="height:100%;width:500px;object-fit:cover;border-radius:12px;" src="/storage/{{ $detail->image }}">
            </div>
            <div class="col-sm-6" style="padding-left: 30px;">
                <h1 style="color: #564b46; font-weight: 500; font-size: 30px;">{{$detail->name}}</h1>
                <p class="truncate mt-3" style="font-weight: 600;font-size: 20px;">IDR {{$detail->price}}</p>
                <div style="margin-top: 25px;">
                    @if (\Illuminate\Support\Facades\Auth::check())

                    @if (\Illuminate\Support\Facades\Auth::user()->role == 'member')
                    <?php $trainer_info = App\Models\Trainer::find($detail->trainer); ?>
                    <!-- Popup modal Order -->
                    <div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <a style="font-weight:bold;color:#564b46;">Your Order : </a>
                                    <p style="font-size: 16px;">{{$detail->name}}</p>
                                    <?php $trainer_info = App\Models\Trainer::find($detail->trainer); ?>
                                    <p style="font-size: 16px;">Trainer : {{$trainer_info->name}}</p>
                                    <p style="font-size: 16px;font-weight:bold;">IDR {{$detail->price}}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;" data-dismiss="modal">Close</button>
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="trainer_id" id="trainer_id" value="{{$trainer_info->id}}">
                                        <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                                        <input type="hidden" name="price" id="price" value="{{$detail->price}}">
                                        <div class=" form-group mt-3">
                                            <button type="submit" class="btn btn-order" style="margin-right: 10px;">Order Now</button>
                                        </div>
                                        @if ($errors->any())
                                        <div class="alert-danger">
                                            {{ $errors->first() }}
                                        </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Popup modal order -->
                    <button type="button" class="btn btn-cart" style="margin-right: 10px;" data-toggle="modal" data-target="#deletemodalpop">Order Now</button>
                    @endif
                    @endif
                </div>
                <p class="truncate mt-3" style="font-weight: bold;font-size: 18px;">Description</p>
                <p style="font-weight: 300;font-size: 16px;text-align: justify;line-height: 30px;">{{$detail->detail}}</p>
                <a href="https://api.whatsapp.com/send?phone=6285894954819&text=Hi!%20My%20name%20is%20{{$user->name}}.%20I%20wanna%20ask%20about%20{{$detail->name}}!"><button type="button" class="btn btn-cart w-100 mt-3">Chat Now</button></a>
                <button type="button" style="margin-top: 10px; border:solid 1px #d5d5d5;border-radius:8px;padding:10px;cursor:auto;" class="w-100"><i class="fa-solid fa-phone" style="margin-right: 5px;"></i>+6285894954819</button>
            </div>
            <div class="col-sm-12 bg-white border border-gray-200 rounded-lg mt-5 p-4">
                <h1 style="color: #564b46; font-weight: 500; font-size: 24px;">Trainer Information</h1>
                <?php $trainer_info = App\Models\Trainer::find($detail->trainer); ?>
                <div class="row pt-3">
                    <div class="col-sm-2">
                        <img style="height: 100px;border-radius: 50px;object-fit:cover;width:100px;" src="/storage/{{ $trainer_info->image }}" alt="">
                    </div>
                    <div class="col-sm-8 my-auto">
                        <div class="row">
                            <div class="col-sm-2">
                                <b>Name</b>
                            </div>
                            <div class="col-sm-1">
                                <b>:</b>
                            </div>
                            <div class="col-sm-9" style="margin-left: -35px;">
                                {{ $trainer_info->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <b>About</b>
                            </div>
                            <div class="col-sm-1">
                                <b>:</b>
                            </div>
                            <div class="col-sm-9" style="margin-left: -35px;line-height: 27px;">
                                {{ $trainer_info->detail }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <b>Speciality</b>
                            </div>
                            <div class="col-sm-1">
                                <b>:</b>
                            </div>
                            <div class="col-sm-9" style="margin-left: -35px;">
                                {{ $trainer_info->special }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection