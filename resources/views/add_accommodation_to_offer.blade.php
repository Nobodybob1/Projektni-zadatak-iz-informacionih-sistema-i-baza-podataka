@extends('layouts.admin')

@section('content')
    

    <div class="container">
        <h2 class="text-center">{{ $offer->name }}</h2>
    
        <h6 class="text-center">Please select accommodations for this offer:</h6>
    
        <form action="/offerAndAccommodation" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $offer->id }}">
    
            @unless ($accommodations->isEmpty())
                <div class="row">
                    @foreach ($accommodations as $item)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="{{ $item->name }}" name="{{ $item->name }}" value="{{ $item->id }}">
                                    <label class="form-check-label" for="{{ $item->name }}">
                                        {{'Accommodation name: '. $item->name}}
                                    </label>
                                </div>
                                <div>{{'Number of beds in room: '. $item->room_bed}}</div>
                                @php
                                    $i = 0
                                @endphp
                                <div>
                                    {{'Rating: '}}
                                    @while ($i < $item->rating)
                                    <i class="fa fa-star text-primary mr-2"></i>
                                        @php
                                            $i = $i + 1
                                        @endphp
                                    @endwhile
                                </div>
                                <div>Additional details:</div>  
                                <div><i class="fa fa-wifi text-primary mr-2 "></i>{{$item->internet == '1' ? 'Yes' : 'No'}}<i class="fa fa-tv text-primary mr-2 ml-2"></i>{{$item->tv == 1 ? 'Yes' : 'No'}}<i class="fa fa-snowflake text-primary mr-2 ml-2"></i>{{$item->ac == 1 ? 'Yes' : 'No'}}<i class="fa fa-ice-cream text-primary mr-2 ml-2"></i>{{$item->fridge == 1 ? 'Yes' : 'No'}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endunless
            
            {{-- <button class="btn btn-success d-flex d-sm-none position-fixed" style="bottom: 20px; right: 20px;">Finish creating!</button> --}}
            <button class="btn btn-success  position-fixed" style="right: 100px; bottom: 50px;">Finish creating!</button>
        </form>
    </div>
    
@endsection