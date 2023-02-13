@extends('layouts.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Packages</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Packages</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    
    @include('partials._search')
    

    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
                <h1>Pefect Tour Packages</h1>
            </div>
            <div class="row">
                @unless ($offers->isEmpty())
                    @foreach ($offers as $offer)
                    @if ($offer->is_active)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="{{asset('cities_pics/'.$offer->img)}}" alt="No picture for this offer yet!">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{ $offer->find_dominant(explode(',', $offer->days), explode(',', $offer->location_city)) }}</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $offer->diff_dates($offer->start_date, $offer->end_date). ' days' }}</small>
                                    <small class="m-0"><i class="fa fa-bus text-primary mr-2"></i>{{$offer->transport_type}}</small>
                                </div>
                                @if ($offer->is_active)
                                    <a class="h5 text-decoration-none" href="/single/{{$offer->id}}">{{$offer->transform_name($offer->name)}}</a>
                                @else
                                    <h5>{{$offer->transform_name($offer->name)}}</h5>
                                @endif
                                
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-euro-sign text-primary mr-2"></i><h5 class="m-0">{{$offer->price_adult. 'e adults '. $offer->price_child. 'e children'}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-overlay">
                        <div class="package-item bg-white mb-2">
                            <img class="img-fluid" src="{{asset('cities_pics/'.$offer->img)}}" alt="No picture for this offer yet!">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$offer->find_dominant(explode(',', $offer->days), explode(',', $offer->location_city))}}</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $offer->diff_dates($offer->start_date, $offer->end_date). ' days' }}</small>
                                    <small class="m-0"><i class="fa fa-bus text-primary mr-2"></i>{{$offer->transport_type}}</small>
                                </div>
                                @if ($offer->is_active)
                                    <a class="h5 text-decoration-none" href="/single/{{$offer->id}}">{{$offer->transform_name($offer->name)}}</a>
                                @else
                                    <h5>{{$offer->transform_name($offer->name)}}</h5>
                                @endif
                                
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-euro-sign text-primary mr-2"></i><h5 class="m-0">{{$offer->price_adult. 'e adults '. $offer->price_child. 'e children'}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif
                    
                    
                @endforeach

                @else
                <div class=" col-md-12 text-center">
                    <b>No offers found</b>
                </div>
                
                @endunless
            </div>
            @unless ($offers->isEmpty())
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <form id="paginForm" action="/packages" method="GET">

                            <select id="perPage" name="perPage" class="custom-select" onchange="document.getElementById('paginForm').submit()">
                                <option value={{Null}} {{session('perPage')==Null ? 'selected' : '' }}>Per Page</option>
                                <option value="25" {{session('perPage')=='25' ? 'selected' : '' }}>25</option>
                                <option value="50" {{session('perPage')=='50' ? 'selected' : '' }}>50</option>
                                <option value="100" {{session('perPage')=='100' ? 'selected' : '' }}>100</option>
                                <option value="200" {{session('perPage')=='200' ? 'selected' : '' }}>200</option>
                            </select>
                            
                    </form>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    {{$offers->appends(['search' => session('search')])->links()}}
                    
                </div>
            </div>
            @endunless
                
                
                
                
            
            
        </div>
    </div>
    <!-- Packages End -->
    
    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>Explore Top Destination</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('img/destination-1.jpg') }}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="/continent/Europe">
                            <h5 class="text-white">Europe</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('img/destination-2.jpg') }}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="/continent/Asia">
                            <h5 class="text-white">Asia</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{('img/destination-3.jpg')}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="/continent/Africa">
                            <h5 class="text-white">Arfica</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('img/destination-4.jpg') }}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="/continent/North America">
                            <h5 class="text-white">North America</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('img/destination-5.jpg') }}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="/continent/South America">
                            <h5 class="text-white">South America</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ asset('img/destination-6.jpg') }}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="/continent/Australia">
                            <h5 class="text-white">Australia</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="{{ asset('js/dates.js') }}"></script>

@endsection