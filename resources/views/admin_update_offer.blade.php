@extends('layouts.admin')

@section('content')
<form action="/admin/updating/{{ $offer->id }}" method="post">
    @csrf
        <div class = "form m-5">
            <div class="row">
                <div class="form-item col-md-6 d-inline">
                    <label for="name" class="d-block"><b>Name</b></label>
                    <input
                        type="text"
                        name="name"
                        value="{{ $offer->name}}"
                    />
                    @error('name')
                    <p class="text-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-item col-md-6 d-inline">
                    <label for="transport_price" class="d-block"><b>Transport Price</b></label>
                    <input
                        type="number"
                        name="transport_price"
                        value="{{ $offer->transport_price}}"
                    />
                    @error('transport_price')
                    <p class="text-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="form-item col-md-4 d-inline">
                    <label for="transport_type" class="d-block"><b>Transport Type</b></label>
                    <input
                        type="text"
                        name="transport_type"
                        value="{{ $offer->transport_type}}"
                    />
                    @error('transport_type')
                    <p class="text-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-item col-md-4 d-inline">
                    <label for="price_adult" class="d-block"><b>Price for Adult</b></label>
                    <input
                        type="number"
                        name="price_adult"
                        value="{{ $offer->price_adult}}"
                    />
                    @error('price_adult')
                    <p class="text-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-item col-md-4 d-inline">
                    <label for="price_child" class="d-block"><b>Price for Kids</b></label>
                    <input
                        type="number"
                        name="price_child"
                        value="{{ $offer->price_child}}"
                    />
                    @error('price_child')
                    <p class="text-2">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-item col-md-6 d-inline">
                    <label for="start_date" class="d-block"><b>Start Date</b></label>
                    <input
                        type="date"
                        name="start_date"
                        value="{{ $offer->start_date}}"
                    />
                    @error('start_date')
                    <p class="text-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-item col-md-6 d-inline">
                    <label for="end_date" class="d-block"><b>End Date</b></label>
                    <input
                        type="date"
                        name="end_date"
                        value="{{ $offer->end_date }}"
                    />
                    @error('end_date')
                    <p class="form-control">{{$message}}</p>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="form-item col-md-4 d-inline">
                    <label for="location_city" class="d-block"><b>City</b></label>
                    <input
                        type="text"
                        name="location_city"
                        value="{{ $offer->location_city }}"
                    />
                    @error('location_city')
                    <p class="form-control">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-item col-md-4 d-inline">
                    <label for="location_state" class="d-block"><b>State</b></label>
                    <input
                        type="text"
                        name="location_state"
                        value="{{ $offer->location_state}}"
                    />
                    @error('location_state')
                    <p class="form-control">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-item col-md-4 d-inline">
                    <label for="location_continent" class="d-block"><b>Continent</b></label>
                    <input
                        type="text"
                        name="location_continent"
                        value="{{ $offer->location_continent }}"
                    />
                    @error('location_continent')
                    <p class="form-control">{{$message}}</p>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="form-item col-md-6 d-inline">
                    <label for="program" class="d-block"><b>Program</b></label>
                    {{-- Ne postoji value u textarea, namestiti --}}
                    <textarea
                        type="text"
                        name="program"
                        value="{{ $offer->program}}"
                    >
                    </textarea>
                    @error('program')
                    <p class="form-control">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-item col-md-6">
                    <label for="note" class="d-block"><b>Note</b></label>
                    {{-- Ne postoji value u textarea, namestiti --}}
                    <textarea
                        type="text"
                        name="note"
                        value="{{ $offer->note }}"
                    >
                    </textarea>
                    @error('note')
                    <p class="form-control">{{$message}}</p>
                    @enderror
                </div>
            </div>
            
            <div class="text-center mt-5"><button type="submit" class="btn btn-primary">Update!</button></div>
        </div>
</form>
@endsection