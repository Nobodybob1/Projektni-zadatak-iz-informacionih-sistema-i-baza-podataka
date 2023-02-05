@extends('layouts.admin')



@section('content')

    
    <div class="row text-center ms-5">
        <h1 class="text-center col-md-6">All offers</h1>
        <a href="/create/offer" class="btn btn-primary col-md-3 text-white pt-3"> Add Offer</a>
    </div>
    <hr>
    <div class="container-fluid pt-5">
        <div class="container pt-5 pb-3">
            <div class="row text-center mx-auto">
        
                @include('partials._search')
            </div>
        </div>
    </div>
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <div class="row">
                    @unless ($offers->isEmpty())
                        @foreach ($offers as $offer)
                        @if ($offer->is_active)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="package-item bg-white mb-2">
                                    <div class="position-relative d-inline">
                                        <div style="position: relative">
                                            <img class="img-fluid" src="{{asset('cities_pics/'.$offer->img)}}" alt="No picture for this offer yet!">
                                            <form action="/admin/delete/offer" method="POST" id="myform">
                                                @csrf
                                                
                                                <button name="delete" value="{{$offer->id}}" type="submit" class="btn btn-danger" style="position: absolute; top:10px;right:10px">X</button>
                                            </form>
                                        </div>
                                    </div>
                                    <form action="/admin/update/{{$offer->id}}" method="post">
                                        @csrf
                                        <div class="p-4">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$offer->location_city.', '.$offer->location_state}}</small>
                                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $offer->diff_dates($offer->start_date, $offer->end_date). ' days' }}</small>
                                                    <small class="m-0"><i class="fa fa-bus text-primary mr-2"></i>{{$offer->transport_type}}</small>
                                                </div>
                                                @if ($offer->is_active)
                                                    <a class="h5 text-decoration-none" href="/single/{{$offer->id}}">{{$offer->name}}</a>
                                                @else
                                                    <h5>{{$offer->name}}</h5>
                                                @endif
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
                        @else
                            
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="package-overlay ">
                                <div class="package-item bg-white mb-2">
                                    <div class="position-relative d-inline">
                                        <div style="position: relative">
                                            <img class="img-fluid" src="{{asset('cities_pics/'.$offer->img)}}" alt="No picture for this offer yet!">
                                            <form action="/admin/delete/offer" method="POST" id="myform">
                                                @csrf
                                                
                                                <button name="delete" value="{{$offer->id}}" type="submit" class="btn btn-danger" style="position: absolute; top:10px;right:10px">X</button>
                                            </form>
                                        </div>
                                    </div>
                                    <form action="/admin/update/{{$offer->id}}" method="post">
                                        @csrf
                                        <div class="p-4">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$offer->location_city.', '.$offer->location_state}}</small>
                                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $offer->diff_dates($offer->start_date, $offer->end_date). ' days' }}</small>
                                                    <small class="m-0"><i class="fa fa-bus text-primary mr-2"></i>{{$offer->transport_type}}</small>
                                                </div>
                                                @if ($offer->is_active)
                                                    <a class="h5 text-decoration-none" href="/single/{{$offer->id}}">{{$offer->name}}</a>
                                                @else
                                                    <h5>{{$offer->name}}</h5>
                                                @endif
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
                            </div>
                        @endif
                        
                    @endforeach
                    
                    @endunless
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <form id="paginForm" action="/admin/offers" method="GET">

                            <select id="perPage" name="perPage" class="custom-select" onchange="document.getElementById('paginForm').submit()">
                                <option value={{Null}}>Per Page</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                            </select>
                            
                    </form>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    {{-- {{$offers->links()}} --}}
                    {{$offers->appends(['search' => session('search'), 'perPage' => session('perPage')])->links()}}
                    
                </div>
                
            </div>
        </div>
    </div>
@endsection