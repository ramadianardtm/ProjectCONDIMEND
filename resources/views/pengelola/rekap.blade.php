@extends('user.template')
@section('title', 'Dashboard - Riwayat')

@section('content')

<style>
    .btn-edit {
        color: #183153;
        font-weight: 400;
        width: 170px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #D98829;
    }

    .btn-finish {
        color: #ff6459;
        font-weight: 400;
        font-size: 16px;
        border: solid 1px #ff6459;
        border-radius: 10px;
        background-color: #fff;
    }
</style>
<div class="w-10/12 ml-3 ">
    <div class="row mb-2 overflow-auto" style="justify-content: space-between;">
        <div class="p-3 col-sm-4">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-4">
                <p class="text-blueDark text-xl">Total Orders</p>

                @if($order->count() == 0)
                <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">0</p>
                @else
                <?php $jumlahorder = $order->count(); ?>
                <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$jumlahorder}}</p>
                @endif

            </div>
        </div>
        <div class="p-3 col-sm-4">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-4">
                <p class="text-blueDark text-xl">Total Users</p>

                @if($user->count() == 0)
                <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">0</p>
                @else
                <?php $jumlahuser = $user->count(); ?>
                <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$jumlahuser}}</p>
                @endif

            </div>
        </div>
        <div class="p-3 col-sm-4">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-4">
                <p class="text-blueDark text-xl">Total Trainers</p>

                @if($trainer->count() == 0)
                <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">0</p>
                @else
                <?php $jumlahtrainer = $trainer->count(); ?>
                <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$jumlahtrainer}}</p>
                @endif

            </div>
        </div>
    </div>

    <div class="row p-4">
        <div class="w-9/12 bg-white border border-gray-200 rounded-2xl shadow-md overflow-auto p-4">
            <p class="text-blueDark text-xl">Order History</p>
            <div class="block w-full p-3 max-h-80vh mt-4">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                        @if($order->count() == 0)
                        <div class="text-center" style="padding: 60px;margin-bottom:50px;">
                            <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
                            <br>
                            <h5 style="margin-top: 20px;">No Orders</h5>
                        </div>
                        @else

                        @foreach ($order as $pd)
                        @if($pd->status == 'confirmed' && $pd->info == 'nonaktif' )
                        <?php $user_info = App\Models\User::find($pd->user_id); ?>
                        <?php $order_info = App\Models\AddProduct::find($pd->product_id); ?>
                        <?php $trainer_info = App\Models\Trainer::find($pd->trainer_id); ?>
                        <tr class="bg-white border border-gray-200 rounded-2xl shadow-md overflow-auto">
                            <td><i class="fa-solid fa-user" style="font-size: 30px;padding-left:1px;"></i></td>
                            <td>{{ $user_info->name }}</td>
                            <td>{{ $order_info->name }}<br>
                                <b>IDR {{ $order_info->price }}</b>
                            </td>
                            <td>
                               <button style="border:solid 1px #564b46;border-radius:5px;padding-top:3px;padding-bottom:3px;padding-left:7px;padding-right:7px;"><p class="text-prim" style="font-size: 12px;">Trainer</p></button>
                                <p>{{$trainer_info->name}}</p>
                            </td>
                            <td>
                                <button class="btn btn-finish mx-2" type="button" style="cursor: auto;">Finished</button>
                            </td>
                        </tr>

                        @endif

                        @endforeach

                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-2/12 ml-4">
            <div class="block max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-md">
                <p class="text-blueDark text-xl">Total Products</p>

                @if($product->count() == 0)
                <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">0</p>
                @else
                <?php $jumlahproduct = $product->count(); ?>
                <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$jumlahproduct}}</p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection