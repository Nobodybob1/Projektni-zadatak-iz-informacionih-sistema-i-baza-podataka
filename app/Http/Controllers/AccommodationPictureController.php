<?php

namespace App\Http\Controllers;

use App\Models\AccommodationPicture;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class AccommodationPictureController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $image = $request->file('image');
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('accommodation_pics/' . $fileName);

        $image = Image::make($image->getRealPath())->resize(300, 200)->save($path);
      
        AccommodationPicture::create(['accommodation_id' => $request->id, 'img_path' => $image->basename]);
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccommodationPicture  $accommodationPicture
     * @return \Illuminate\Http\Response
     */
    public function show(AccommodationPicture $accommodationPicture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccommodationPicture  $accommodationPicture
     * @return \Illuminate\Http\Response
     */
    public function edit(AccommodationPicture $accommodationPicture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccommodationPicture  $accommodationPicture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccommodationPicture $accommodationPicture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccommodationPicture  $accommodationPicture
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccommodationPicture $accommodationPicture)
    {
        //
    }


}
