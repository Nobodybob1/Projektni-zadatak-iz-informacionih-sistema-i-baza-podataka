@extends('layouts.admin')



@section('content')

    
    <div class="row text-center ms-5">
        <h1 class="text-center col-md-6">All staffs</h1>
        <a href="/register" class="btn btn-primary col-md-3 text-white pt-3"> Add Staff</a>
    </div>
    <hr>

        <div class="container-fluid py-5 ">
            <div class="container pt-5 pb-3">
                <div class="row">
                    @unless ($users->isEmpty())
                        @foreach ($users as $user)
                            <div class="col-md-4 mb-4 bg-light shadow">
                                <div class="package-item bg-white mb-2">
                                    <div class="position-relative d-inline">
                                        <div style="position: relative">
                                            <form action="/admin/delete/user" method="POST" id="myform">
                                                @csrf
                                                
                                                <button name="delete" value="{{$user->id}}" type="submit" class="btn btn-danger mt-3 mr-2" style="position: absolute; top:0px;right:0px">X</button>
                                            </form>
                                        </div>
                                    </div>
                                    <form action="/admin/users/update/{{$user->id}}" method="post">
                                        @csrf
                                            <div class="p-3">
                                                <div class="">
                                                Name: {{ $user->name }}
                                                </div>
                                                <div class="">
                                                    Username: {{ $user->username }}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="text-center mt-3 ">
                                                <button type="submit" class="btn btn-primary mb-3">Update Staff</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                    @endforeach
                    
                    @endunless
            </div>
        </div>
    </div>
@endsection