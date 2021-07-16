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
