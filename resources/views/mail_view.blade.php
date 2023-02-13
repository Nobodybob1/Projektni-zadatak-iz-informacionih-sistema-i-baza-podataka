<html>
    <head>
        <style>
          .container {
            border: 1px solid  black;
            border-radius: 25px;
          }
          h1 {
            color: rgb(255, 255, 255);
            margin: 0;
            text-align: center;
          }
          .header {
            background-color: #7AB730;
            border-bottom: 1px solid #7AB730;
            padding: 20px;
            text-align: center;
            color: rgb(255, 255, 255);
            margin: 0;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
         }
         .body {
            background-color: white;
            padding: 20px;
            border-radius: 25px;
         }

        </style>
      </head>

  <div class="container">
      <div class="header">
          <h1>Reservation approved!</h1>
      </div>
      <div class="body">
              <div>
                  <p>Dear {{$data[0]->first_name}} {{$data[0]->last_name}}, 
                  <br> we are glad to tell you that your reservation for {{$data[1]->name}} is approved!
                  <br><strong>{{$data[0]->note}}</strong>
                  <br>
                    Your reservation number is: {{rand(100000,999999)}}
                  </p>
                  <hr>
                  <p>Have a nice trip!</p>
              </div>
      </div>
  </div>


</html>