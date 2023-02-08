@extends('layouts.app')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/carousel-1.jpg') }} " alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-3 text-white mb-md-4">Let's Discover The World Together</h1>
                            <a href="/packages" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-3 text-white mb-md-4">Discover Amazing Places With Us</h1>
                            <a href="/packages" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->



    

 
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
    
    <!-- Destination Start -->


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
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="package-item bg-white mb-2">
                                <img class="img-fluid" src="{{asset('cities_pics/'.$offer->img)}}" alt="">
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$offer->find_dominant(explode(',', $offer->days), explode(',', $offer->location_city))}}</small>
                                    <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $offer->diff_dates($offer->start_date, $offer->end_date). ' days' }}</small>
                                    <small class="m-0"><i class="fa fa-bus text-primary mr-2"></i>{{$offer->transport_type}}</small>
                                </div>
                                
                                    <a class="h5 text-decoration-none" href="/single/{{$offer->id}}">{{$offer->transform_name($offer->name)}}</a>
                    
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-euro-sign text-primary mr-2"></i><h5 class="m-0">{{$offer->price_adult. 'e adults '. $offer->price_child. 'e children'}}</h5>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                    
                @endunless
                
            </div>
        </div>
    </div>
    <!-- Packages End -->

    <!--About starts -->
    <div id="about_us" class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About</h6>
                <h1>About us</h1>
            </div>
            <div class="col-md-12">
                <div class="row text-center" style="display:flex; justify-content: center;" >
                    <h5>Desimir Dimović 627/2019</h5>
                </div>
                <div class="row text-center" style="display:flex; justify-content: center;">
                    <h5>Janko Štrkalj 618/2019</h5>
                </div>
                <div class="row text-center" style="display:flex; justify-content: center;">
                    <h5>Marko Živanović /2019</h5>
                </div>
                <div class="row text-center" style="display:flex; justify-content: center;">
                    <h5>Marko Đokić 640/2019</h5>
                </div>
            </div>
        </div>
    </div>

@endsection