@extends('user.template')
@section('title', 'Manage Trainer')

@section('content')

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
</head>
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

    .product-grid {
        display: grid;
        grid-template-columns: auto auto auto auto;
        color: black;
    }

    .product-grid a {
        text-decoration: none;
        color: black;
    }

    .btn-signin {
        height: fit-content;
        width: 120px;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #000;
        background-color: #fff;
        color: #000;
        font-weight: 500;
    }

    .btn-signin:hover {
        width: 120px;
        font-weight: 700px;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }

    .btn-add {
        width: 130px;
        border-radius: 30px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }

    .btn-add:hover {
        width: 130px;
        border-radius: 30px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #a4a4a4;
        background-color: #a4a4a4;
        color: #fff;
    }

    .icon-edit:hover {
        color: #37c1f0;
    }

    .icon-del:hover {
        color: #a11313;
    }
</style>
<div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-80vh overflow-auto p-4">
    @if ($errors->any())
    <div class="flex w-full p-4 mb-4 text-sm text-white bg-red-700 rounded-lg self-start" role="alert">
        <ul class="mt-1.5 text-blue-700 list-disc list-inside">
            {!! implode('', $errors->all('<li style="color: #373737;">:message</li>')) !!}
        </ul>
    </div>
    @endif
    <p class="col text-blueDark text-xl" style="font-size: 28px;">Manage Trainer</p>
    <div class="row row-cols-1 row-cols-md-3 px-2 g-4">
        @foreach($trainer as $pr)
        <div class="card mt-4 mx-4" style="width: 16rem;border-radius:12px;">
            <a href="detail/{{ $pr->id }}">
                <div class="rounded"><img style="height:150px; object-fit:cover;border-radius:27px" src="/storage/{{ $pr->image }}" class="card-img-top p-4" alt="Product Image">
                </div>
                <div class="card-body">
                    <p class="card-text" style="font-size: 18px;">{{ $pr->name }}</p>
                    <hr class="mt-1">
                    <hr>
                    <div class="d-flex mt-4" style="justify-content: end;">
                        <a href="edit-trainer/{{ $pr->id }}" class="btn btn-edit" style="color:#fff !important">Edit</a>
                        <a href="remove-trainer/{{ $pr->id }}" class="btn icon-del"><i class="fa-regular fa-trash-can" style="color: tomato;font-size:18px"></i></a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="d-flex mt-4">
        {{ $trainer->links('pagination::bootstrap-4') }}
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
@endsection