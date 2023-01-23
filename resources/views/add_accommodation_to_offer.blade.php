@extends('layouts.admin')

@section('content')
    <h2 class="text-center">{{ $offer->name }}</h2>

    <h6 class="text-center">Please select accommodations for this offer:</h6>

    <form action="/offerAndAccommodation" method="post">
        @csrf
        {{-- OVO OBAVEZNO BOLJE UBICE NAS PANTELIC --}}
        <input type="hidden" name="id" value="{{ $offer->id }}">

        @unless ($accommodations->isEmpty())
            @foreach ($accommodations as $item)
            <div class="row ml-5">
                <input type="checkbox" id="{{ $item->name }}" name="{{ $item->name }}" value="{{ $item->id }}">
                <label for="{{ $item->name }}">
                    <div>{{'Accommodation name: '. $item->name}}</div>
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
                </label>
            @endforeach
        @endunless
        <button class="btn btn-success" type="submit">Ok</button>
    </form>
@endsection