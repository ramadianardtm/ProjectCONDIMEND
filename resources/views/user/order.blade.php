@extends('user.template')
@section('title', 'My Order')

@section('content')

<style>
    a:hover {
        color: #000;
        text-decoration: none;
    }

    .home {
        margin-left: 12rem;
        margin-right: 12rem;
        margin-bottom: 20px;
    }

    .text-prim {
        color: #564b46;
    }

    .btn-edit {
        color: #fff;
        font-weight: 400;
        font-size: 16px;
        border-radius: 10px;
        background-color: #564b46;
    }

    .btn-edit:hover {
        color: #fff;
        font-weight: 400;
        font-size: 16px;
        border-radius: 10px;
        background-color: #876f61;
    }
</style>
<div class="home p-4 bg-white my-4">

    <p class="text-prim text-xl" style="font-size: 25px;">Your Orders</p>

    @if($order->count() == 0)
    <div class="text-center" style="padding: 60px;margin-bottom:50px;">
        <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
        <br>
        <h5 style="margin-top: 20px;">No Orders</h5>
    </div>
    @else

    @foreach ($order as $pd)
    @if($pd->info == 'aktif' && $pd->status == 'confirmed')
    <?php $order_info = App\Models\AddProduct::find($pd->product_id); ?>
    <?php $trainer_info = App\Models\Trainer::find($pd->trainer_id); ?>
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md mt-4">

        <div class="row d-flex">
            <div class="col-sm-8">
                <img src="/storage/{{ $order_info->image }}" style="height:200px;width:500px;object-fit:cover;" class="rounded-xl">
            </div>
            <div class="col-sm-4">
                <p class="text-prim" style="font-size: 25px;font-weight:600;">{{$order_info->name}}</p>
                <p class="" style="color:#000;font-size: 20px;">IDR {{$order_info->price}}</p>
                <div class="row pt-3 mb-4">
                    <div class="col-sm-3">
                        <img style="height: 40px;width:40px;border-radius: 20px;object-fit:cover;" src="/storage/{{ $trainer_info->image }}" alt="">
                    </div>
                    <div class="col-sm-6">
                        <p class="text-prim" style="font-size: 12px;">Trainer</p>
                        <p>{{$trainer_info->name}}</p>
                    </div>
                </div>
                <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$pd->id}}">
                    <input type="hidden" id="info" name="info" value="nonaktif">
                    <button type="submit" class="btn btn-edit text-center py-3 rounded-lg w-100" style="cursor: pointer;width:130px">
                        Finish Order
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endif
</div>
@endsection