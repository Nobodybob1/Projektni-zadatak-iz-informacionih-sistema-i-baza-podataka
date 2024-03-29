@extends('layouts.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">{{$offer->transform_name($offer->name)}}</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="/">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">{{$offer->transform_name($offer->name)}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    @php      
                        $days_array = explode(",", $offer->days);
                        $cities_array = explode(",", $offer->location_city);
                        $result = "";
                        for($i=0;$i<count($days_array)-1;$i++){
                            
                            $result .= "Number of days in ". $cities_array[$i] . " - " . $days_array[$i]. "\n";
                            
                        }
                        
                        $result = nl2br($result);
                    @endphp
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{asset('cities_pics/'.$offer->img)}}" alt="">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-n1">{{$offer->format_date($offer->start_date)[0]}}</h6>
                                    <h6 class="font-weight-bold mb-n1">{{$offer->format_date($offer->start_date)[1]}}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white mb-3" style="padding: 30px;">
                            <h2 class="mb-3">{{$offer->transform_name($offer->name)}}</h2>
                            <h4 style="overflow-wrap: break-word; max-width: 100%;"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{!! $offer->transform_array($offer->location_city) ."<br>". $offer->transform_array($offer->location_state) ."<br>". $offer->transform_array($offer->location_continent) !!}</h4>
                            <h4><i class="fa fa-bus text-primary mr-2"></i>{{$offer->transport_type.', '.$offer->transport_price.' e '}}</h4>
                            <h5><i class="fa fa-calendar text-primary mr-2"></i>{{$offer->date_str_to_nice($offer->start_date). " - ". $offer->date_str_to_nice($offer->end_date) }}</h5>
                            <h3 class="mb-3 text-center">Details</h3>
                            <p>{!! $result !!}</p>
                            <hr>
                            <div class="mt-3 mb-3 mr-5">
                                <select id="accommodation-selector" class="custom-select px-4">
                                    @foreach ($accommodation as $item)
                                        <option value="{{$item->id}}" {{ $loop->first ? 'selected' : '' }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                            <div id="accommodation-details">
                                @foreach ($accommodation as $item)
                                    <div class="accommodation-item text-center" id="accommodation-{{$item->id}}" style="display:none;">
                                        <h5>{{$item->name}}</h5>
                                        <p>{{'Number of beds in room: '. $item->room_bed}}</p>
                                        @php
                                            $i = 0
                                        @endphp
                                        <p>
                                            {{'Rating: '}}
                                            @while ($i < $item->rating)
                                                <i class="fa fa-star text-primary mr-2"></i>
                                                @php
                                                    $i = $i + 1
                                                @endphp
                                            @endwhile
                                        </p>
                                        <p>Additional details:</p>  
                                        <p><i class="fa fa-wifi text-primary mr-2 "></i>{{$item->internet == '1' ? 'Yes' : 'No'}}<i class="fa fa-tv text-primary mr-2 ml-2"></i>{{$item->tv == 1 ? 'Yes' : 'No'}}<i class="fa fa-snowflake text-primary mr-2 ml-2"></i>{{$item->ac == 1 ? 'Yes' : 'No'}}<i class="fa fa-ice-cream text-primary mr-2 ml-2"></i>{{$item->fridge == 1 ? 'Yes' : 'No'}}</p>
                                        <div class="container-fluid p-0">
                                            <div class="col-md-6 mx-auto">
                                                @php
                                                     $pictures = $item->accommodationpictures()->get();
                                                @endphp
                                                @unless ($pictures->isEmpty())
                                                    <div class="container-fluid p-0">
                                                        <div id="header-carousel-{{$item->id}}" class="carousel slide" data-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active text-center">
                                                                    <img class="img-thumbnail mx-auto" src="{{asset('accommodation_pics/'.$pictures[0]->img_path)}}" alt="Image" >
                                                                </div>
                                                                @foreach ($pictures as $picture)
                                                                    @if ($loop->first) @continue @endif
                                                                    <div class="carousel-item text-center">
                                                                    <img class="img-thumbnail mx-auto" src="{{asset('accommodation_pics/'.$picture->img_path)}}" alt="Image">
                                                                    
                                                                    </div>
                                                                @endforeach
                                                             
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#header-carousel-{{$item->id}}" data-slide="prev">
                                                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                                            <span class="carousel-control-prev-icon mb-n2"></span>
                                                        </div>
                                                    </a>
                                                    <a class="carousel-control-next" href="#header-carousel-{{$item->id}}" data-slide="next">
                                                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                                            <span class="carousel-control-next-icon mb-n2"></span>
                                                        </div>
                                                    </a>
                                                @endunless
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                            
                            
                            <hr>
                            <h4 class="mb-3 text-center">Itinerary:</h4>
                            <p id="text" style="white-space: pre-line; display: block;">{{$offer->program}}</p>
                            <button id="toggleButton" class="btn btn-primary" style="border-radius: 10px">Expand</button>
                            <hr>
                            <h4 class="mb-3 text-center">Note about this offer:</h4>
                            <p>{{$offer->note}}</p>
                        </div>
                    </div>
                    <!-- Blog Detail End -->
                </div>
    
                
                    <!-- Recent Post -->
                    <div class="col-md-4 mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h4>
                        @unless ($latest->isEmpty())
                            @foreach ($latest as $last)
                            <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="/single/{{$last->id}}">
                                <img class="img-fluid p-1" src="{{asset('cities_pics/'.$last->img)}}" alt="Latest post" style="width: 40%">
                                <div class="pl-3">
                                    <h6 class="m-1">{{$last->transform_name($last->name)}}</h6>
                                    <small>{{$offer->date_str_to_nice($last->start_date)}}</small>
                                </div>
                            </a>
                            @endforeach
                            
                        @endunless
                    
                    </div>
    
                    <!-- Tag Cloud -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Booking Start -->
    <form action="/booking/{{ $offer->id }}">
        <div class="container-fluid booking mt-5 pb-5" style="width: 90%" >
            <div class="card-header bg-primary text-center mx-auto">
                <h1 class="text-white m-0">Booking This Offer?</h1>
            </div>
            <div class="card-body rounded-bottom bg-white p-5">
                <div class="bg-light shadow" style="padding: 30px;">
                    <div class="row align-items-center" style="min-height: 60px;">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="text" name="first_name" class="form-control p-3" value="{{old('first_name')}}"  placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="text" name="last_name" class="form-control p-3" value="{{old('last_name')}}" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="text" name="phone_no" class="form-control p-3" value="{{old('phone_no')}}" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="email" name="email" class="form-control p-3" value="{{old('email')}}" placeholder="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="text" name="payment_type" class="form-control p-3" value="{{old('payment_type')}}" placeholder="Payment Type">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="number" name="num_adults" class="form-control p-3" value="{{old('num_adults')}}" placeholder="Number of Adults">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="number" name="num_child" class="form-control p-3" value="{{old('num_child')}}" placeholder="Number of Kids">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0" >
                                        <textarea name="note" id="note" placeholder="Notes..."  class="form-control p-3" style="height: 150px" >{{old('note')}}</textarea>{{--style="width:203px;height:150px;"--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-block py-2" type="submit">Book this now!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Booking End -->

<script src="{{ asset('js/toggle.js') }}"></script>
@endsection