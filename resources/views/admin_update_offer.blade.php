@extends('layouts.admin')

@section('content')
<form action="/admin/updating/{{ $offer->id }}" method="post">
    @csrf
        <div class="form m-5">
            <div class="container-fluid booking mt-5 pb-5" style="width: 80%">
                <div class="card-header bg-primary text-center mx-auto">
                    <h1 class="text-white m-0">Update offer</h1>
                </div>

                <div class="card-body rounded-bottom bg-white p-5">
                    <div class="bg-light shadow" style="padding: 30px;">
                        <div class="row align-items-center" style="min-height: 60px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="start_date" class="d-block"><b>Name</b></label>
                                            <input type="text" name="name" value="{{$offer->name}}" class="form-control p-3"  placeholder="Hotel's name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="start_date" class="d-block"><b>Start Date</b></label>
                                            <input type="date" name="start_date" value="{{$offer->start_date}}" class="form-control p-3" placeholder="Start date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="end_date" class="d-block"><b>End Date</b></label>
                                            <input type="date" name="end_date" value="{{$offer->end_date}}" class="form-control p-3" placeholder="End date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="location_city" class="d-block"><b>City</b></label>
                                            <input type="text" name="location_city" value="{{$offer->location_city}}" class="form-control p-3" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="location_state" class="d-block"><b>State</b></label>
                                            <input type="text" name="location_state" value="{{$offer->location_state}}" class="form-control p-3" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="location_continent" class="d-block"><b>Continent</b></label>
                                            <input type="text" name="location_continent" value="{{$offer->location_continent}}" class="form-control p-3" placeholder="Continent">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="transport_type" class="d-block"><b>Transport type</b></label>
                                            <input type="text" name="transport_type" value="{{$offer->transport_type}}" class="form-control p-3" placeholder="Transport by:">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="transport_price" class="d-block"><b>Transport Price</b></label>
                                            <input type="text" name="transport_price" value="{{$offer->transport_price}}" class="form-control p-3" placeholder="Transport Price per person">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="price_adult" class="d-block"><b>Price for adults</b></label>
                                            <input type="text" name="price_adult" value="{{$offer->price_adult}}" class="form-control p-3" placeholder="Price per adult">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="price_child" class="d-block"><b>Price for childrens</b></label>
                                            <input type="text" name="price_child" value="{{$offer->price_child}}" class="form-control p-3" placeholder="Price per child">
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="mb-3 mb-md-0">
                                            <label for="program" class="d-block"><b>Program</b></label>
                                            <textarea type="text" name="program" class="form-control p-3" placeholder="Program for each day">{{$offer->program}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 mb-md-0">
                                            <label for="note" class="d-block"><b>Note</b></label>
                                            <textarea type="text" name="note" class="form-control p-3" placeholder="Note about this trip">{{$offer->note}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-6" >
                                        <div class="text-center mt-5"><button type="submit" class="btn btn-primary" style="width: 50%">Update!</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
@endsection