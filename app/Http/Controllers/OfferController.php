<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Accommodation;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        if(session('search')!=[]){
            $offers = $this->search_new(session('search'));
        }else{
            $offers = Offer::latest();
        }
       
        if(request('perPage')){
           
            return view('package', ['offers' => $offers->paginate(request('perPage'))->appends(request()->query())]);
        }
        else{
            
            return view('package', ['offers' => $offers->paginate(1)->appends(request()->query())]);
        }

    }//->appends(request()->query())

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
        $accommodations = Accommodation::all();

        return view('add_accommodation_to_offer', compact('offer', 'accommodations')); // bilo admin/index ali rekoh logicnije da te vrati na offere
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
            'program' => 'required',
            'note' => 'required'
        ]);

        $offer = Offer::whereId($id)->get();
        $offer[0]->update($data);
        return redirect('/admin/offers')->with('message', 'Offer updated successfully!');
        //return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $Offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $offer = Offer::find($request->delete);
        $offer->accommodations()->detach();
        $offer->delete();
        if(Reservation::where('offer_id', $request->delete)->take(1)->first()){
            Reservation::where('offer_id', $request->delete)->delete();//get();
        }
        
        return back()->with('message', 'Offer deleted successfully!');
    }

    public function admin_offers(Offer $offers) {

        if(session('search') != []){
            $offers = $this->search_new(session('search'));
        }
       
        if(request('perPage')){
            return view('admin_offers', ['offers' => $offers->paginate(request('perPage'))->appends(request()->query())]);
        }  
        else{
            
            return view('admin_offers', ['offers' => $offers->paginate(1)->appends(request()->query())]);
        }
    }

    public function offer_and_accommodation(Request $request, Offer $offer) {
        $offer = Offer::whereId($request['id'])->get();
        $offer = $offer[0];

        $inputs = $request->collect();
        $inputs->shift();
        $inputs->shift();

        foreach($inputs as $input) {
            $offer->accommodations()->attach($input);
        }

        return redirect('/admin/index')->with('message', 'Offer created successfully!');
    }


    
    public function search(Request $request){
        session()->put('search',$request->all());

            $offers = Offer::where(function ($query) use ($request) {
                if($request->name){
                    $query->where('name', 'like', '%' . $request->name . '%');
                }
                
            })->where(function ($query) use ($request) {
                if($request->location_state){
                    $query->where('location_state', 'like', '%' . $request->location_state . '%');
                }
            })->where(function ($query) use ($request) {
                if($request->location_continent){
                    $query->where('location_continent', 'like', '%' . $request->location_continent . '%');
                }
            })->where(function ($query) use ($request) {
                if($request->transport_type){
                    $query->where('transport_type', 'like', '%' . $request->transport_type . '%');
                }
            })->where(function ($query) use ($request) {
                if($request->start_date != null && $request->end_date == null){
                    $query->where('start_date', '>=', $request->start_date);
                }elseif($request->start_date == null && $request->end_date != null){
                    $query->where('end_date', '<=', $request->end_date);
                }elseif($request->start_date != null && $request->end_date != null){
                    $query->where('start_date', '>=', $request->start_date)->where('end_date', '<=', $request->end_date);
                }
                
            })->paginate(1); //50 je default 


            if(auth()->user()){
                return view('admin_offers', ['offers'=> $offers]);
            }else{
                return view('package', ['offers'=> $offers]);
            }
            
        }

        public function search_new($request){
        
            if(sizeof($request) <= 5){
                return Offer::latest();
            }
            $offers = Offer::where(function ($query) use ($request) {
                if ($request['name']) {
                    $query->where('name', 'like', '%' . $request['name'] . '%');
                }
            })->where(function ($query) use ($request) {
                if ($request['location_state']) {
                    $query->where('location_state', 'like', '%' . $request['location_state'] . '%');
                }
            })->where(function ($query) use ($request) {
                if ($request['location_continent']) {
                    $query->where('location_continent', 'like', '%' . $request['location_continent'] . '%');
                }
            })->where(function ($query) use ($request) {
                if ($request['transport_type']) {
                    $query->where('transport_type', 'like', '%' . $request['transport_type'] . '%');
                }
            })->where(function ($query) use ($request) {
                if ($request['start_date'] != null && $request['end_date'] == null) {
                    $query->where('start_date', '>=', $request['start_date']);
                } elseif ($request['start_date'] == null && $request['end_date'] != null) {
                    $query->where('end_date', '<=', $request['end_date']);
                } elseif ($request['start_date'] != null && $request['end_date'] != null) {
                    $query->where('start_date', '>=', $request['start_date'])->where('end_date', '<=', $request['end_date']);
                }
            });
                  return $offers;
            }
    

//     {
//         $searchParams = $request->only(['name', 'name_city', 'location_state', 'location_continent', 'transport_type', 'start_date', 'end_date']);
//         session(['searchParams' => $searchParams]);
        
//         $offers = Offer::where(function ($query) use ($request) {
//                 if($request->name){
//                     $query->where('name', 'like', '%' . $request->name . '%');
//                 }
                
//             })->where(function ($query) use ($request) {
//                 if($request->name_city){
//                     $query->where('location_city', 'like', '%' . $request->name_city . '%');
//                 }
                
//             })->where(function ($query) use ($request) {
//                 if($request->location_state){
//                     $query->where('location_state', 'like', '%' . $request->location_state . '%');
//                 }
//             })->where(function ($query) use ($request) {
//                 if($request->location_continent){
//                     $query->where('location_continent', 'like', '%' . $request->location_continent . '%');
//                 }
//             })->where(function ($query) use ($request) {
//                 if($request->transport_type){
//                     $query->where('transport_type', 'like', '%' . $request->transport_type . '%');
//                 }
//             })->where(function ($query) use ($request) {
//                 if($request->start_date != null && $request->end_date == null){
//                     $query->where('start_date', '>=', $request->start_date);
//                 }elseif($request->start_date == null && $request->end_date != null){
//                     $query->where('end_date', '<=', $request->end_date);
//                 }elseif($request->start_date != null && $request->end_date != null){
//                     $query->where('start_date', '>=', $request->start_date)->where('end_date', '<=', $request->end_date);
//                 }
//             })->paginate(1)->appends(session('searchParams', []));
//             // $searchParams = session('searchParams');

// // this is how you can pass it to pagination links
//             // $offers->appends($searchParams);
//          return view('package', ['offers'=> $offers, 'searchParams' => $searchParams]);
//     }



}
