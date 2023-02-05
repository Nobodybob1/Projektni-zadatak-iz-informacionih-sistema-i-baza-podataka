@extends('layouts.admin')

@section('content')

    <h1 class="text-center mb-5">{{$item->name}}</h1>
<div class="col"> 
    {{-- bilo class= row nesto bagovao --}}
    <div class="col-md-3 mx-auto">
                
                
                <!-- Carousel Start -->
                @unless ($pictures->isEmpty())
                    <div class="container-fluid p-0">
                        <div id="header-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active text-center">
                                    <img class="img-thumbnail mx-auto" src="{{asset('accommodation_pics/'.$pictures[0]->img_path)}}" alt="Image" >
                                </div>
                            
                                
                    
                
                            @foreach ($pictures as $picture)
                                @if ($loop->first)
                                    @continue 
                                @endif
                                <div class="carousel-item text-center">
                                    <img class="img-thumbnail mx-auto" src="{{asset('accommodation_pics/'.$picture->img_path)}}" alt="Image">
                                    
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endunless
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        
    </div>
    <!-- Carousel End -->
                  

          
    
</div>
<div class="row">
    <div class="col-md-3 mx-auto">
    {{-- Janko: Kod mene je izgledalo ruzno pa sam promenio  --}}
    
        <div class="card">
            <div class="card-body">
                
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
</div>
<div class="row">
    <div class="col-md-3 mx-auto">
        {{-- Janko: Kod mene je izgledalo ruzno pa sam promenio  --}}
    
        <div class="card">
            <div class="card-body">
                <form  id="pic_form"action='/add_img_accommodation' enctype="multipart/form-data" method="post" class="">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <div>
                        <label for="image"><i class="fa fa-upload text-primary"></i> Add a picture:</label>
                        <input type="file" name="image" id="image" accept="image/*" class="image-input" style="display: none" >
                        <img id="preview" src="#" alt="Image Preview" style="display: none;" class="img-thumbnail">
                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                
                    <div class="mt-1">
                        <button id="pic_submit" class="btn btn-success" disabled>Submit!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection