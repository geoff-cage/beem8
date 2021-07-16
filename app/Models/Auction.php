<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function winner(){
        return $this->belongsTo(User::class,'winner_id', 'id');
    }

    public function bids(){
        return $this->hasMany(Bid::class,'auction_item_id', 'id');
    }
}