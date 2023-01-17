@extends('layouts.admin')

@section('content')
<h1 class="text-center">All reservations</h1>

<hr>
@unless ($reservations->isEmpty())
    @foreach ($reservations as $reservation)
        <div class="container-fluid mt-5 pb-5">
            <div class="container pb-5">
                <div class="bg-light shadow" style="padding: 30px;">
                    <div class="row align-items-center" style="min-height: 60px;">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="text" name="first_name" value="{{ $reservation->first_name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="text" name="last_name" value="{{ $reservation->last_name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <!-- Popraviti: postoji input za broj telefona -->
                                        <input type="text" name="phone_no" value="{{ $reservation->phone_no }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="email" name="email" value="{{ $reservation->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="text" name="payment_type" value="{{ $reservation->payment_type }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="number" name="num_adults" value="{{ $reservation->num_adults }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="number" name="num_child" value="{{ $reservation->num_child }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <div class="note">{{ $reservation->note }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="mt-3">Informations about offer:</h6>

                    <p>Accommodation name: {{ $reservation->offer->name }}</p>
                    <p>Transport price: {{ $reservation->offer->transport_price ." e"}}</p>
                    <p>Transport type: {{ $reservation->offer->transport_type}}</p>
                    <p>Price for adults: {{ $reservation->offer->price_adult ." e"}}</p>
                    <p>Price for kids: {{ $reservation->offer->price_child ." e"}}</p>
                    <p>Start Date: {{ $reservation->offer->start_date }}</p>
                    <p>End Date: {{ $reservation->offer->end_date }}</p>
                    <p>City: {{ $reservation->offer->location_city }}</p>
                    <p>State: {{ $reservation->offer->location_state }}</p>
                    <p>Continent: {{ $reservation->offer->location_continent }}</p>
                    <p><strong>Accepted?: {{ ($reservation->is_approved == '1') ? 'Yes' : 'No' }}</strong></p>
                </div>
            </div>
        </div>
    @endforeach
@endunless
@endsection