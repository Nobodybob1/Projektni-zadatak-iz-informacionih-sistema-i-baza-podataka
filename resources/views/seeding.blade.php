@extends('layouts.app')

@section('content')

    <h3 class = "text-center">Preparing data, please wait :)</h3>
    <img class="col-md-6 text-center mx-auto d-flex justify-content-center" src="{{asset('seeding.gif')}}" alt="">
   

    <script>
        function checkSeedingStatus() {
          // make an AJAX request to check the seeding status
          $.ajax({
            url: '/check_seeding', // where is mapped function that returns data
            success: function(data) {
              console.log(data);
              if (!data) {
                // if seeding is complete, redirect to the home page
                window.location.href = '/';
              }
            }
          });
        }
        // start checking the seeding status every 2 seconds
        setInterval(checkSeedingStatus, 3000);
      </script>


@endsection