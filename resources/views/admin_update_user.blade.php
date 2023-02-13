@extends('layouts.admin')

@section('content')
<form action="/admin/users/updating/{{ $user->id }}" method="post">
    @csrf
        <div class="form m-5">
            <div class="container-fluid booking mt-5 pb-5" style="width: 80%">
                <div class="card-header bg-primary text-center mx-auto">
                    <h1 class="text-white m-0">Update user</h1>
                </div>

                <div class="card-body rounded-bottom bg-white p-5">
                    <div class="bg-light shadow" style="padding: 30px;">
                        <div class="row align-items-center" style="min-height: 60px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-md-0">
                                            <label for="name" class="d-block"><b>Name</b></label>
                                            <input type="text" name="name" value="{{$user->name}}" class="form-control p-3" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-md-0">
                                            <label for="username" class="d-block"><b>Username</b></label>
                                            <input type="text" name="username" value="{{$user->username}}" class="form-control p-3" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-md-0">
                                            <label for="password" class="d-block"><b>Reset Password:</b></label>
                                            <input type="password" name="password" class="form-control p-3" placeholder="Reset password" required="required">
                                            @error('password')
                                                <p class="text-2">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12 text-center">
                                    <div class="col-md-12">
                                        <div class="mt-3">
                                            <div class="mr-2">Is admin??</div>
                                            <input type="radio" id="1" name="is_admin" value="1">
                                            <label for="1" class="">1</label>
                                            <input type="radio" id="0" name="is_admin" value="0" checked>
                                            <label for="0">0</label>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-12">
                            <div class="row mt-2 text-center">
                                <div class="col-md-12" >
                                    <div class="text-center mt-5"><button type="submit" class="btn btn-primary" style="width: 50%">Update!</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
@endsection