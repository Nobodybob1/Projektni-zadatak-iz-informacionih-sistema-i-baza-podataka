<?php

namespace App\Http\Controllers;

use App\Mail\email_class;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Mail;
use App\Models\Offer;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::where('is_approved', '0')->get();
        return view('admin_index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $formFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'phone_no' => 'required',
            'email' => ['required', 'email'], //ovde da se skloni ovaj uunique , Rule::unique('reservations', 'email')
            'payment_type' => 'required',
            'num_adults' => 'required',
            'num_child' => 'required',
            'note' => 'required'

        ]);

        $formFields['offer_id'] = $id;
        Reservation::create($formFields);
        return back()->with('message', 'Reservation sent successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {   
        $reser = Reservation::find($request['id']);
        $offer = Offer::find($reser->offer_id);
        $reser->update([
            'is_approved' => '1'
        ]);

        $data = [$reser,$offer];

        
        Mail::to($reser->email)->send(new email_class($data));

        return back()->with('message', 'Reservation accepted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function all_reservations(Reservation $reservations) {
        $reservations = Reservation::all();
        return view('admin_reservations', compact('reservations'));
    }

    public function mail_test($data){
        Mail::to("desimirdimovic@gmail.com")->send(new email_class($data));
    }
}
