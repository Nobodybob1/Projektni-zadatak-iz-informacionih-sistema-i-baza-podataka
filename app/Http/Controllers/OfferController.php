<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::latest()->get();
        
        return view('package', ['offers' => $offers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_offer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'transport_price' => 'required',
            'transport_type' => 'required',
            'price_adult' => 'required',
            'price_child' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location_city' => 'required',
            'location_state' => 'required',
            'location_continent' => 'required',
            'program' => 'required',
            'note' => 'required',
        ]);

        $offer = Offer::create($formFields);

        return redirect('/admin/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $Offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $Offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer, $id)
    {
        $offer = Offer::whereId($id)->get();
        $offer = $offer[0];

        return view('admin_update_offer', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $Offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'transport_price' => 'required',
            'transport_type' => 'required',
            'price_adult' => 'required',
            'price_child' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location_city' => 'required',
            'location_state' => 'required',
            'location_continent' => 'required',
        ]);

        $offer = Offer::whereId($id)->get();
        $offer[0]->update($data);
        return redirect('/admin/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $Offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $Offer)
    {
        //
    }

    public function admin_offers(Offer $offers) {
        $offers = Offer::latest()->get();
        
        return view('admin_offers', compact('offers'));
    }

    

}
