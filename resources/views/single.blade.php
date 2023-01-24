@extends('layouts.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">{{$offer->name}}</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="/">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">{{$offer->name}}</p>
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
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{asset('img/blog-1.jpg')}}" alt="">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-n1">{{$offer->format_date($offer->start_date)[0]}}</h6>
                                    <h6 class="font-weight-bold mb-n1">{{$offer->format_date($offer->start_date)[1]}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <h2 class="mb-3">{{$offer->name}}</h2>
                            <h4><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$offer->location_city.', '.$offer->location_state.', '.$offer->location_continent}}</h4>
                            <h4><i class="fa fa-bus text-primary mr-2"></i>{{$offer->transport_type.', '.$offer->transport_price.' e '}}</h4>
                            <h3 class="mb-3 text-center">Details</h3>
                            
                            @unless ($accommodation->isEmpty())
                            <h4>Description of accommodations:</h4>
                                @foreach ($accommodation as $item)
                                    <h5>{{$item->name}}</h5>
                                    {{-- <p>{{'Accommodation name: '. $item->name}}</p> --}}
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
                                    <hr>
                                @endforeach
                                
                                    
                            @endunless
                            <h4 class="mb-3">Detailed program of travel:</h4>
                            <p>{{$offer->program}}</p>
                                    <h4 class="mb-3">Note about this offer:</h4>
                                    <p>{{$offer->note}}</p>
                        </div>
                    </div>
                    <!-- Blog Detail End -->
                </div>
    
                {{-- <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio  da se doda kalendar koji pokazuje trajanje ponude -->
                    <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                        <img src="{{ asset('img/user.jpg') }}" class="img-fluid mx-auto mb-3" style="width: 100px;">
                        <h3 class="text-primary mb-3">John Doe</h3>
                        <p>Conset elitr erat vero dolor ipsum et diam, eos dolor lorem, ipsum sit no ut est  ipsum erat kasd amet elitr</p>
                        <div class="d-flex justify-content-center">
                            <a class="text-primary px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-primary px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-primary px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-primary px-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-primary px-2" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div> --}}

                    <!-- Recent Post -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Recent Post</h4>
                        @unless ($latest->isEmpty())
                            @foreach ($latest as $last)
                            <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="/single/{{$last->id}}">
                                <img class="img-fluid" src="{{asset('img/blog-100x100.jpg')}}" alt="">
                                <div class="pl-3">
                                    <h6 class="m-1">{{$last->name}}</h6>
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
    <!-- Napraviti da bude responsive trebalo bi da sad jeste samo dugme malo nekad ludi -->
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
                                        <input type="text" name="first_name" class="form-control p-3"  placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="text" name="last_name" class="form-control p-3" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <!-- Popraviti: postoji input za broj telefona izgleda da hvata sam po imenu  -->
                                        <input type="text" name="phone_no" class="form-control p-3" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="email" name="email" class="form-control p-3" placeholder="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="text" name="payment_type" class="form-control p-3" placeholder="Payment Type">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="number" name="num_adults" class="form-control p-3" placeholder="Number of Adults">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="number" name="num_child" class="form-control p-3" placeholder="Number of Kids">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0" >
                                        <textarea name="note" id="note" placeholder="Notes..." class="form-control p-3" style="height: 150px" ></textarea>{{--style="width:203px;height:150px;"--}}
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
@endsection