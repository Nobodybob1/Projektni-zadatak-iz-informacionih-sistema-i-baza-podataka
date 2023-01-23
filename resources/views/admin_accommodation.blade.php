@extends('layouts.admin')

@section('content')
    <div class="row text-center ms-5">
        <h1 class="text-center col-md-6">All Accommodations</h1>
        <a href="/create/accommodation" class="btn btn-primary col-md-3 text-white pt-3"> Add Accommodation</a>
    </div>
    <hr>
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                @unless ($accommodations->isEmpty())
                        @foreach ($accommodations as $item)
                            <div class="row">
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
                            </div>
                            @endforeach
                    @endunless
@endsection