@extends('layouts.admin')

@section('content')


    <form action="/creating/offer" method="post" class="mt-5">
        @csrf
            <div class="container-fluid booking mt-5 pb-5" style="width: 80%">
                <div class="card-header bg-primary text-center mx-auto">
                    <h1 class="text-white m-0">Create offer</h1>
                </div>

                <div class="card-body rounded-bottom bg-white p-5">
                    <div class="bg-light shadow" style="padding: 30px;">
                        <div class="row align-items-center" style="min-height: 60px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="start_date" class="d-block"><b>Name</b></label>
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control p-3"  placeholder="Offer's name">
                                            @error('name')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="start_date" class="d-block"><b>Start Date</b></label>
                                            <input type="date"  name="start_date" min="{{date('Y-m-d')}}" value="{{old('start_date')}}" class="start_date form-control p-3" placeholder="Start date">
                                            @error('start_date')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="end_date" class="d-block"><b>End Date</b></label>
                                            <input type="date"  name="end_date" min="{{date('Y-m-d')}}" value="{{old('end_date')}}" class="end_date form-control p-3" placeholder="End date">
                                            @error('end_date')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="location_city" class="d-block"><b>City</b></label>
                                            <input type="text" name="location_city" value="{{old('location_city')}}" class="form-control p-3" placeholder="City">
                                            @error('location_city')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="location_state" class="d-block"><b>State</b></label>
                                            <input type="text" name="location_state" value="{{old('location_state')}}" class="form-control p-3" placeholder="State">
                                            @error('location_state')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="location_continent" class="d-block"><b>Continent</b></label>
                                            <input type="text" name="location_continent" value="{{old('location_continent')}}" class="form-control p-3" placeholder="Continent">
                                            @error('location_continent')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="days" class="d-block"><b>Days per Location</b></label>
                                            <input type="text" name="days" value="{{old('days')}}" class="form-control p-3" placeholder="Days per Location">
                                            @error('days')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="transport_type" class="d-block"><b>Transport type</b></label>
                                            <input type="text" name="transport_type" value="{{old('transport_type')}}" class="form-control p-3" placeholder="Transport by:">
                                            @error('transport_type')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="transport_price" class="d-block"><b>Transport Price</b></label>
                                            <input type="text" name="transport_price" value="{{old('transport_price')}}" class="form-control p-3" placeholder="Transport Price per person">
                                            @error('transport_price')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="price_adult" class="d-block"><b>Price for adults</b></label>
                                            <input type="text" name="price_adult" value="{{old('price_adult')}}" class="form-control p-3" placeholder="Price per adult">
                                            @error('price_adult')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <label for="price_child" class="d-block"><b>Price for childrens</b></label>
                                            <input type="text" name="price_child" value="{{old('price_child')}}" class="form-control p-3" placeholder="Price per child">
                                            @error('price_child')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="mb-3 mb-md-0">
                                            <label for="program" class="d-block"><b>Program</b></label>
                                            <textarea type="text" name="program" class="form-control p-3" placeholder="Program for each day">{{old('program')}}</textarea>
                                            @error('program')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 mb-md-0">
                                            <label for="note" class="d-block"><b>Note</b></label>
                                            <textarea type="text" name="note"  class="form-control p-3" placeholder="Note about this trip">{{old('note')}}</textarea>
                                            @error('note')
                                                <p class="text-2 text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-6" >
                                        <div class="text-center mt-5"><button type="submit" class="btn btn-primary" style="width: 50%">Create!</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
    
    </form>


<div class="col-md-12">
    <h2 class="col-md-12 text-center">
        Notes:
    </h2>
    <h4 class="col-md-12 text-center">
        Rules about creating an offer    
    </h4>   
    <div class="col-md-12 text-center">
        Name must be in format (City Month Year .something)
    </div>
    <div class="col-md-12 text-center">
        Location City must have , at the end (Example: Kragujevac,)
    </div>
    <div class="col-md-12 text-center">
        Location State must have , at the end (Example: Serbia,)
    </div> 
    <div class="col-md-12 text-center">
        Location Continent must have , at the end (Example: Europe,)
    </div>
    <div class="col-md-12 text-center">
        Days per location must have , at the end (Example: 6, 4,). Days are in order by locations.
    </div>      
</div>    

<script src="{{ asset('js/dates.js') }}"></script>
@endsection