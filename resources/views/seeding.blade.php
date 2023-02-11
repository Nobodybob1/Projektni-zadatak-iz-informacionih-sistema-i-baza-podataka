@extends('layouts.app')

@section('content')

    <img class="col-md-12 text-center" src="{{asset('akirambow-spoiled-rabbit.gif')}}" alt="">
    {{dd(DB::table('offers')->max('id'));}}
    @while ({{DB::table('offers')->max('id')<550}})
        @continue
        
    @endwhile
    {{return redirect('/')}}
    


@endsection