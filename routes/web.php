<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuctionController::class, 'index']);
Route::post('/auction', [AuctionController::class, 'createAuction']);

Route::get('/auctions', [AuctionController::class, 'displayAll']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[AuthController::class, 'showDashboard']);
});
