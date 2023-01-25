<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Offer;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_accommodation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'room_bed' => 'required',
            'rating' => 'required',
            'internet' => 'required',
            'tv' => 'required',
            'ac' => 'required',
            'fridge' => 'required'
        ]);

        Accommodation::create($data);

        return redirect('/admin/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $accommodation = Accommodation::findOrFail($id);
        $pictures = $accommodation->accommodationpictures()->get();
        return view('single_accommodation', ['item' => $accommodation, 'pictures' => $pictures]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function edit(Accommodation $accommodation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accommodation $accommodation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $accommodation = Accommodation::find($request->id);
        
        $accommodation->delete();
        return back()->with('message', 'Accommodation deleted successfully!');
    }

    public function admin_accommodations() {
        $accommodations = Accommodation::all();
        
        return view('admin_accommodation', compact('accommodations'));
    }
}
