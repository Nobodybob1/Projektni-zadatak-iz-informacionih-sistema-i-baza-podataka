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
            justify-content: center;
            text-align: center;
          }
          .header {
            background-color: #7AB730;
            border-bottom: 1px solid #7AB730;
            padding: 20px;
            
            display: flex;
            align-items: center;
            
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            justify-content: center;

        
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

            <div >
                <p>Dear {{$data[0]->first_name}} {{$data[0]->last_name}}, <br> we are glad to tell you that your reservation for {{$data[1]->name}} is approved!</p>
                <hr>
                <p>Have a nice trip!</p>
            </div>

            
    </div>
</div>


</html>