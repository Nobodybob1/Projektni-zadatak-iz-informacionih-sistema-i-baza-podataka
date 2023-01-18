<?php

use App\Http\Controllers\OfferController;
use App\Models\Accommodation;
use App\Models\Offer;
use App\Http\Controllers\ReservationController;
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

    // Uraditi bolje?
    $offer = Offer::find($id);
    $accommodations = $offer->accommodations;
    $latest_offers = Offer::latest()->paginate(3);
    return view('single', ['offer' => $offer, 'accommodation' => $accommodations, 'latest' => $latest_offers]);
 });

 Route::get('/booking/{id}', [ReservationController::class, 'store']);

 Route::get('/admin/index', [ReservationController::class, 'index']);

 Route::post('/admin/reserve/{id}', [ReservationController::class, 'update']);

 Route::get('/admin/reservations', [ReservationController::class, 'all_reservations']);

 Route::get('/admin/offers', [OfferController::class, 'admin_offers']);

 Route::get('/create/offer', [OfferController::class, 'create']);
 Route::post('/creating/offer', [OfferController::class, 'store']);

 Route::post('/admin/update/{id}', [OfferController::class, 'edit']);
 Route::post('/admin/updating/{id}', [OfferController::class, 'update']);
