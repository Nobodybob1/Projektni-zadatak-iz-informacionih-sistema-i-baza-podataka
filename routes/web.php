<?php

use App\Http\Controllers\OfferController;
use App\Models\Accommodation;
use App\Models\Offer;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
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

 Route::get('/admin/index', [ReservationController::class, 'index'])->middleware('auth');

 Route::post('/admin/reserve/{id}', [ReservationController::class, 'update'])->middleware('auth');

 Route::get('/admin/reservations', [ReservationController::class, 'all_reservations'])->middleware('auth');

 Route::get('/admin/offers', [OfferController::class, 'admin_offers'])->middleware('auth');

 Route::get('/create/offer', [OfferController::class, 'create'])->middleware('auth');
 Route::post('/creating/offer', [OfferController::class, 'store'])->middleware('auth');

 Route::post('/admin/update/{id}', [OfferController::class, 'edit'])->middleware('auth');
 Route::post('/admin/updating/{id}', [OfferController::class, 'update'])->middleware('auth');
 
 Route::post('/admin/delete/offer', [OfferController::class, 'destroy'])->middleware('auth');



 Route::get('/login', function(){

    return view('login_page');
 });

 Route::post('/login_user', [UserController::class, 'login']);

 Route::get('/register', function(){
    return view('register');
 });

 Route::post('/register_user', [UserController::class, 'store']);

 Route::get('/logout', [UserController::class, 'logout']);