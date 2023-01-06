@extends('user.template')
@section('title', 'Welcome!')

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

    /* Card CSS */
    .container {
        position: relative;
        display: flex;
        justify-content: center;
        max-width: 1200px;
        align-items: center;
        flex-wrap: wrap;
        z-index: 1;
    }

    .container .card {
        position: relative;
        width: 280px;
        height: 400px;
        margin: 30px;
        box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.1);
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        border-top: 1px solid rgba(255, 255, 255, 0.5);
        border-left: 1px solid rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(5px);
    }

    .container .card .content {
        padding: 20px;
        text-align: center;
        opacity: 1;
        transition: 0.5s;
    }

    .container .card:hover .content {
        opacity: 1;
    }

    .container .card .content h2 {
        position: absolute;
        top: -80px;
        right: 30px;
        font-size: 8em;
        color: rgba(255, 255, 255, 0.05);
        pointer-events: none;
    }

    .container .card .content h3 {
        font-size: 23px;
        color: #fff;
        z-index: 1;
    }

    .container .card .content p {
        font-size: 1em;
        font-style: italic;
        color: #fff;
        font-weight: 300;
    }
</style>
<div class="w-12/12 bg-white shadow-md overflow-auto" style="margin-top: 30px;">
    <div class="home justify-content-center text-center">
        <h3 class="display-4">Level Up Your</h3>
        <h3 class="display-4 pb-2">Product & Life.</h3>
    </div>
    <div class="home banner text-center">
        <img src="{{ asset('images/arci5.jpg') }}" style="width: 100%;height:400px;object-fit:cover;border-radius:8px;">
        <p class="pt-5" style="line-height: 40px;">
            “The Internet of Things is the game changer for an overall business ecosystem transformation”</p>
    </div>
    <div class="home banner2 mt-5 pt-5" style="margin-bottom:100px;">
        <div class="row banner-grid-display align-items-center">
            <div class="col-sm-8">
                <h3 class="pr-8" style="font-weight: bold;font-size:20px;text-align:right;">Condimend changing the world?</h3>
                <p class="pr-8" style="text-align: right;line-height: 32px;">The number of devices expected to be connected to the Internet (IoT) around the world will reach about 38.6 billion in 2025 and 50 billion by 2030 (Statista).
                    In a nutshell, it will result in creating a massive worldwide network of connected devices across various industries.</p>
            </div>
            <div class="col-sm-4">
                <img style="height: 300px;object-fit:cover;border-radius:12px;" src="{{ asset('images/arci3.jpg') }}">
            </div>
        </div>
    </div>
    <div class="home banner3 mt-2" style="margin-bottom:100px;">
        <div class="row banner-grid-display3 align-items-center">
            <div class="col">
                <img src="{{ asset('images/arci4.jpg') }}" style="border-radius:12px;" alt="3-1">
            </div>
            <div class="col pl-5">
                <h3 style="font-weight: bold;font-size:20px;">Condimend make life easier?</h3>
                <p style="text-align: left;line-height: 32px;">A big reason for the invention of IoT is
                    convenience. Smart devices that automate
                    daily tasks allow humans to do other activities.
                    These devices ultimately lighten people's workload.</p>
            </div>
        </div>
    </div>
        <div class="text-center" style="margin-top: 70px;background-color:#141414;padding:20px;">
        <h1 class="text-center p-3 display-4" style="color: #fff;font-size:50px;margin-top:50px;">What They Said</h1>
        <div class="container" style="margin-bottom: 100px;">
            <div class="card">
                <div class="content">
                    <img style="width: 100px; height:100px;border-radius:50%;object-fit:cover;margin:auto;" src="https://i.ibb.co/zQJdjqv/foto.jpg">
                    <h3 style="margin-top: 10px;">Firzan Ananta</h3>
                    <p>I have been trying to find smart irrigation system for my farm. Thank you.</p>
                    <i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <img style="width: 100px; height:100px;border-radius:50%;object-fit:cover;margin:auto;" src="https://i.ibb.co/ZfnjJLV/blakelivelycostumeinstitutegalacelebratingyc9ph0f-zwyl.jpg">
                    <h3 style="margin-top: 10px;">Savanna Jacq</h3>
                    <p>Createch really helps me to find what best for my home! Thank you!</p>
                    <i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <img style="width: 100px; height:100px;border-radius:50%;object-fit:cover;margin:auto;" src="https://i.ibb.co/QJfPF3B/ryan-reynolds-gettyimages-630281680.webp">
                    <h3 style="margin-top: 10px;">Gifino Thoriq</h3>
                    <p>I used to forgot to turn my AC off, but not again all thanks to Createch's Smart AC.</p>
                    <i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i>
                </div>
            </div>
        </div>
        <hr size="3" color="#000" style="width: 0%;opacity:1;">
    </div>  
</div>
@endsection