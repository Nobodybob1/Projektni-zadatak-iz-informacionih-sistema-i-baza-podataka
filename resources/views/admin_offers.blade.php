@extends('layouts.admin')

@section('content')
    <div class="row text-center ms-5">
        <h1 class="text-center col-md-6">All offers</h1>
        <a href="/create/offer" class="btn btn-primary col-md-3 text-white pt-3"> Add Offer</a>
    </div>
    <hr>
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <div class="row">
                    @unless ($offers->isEmpty())
                        @foreach ($offers as $offer)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <form action="/admin/delete/offer" method="POST" id="myform">
                                @csrf
                                
                                <button name="delete" value="{{$offer->id}}" type="submit" class="btn btn-danger">X</button>
                            </form>
                            <div class="package-item bg-white mb-2">
                                <div class="position-relative d-inline">
                                    <img class="img-fluid" src="{{ asset('img/package-1.jpg') }}" alt="">
                                    
                                    
                                </div>
                                <form action="/admin/update/{{$offer->id}}" method="post">
                                    @csrf
                                    <div class="p-4">
                                            <div class="d-flex justify-content-between mb-3">
                                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$offer->location_city.', '.$offer->location_state}}</small>
                                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $offer->diff_dates($offer->start_date, $offer->end_date). ' days' }}</small>
                                                <small class="m-0"><i class="fa fa-bus text-primary mr-2"></i>{{$offer->transport_type}}</small>
                                            </div>
                                            <a class="h5 text-decoration-none" href="/single/{{$offer->id}}">{{$offer->name}}</a>
                                            <div class="border-top mt-4 pt-4">
                                                <div class="d-flex justify-content-between">
                                                    <i class="fas fa-euro-sign text-primary mr-2"></i><h5 class="m-0">{{$offer->price_adult. 'e adults '. $offer->price_child. 'e children'}}</h5>
                                                </div>
                                            </div>
                                    </div>
                                    <button class="btn btn-primary">Update Offer</button>
                                </form>
                            </div>
                        </div>
                @endforeach
                @endunless
            </div>
        </div>
    </div>
@endsection