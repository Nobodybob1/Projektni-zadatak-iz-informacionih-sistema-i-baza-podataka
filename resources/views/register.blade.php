@extends('layouts.admin')

@section('content')
    
    <div class="card border-0 mx-auto" style="width: 50%" >
        <div class="card-header bg-primary text-center p-4">
            <h1 class="text-white m-0">Register new staff</h1>
        </div>
        <div class="card-body rounded-bottom bg-white p-5">
            <form method="POST" action="/register_user">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control p-4" placeholder="Name" required="required" />
                    @error('name')
                      <p class="text-2">{{$message}}</p>
                     @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="username" value="{{old('username')}}" class="form-control p-4" placeholder="Username" required="required" />
                    @error('username')
                      <p class="text-2">{{$message}}</p>
                     @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" value="{{old('pass')}}" class="form-control p-4" placeholder="Password" required="required" />
                    @error('password')
                      <p class="text-2">{{$message}}</p>
                     @enderror
                </div>
                
                <div>
                    <button class="btn btn-primary btn-block py-3" type="submit">Register now</button>
                </div>
            </form>
        </div>
    </div>
@endsection