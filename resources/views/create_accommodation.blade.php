@extends('layouts.admin')

@section('content')


    <form action="/creating/accommodation" method="post" class="mt-5">
        @csrf
            <div class="container-fluid booking mt-5 pb-5" style="width: 80%">
                <div class="card-header bg-primary text-center mx-auto">
                    <h1 class="text-white m-0">Create accommodation</h1>
                </div>

                <div class="card-body rounded-bottom bg-white p-5">
                    <div class="bg-light shadow" style="padding: 30px;">
                        <div class="row align-items-center" style="min-height: 60px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-md-0">
                                            <label for="name" class="d-block"><b>Name</b></label>
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control p-3"  placeholder="Hotel's name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-md-0">
                                            <label for="room_bed" class="d-block"><b>Room bed</b></label>
                                            <input type="text" name="room_bed" value="{{old('room_bed')}}" class="form-control p-3" placeholder="Number of beds in room">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-md-0">
                                            <label for="rating" class="d-block"><b>Rating</b></label>
                                            <select name="rating" class="custom-select">
                                                <option value="1" default>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            {{-- <input type="number" name="rating" value="{{old('rating')}}" class="form-control p-3" placeholder="Rating"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <p>Internet:</p>
                                            <input type="radio" name="internet" value="1">
                                            <label for="internet" class="d-inline mr-3">Yes</label>
                                            <input type="radio" name="internet" value="0">
                                            <label for="internet" class="d-inline">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <p>TV:</p>
                                            <input type="radio" name="tv" value="1">
                                            <label for="tv" class="d-inline mr-3">Yes</label>
                                            <input type="radio" name="tv" value="0">
                                            <label for="tv" class="d-inline">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <p>AC:</p>
                                            <input type="radio" name="ac" value="1">
                                            <label for="ac" class="d-inline mr-3">Yes</label>
                                            <input type="radio" name="ac" value="0">
                                            <label for="ac" class="d-inline">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <p>Fridge:</p>
                                            <input type="radio" name="fridge" value="1">
                                            <label for="fridge" class="d-inline mr-3">Yes</label>
                                            <input type="radio" name="fridge" value="0">
                                            <label for="fridge" class="d-inline">No</label>
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
@endsection