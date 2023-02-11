@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Admin</h1>

    <hr>
    <h3 class="text-center mt-5">Reservations on pending:</h3>
    @unless($reservations->isEmpty())
    
        @foreach ($reservations as $reservation)
        <form action="/admin/reserve/{{$reservation->id}}" method="post">
            @csrf
            <div class="container-fluid mt-5 pb-5">
                <div class="container pb-5">
                    <div class="bg-light shadow" style="padding: 30px;">
                        
                        <div class="row align-items-center" style="min-height: 60px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="first_name"><b>First name</b></label>
                                            <input type="text" name="first_name" value="{{ $reservation->first_name }}" class="form-control p-3" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="last_name"><b>Last name</b></label>
                                            <input type="text" name="last_name" value="{{ $reservation->last_name }}" class="form-control p-3" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="phone_no"><b>Phone number</b></label>
                                            <input type="text" name="phone_no" value="{{ $reservation->phone_no }}" class="form-control p-3" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="email"><b>Email</b></label>
                                            <input type="email" name="email" value="{{ $reservation->email }}" class="form-control p-3" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="payment_type"><b>Payment type</b></label>
                                            <input type="text" name="payment_type" value="{{ $reservation->payment_type }}" class="form-control p-3" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="num_adults"><b>Number of adults</b></label>
                                            <input type="number" name="num_adults" value="{{ $reservation->num_adults }}" class="form-control p-3" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="num_child"><b>Number of children</b></label>
                                            <input type="number" name="num_child" value="{{ $reservation->num_child }}" class="form-control p-3" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label><b>Note</b></label>
                                            <div class="note form-control p-3" style="background-color: #e9ecef">{{ $reservation->note }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row-md-12 mt-3">
                            <button class="btn btn-primary btn-block" type="submit">Accept Reservation</button>
                        </div>
                        <h4 class="mt-3 mb-3 text-center">Informations about offer:</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Accommodation name: {{ $reservation->offer->name }}</p>
                                <p>Transport price: {{ $reservation->offer->transport_price ." e" }}</p>
                                <p>Transport type: {{ $reservation->offer->transport_type }}</p>
                                <p>Price for adults: {{ $reservation->offer->price_adult ." e"}}</p>
                                <p>Price for kids: {{ $reservation->offer->price_child  ." e"}}</p>
                            </div>
                            <div class="col-md-6">
                                <p>Start Date: {{ $reservation->offer->date_str_to_nice($reservation->offer->start_date) }}</p>
                                <p>End Date: {{ $reservation->offer->date_str_to_nice($reservation->offer->end_date) }}</p>
                                <p>City: {{ $reservation->offer->location_city }}</p>
                                <p>State: {{ $reservation->offer->location_state }}</p>
                                <p>Continent: {{ $reservation->offer->location_continent }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endforeach
    @endunless
@endsection