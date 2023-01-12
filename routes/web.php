<?php

use App\Http\Controllers\OfferController;
use App\Models\Accommodation;
use App\Models\Offer;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/packages', [OfferController::class, 'index']);


Route::get('single/{id}', function ($id) {

    $offer = Offer::find($id);
    $accommodations = $offer->accommodations;
    $latest_offers = Offer::latest()->paginate(3);
    return view('single', ['offer' => $offer, 'accommodation' => $accommodations, 'latest' => $latest_offers]);
 });