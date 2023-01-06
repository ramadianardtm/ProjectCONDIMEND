@extends('user.template')
@section('title', 'Edit Product | CONDIMEND')

@section('content')
<html>

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
</head>
<style>
    .home {
        margin-left: 18rem;
        margin-right: 18rem;
        margin-top: 3rem;
    }

    .banner1 {
        width: 100%;
        padding-left: 25rem;
        padding-right: 25rem;

    }

    .btn-reg {
        color: #fff;
        font-weight: 400;
        width: 230px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #564b46;
    }

    .btn-reg:hover {
        color: #fff;
        font-weight: 400;
        width: 230px;
        font-size: 16px;
        border-radius: 10px;
        background-color: #876f61;
    }
</style>

<body>

    <div class="w-10/12 ml-3 bg-white border border-gray-200 rounded-2xl shadow-md max-h-150vh overflow-auto p-4">
        <div class="row">
            <p class="col text-blueDark text-xl" style="font-size: 28px;">Edit Product</p>
            @if ($errors->any())
            <div class="flex w-full p-4 mb-4 text-sm text-white bg-red-700 rounded-lg self-start" role="alert">
                <ul class="mt-1.5 text-blue-700 list-disc list-inside">
                    {!! implode('', $errors->all('<li style="color: #373737;">:message</li>')) !!}
                </ul>
            </div>
            @endif
        </div>
        <div class="block w-full p-4 bg-white border border-gray-200 rounded-lg shadow-md mt-4">
            <div class="w-full flex justify-center">
                <form action="" method="POST" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <div class="row text-left">
                        <div class="col-sm-12 mb-3">
                            <div>
                                <center>
                                    <img class="mb-2" id="output" src="/storage/{{ $product->image }}" style="max-width: 100%;height:200px;object-fit:cover;" />
                                </center>
                            </div>
                            <div class="form-group">
                                <label>
                                    <p style="color:#373737;">Edit Product Image</p>
                                </label>
                                <input type="file" onchange="loadFile(this)" value="{{ $product->image }}   " id="image" name="image" class="form-control-file">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="name">Product Name</label>
                            <input id="name" name="name" type="text" class="form-control" value="{{$product->name}}" placeholder="Insert Product Name">
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="name">Product Detail</label>
                            <textarea id="detail" name="detail" rows="5" class="form-control" placeholder="Insert Product Detail">{{$product->detail}}</textarea>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="exampleFormControlInput1">Product Price</label>
                            <input id="price" name="price" type="text" class="form-control" value="{{$product->price}}" placeholder="Insert Product Price">
                        </div>
                        <div class="col-sm-12 mb-3 form-group">
                            <label for="exampleFormControlInput1">Trainer Name</label><br>
                            <select name="trainer" style="border: solid 1px #c4c4c4; border-radius: 4px;">
                                <?php $cat = App\Models\Trainer::all(); ?>
                                <option value="0" disabled>Pick here</option>
                                @foreach ($cat as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 center text-center">
                            <button type="submit" class="btn btn-reg mx-2">Edit Product</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>
    var loadFile = function(e) {
        console.log('masuk');
        var output = document.getElementById('output');
        document.getElementById('before').style.display = 'none';
        document.getElementById('after').style.display = 'block';

        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection

</html>