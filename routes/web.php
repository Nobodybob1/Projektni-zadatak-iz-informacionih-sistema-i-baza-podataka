<?php

use App\Http\Controllers\OfferController;
use App\Models\Accommodation;
use App\Models\Offer;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AccommodationPictureController;
use App\Models\AccommodationPicture;
use Database\Factories\OfferFactory;
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
 })->middleware('auth');

 Route::post('/register_user', [UserController::class, 'store']);

 Route::get('/logout', [UserController::class, 'logout']);

 Route::get('/admin/accommodation', [AccommodationController::class, 'admin_accommodations'])->middleware('auth');

 Route::get('/create/accommodation', [AccommodationController::class, 'create'])->middleware('auth');
 Route::post('/creating/accommodation', [AccommodationController::class, 'store']);

 Route::post('/offerAndAccommodation', [OfferController::class, 'offer_and_accommodation']);

Route::post('/accommodation/delete', [AccommodationController::class, 'destroy']);

Route::get('/single_accommodation/{id}', [AccommodationController::class, 'show'])->middleware('auth');

Route::post('/add_img_accommodation', [AccommodationPictureController::class, 'store']);


Route::get('/search', [OfferController::class, 'search']);


Route::get('/factory', function() {
  
   //$faker = Faker\Factory::create('de_DE');
   //  dd($faker->name);
   // // $start = new DateTime();
   // // $end = new DateTime('+1 year');

   // // dd($faker->dateTime($max = 'now', $timezone = null)->format('Y-m-d'));
   // $startDate = Carbon::now();
   // dd($startDate);
   // $endDate = Carbon::now()->addYear();
   // //$faker->dateBetween($startDate, $endDate);

   //  dd($faker->address());
   
   // $city = $faker->city;
   // $state = $faker->state;
   
   // dd($city,$state);
   
   //OfferFactory::times(10)->create();
   OfferFactory::times(10)->create();
});

Route::get('/factory1', function(){
//    $faker = Faker\Factory::create();
// $cities = [];
// $i = 0;
// while($i < 90){
//     $city = $faker->city;
//     $state = $faker->state;
//     $country = $faker->country;
//     $cities[] = [
//         'city' => $city,
//         'state' => $state,
//         'country' => $country
//     ];
//     $i++;
// }
//    dd($cities);

$offer_cntrl = new OfferController;
dd($offer_cntrl->csvToArray(public_path('locations_list.txt'))[5]);

});

Route::get('/program_gen/{num_days}', [OfferFactory::class, 'program_gen']);

Route::get('/mailtest/{id}', [ReservationController::class, 'mail_test']);