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
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
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
    <div class="container mt-3">
        <h3>Live Auctions</h3>


        <div class="row mt-4">

            @foreach ($auctions as $auction)
            <div class="col-md-3">
                <div class="card mb-4" style="width: 100%;">
                    <img src="https://via.placeholder.com/200x120" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">
                            <b>Item:</b> {{ $auction->item_name }} <br>
                            <b>Starting Price:</b> {{number_format($auction->starting_price , 0)}} TZS <br>
                            <b>Current bid:</b> 100,000 TZS <br>
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
</section>



@endsection
