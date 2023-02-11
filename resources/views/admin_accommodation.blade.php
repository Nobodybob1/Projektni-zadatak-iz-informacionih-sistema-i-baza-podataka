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
                                        <div class="col-md-3">
                                            <h5><a href="/single_accommodation/{{$item->id}}" style="color:black">{{'Accommodation name: '. $item->name}}</a></h5>
                                            <p>{{'Number of beds in room: '. $item->room_bed}}</p>
                                        </div>
                                        <div class="col-md-3">
                                            @php
                                                $i = 0
                                            @endphp
                                            {{'Rating: '}}
                                            @while ($i < $item->rating)
                                                <i class="fa fa-star text-primary mr-2"></i>
                                                    @php
                                                        $i = $i + 1
                                                    @endphp
                                            @endwhile
                                        </div>
                                        <div class="col-md-3">
                                            <p>Additional details:</p>  
                                            <p>
                                                <i class="fa fa-wifi text-primary mr-2 "></i>{{$item->internet == '1' ? 'Yes' : 'No'}}
                                                <i class="fa fa-tv text-primary mr-2 ml-2"></i>{{$item->tv == 1 ? 'Yes' : 'No'}}
                                                <i class="fa fa-snowflake text-primary mr-2 ml-2"></i>{{$item->ac == 1 ? 'Yes' : 'No'}}
                                                <i class="fa fa-ice-cream text-primary mr-2 ml-2"></i>{{$item->fridge == 1 ? 'Yes' : 'No'}}
                                            </p>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <form action="/accommodation/delete" method="POST">@csrf<button class="btn btn-danger" name="id" value="{{$item->id}}">Delete!</button></form>
                                        </div>
                                        
                                    </div>
                                    <hr>
                                @endforeach
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    {{$accommodations->links()}}
                                    
                                </div>
                            @endunless
                        </div>
                    </div>
                    
@endsection