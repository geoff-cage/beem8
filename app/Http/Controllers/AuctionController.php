<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    public function createAuction(Request $request){

        if(!Auth::check()){
            return \redirect()->back();
        }

        $current = Carbon::now();
        $path = $request->file('image')->store('auction_images');

        $auction = new Auction;
        $auction->item_name = $request->name;
        $auction->starting_price = $request->price;
        $auction->start_time = $current; //set current date
        $auction->description = $request->description;
        $auction->end_time = $current->addMinute(2); //should be 24 hours but for testing purposes will be 2-5 mins
        $auction->owner_id = Auth::user()->id;
        $auction->image = $path;

        if($auction->save()){
            return redirect('/');
        } else{
            echo 'error';
        }
    }

    public function displayAll(){
        $auctions = Auction::all();
        return view('live-auctions', compact('auctions'));
    }

    public function index(){
        $auctions = Auction::all();
        return view('landing', compact('auctions')); //returns all auctions
    }
}
