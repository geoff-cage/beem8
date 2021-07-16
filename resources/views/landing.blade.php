<?php
use Illuminate\Support\Facades\Storage;
?>

@extends('layouts.landing')

@section('title','Mnada App')

@section('page-css')
<style>
    footer {
        background: black;
    }

    footer>small {
        color: rgb(207, 207, 207)
    }

    .view-more {
        color: white
    }

</style>
@endsection

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Mnada App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ URL('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            </ul>
            <a class="btn btn-outline-success" href="/dashboard">Login</a>
        </div>
    </div>
</nav>

<section>
    <div class="container">
        <br>
        <div class="container text-center">
            <h2>Click button below to create auction</h2>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Make Auction
            </button>
        </div>
    </div>
</section>

{{-- Live actions --}}
<section>
    <div class="container">
        <br>
        <div class="d-flex justify-content-between">
            <div>
                <h3>Live Auctions</h3>
            </div>

            <div>
                <a class="btn btn-info view-more" href="/auctions">
                    View all
                </a>
            </div>
        </div>

        <div class="row mt-4">

            @foreach ($auctions as $auction)
            <div class="col-md-3">
                <div class="card mb-4" style="width: 100%;">
                    <img src="{{url('/')}}/{{ Storage::url($auction->image)}}" width="200" height="120" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">
                            <b>Item:</b> {{ $auction->item_name }}<br>
                            <b>Starting Price:</b> {{ number_format($auction->starting_price, 0) }} TZS <br>
                            <b>Current bid:</b> 100000 TZS <br>
                            <b>Current number of bidders:</b> 8 <br>
                            <b>Time remaining:</b> 10 mins
                        </p>
                        <br>
                        <button class="btn-success btn">
                            Make Bid
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<footer class="text-center py-3 mt-4">
    <small> Beem Hackathon 2021 </small>
</footer>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Auction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/auction" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" id="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Starting price</label>
                        <input type="number" name="price" id="" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary">
                            Create Auction
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
