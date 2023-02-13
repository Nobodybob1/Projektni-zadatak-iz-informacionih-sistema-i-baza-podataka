<?php

use App\Http\Controllers\OfferController;
use App\Models\Accommodation;
use App\Models\Offer;
use App\Models\User;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AccommodationPictureController;
use App\Mail\newsletter_mail;
use App\Models\AccommodationPicture;
use Database\Factories\OfferFactory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\CommonMark\Node\Block\HtmlBlock;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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
   //  while(DB::table('offers')->max('id')<550){
       if(User::where('name', 'done')->get()->isEmpty()){
         
         return view('seeding');
         
         // echo "<img src=\"{{asset('akirambow-spoiled-rabbit.gif')}}\" alt=\"\">";
      }
      
      // return view('seeding');
   return view('index', ['offers' => Offer::where('is_active', 1)->latest()->take(6)->get()]);
    
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

 Route::get('/admin/offers', [OfferController::class, 'admin_offers'])->middleware('auth')->name('admin.offers');

 Route::get('/create/offer', [OfferController::class, 'create'])->middleware('auth');
 Route::post('/creating/offer', [OfferController::class, 'store'])->middleware('auth');

 Route::post('/admin/update/{id}', [OfferController::class, 'edit'])->middleware('auth');
 Route::post('/admin/updating/{id}', [OfferController::class, 'update'])->middleware('auth');
 Route::post('/admin/users/update/{id}', [UserController::class, 'edit'])->middleware('auth');
 Route::post('/admin/users/updating/{id}', [UserController::class, 'update'])->middleware('auth');
 
 Route::post('/admin/delete/offer', [OfferController::class, 'destroy'])->middleware('auth');
 Route::post('/admin/delete/user', [UserController::class, 'destroy'])->middleware('auth');


 Route::get('/login', function(){

    return view('login_page');
 });

 Route::post('/login_user', [UserController::class, 'login']);

 Route::get('/staff', [UserController::class, 'index']);

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

Route::post('/newsletter', function(Request $request){
   Mail::to($request->email)->send(new newsletter_mail());
   return back()->with('message', 'You are succesffuly subscribed to our newsletter!');
});

Route::get('/continent/{param}', [OfferController::class, 'show' ]);


Route::get('clear_search', function(){
   session()->forget('search');
   session()->put('search',[
      'name' => null,
      'start_date' => null,
      'end_date' => null,
      'location_state' => null,
      'location_continent' => null,
      'transport_type' => null,
   ]);
   return back();

});

Route::get('/check_seeding', [OfferController::class, 'check_seeding']);
