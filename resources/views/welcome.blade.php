<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>When in Japan</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .img-fluid {
                max-width: 50% !important;
            }
            .lightslategrey{
              background-color: #d3d3d3;
            }
        </style>
    </head>
    <body>
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">When in Japan</a>
        </div>
      </nav>
      <!-- This could be a carousel -->
      <img src="https://images.pexels.com/photos/601174/pexels-photo-601174.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-fluid mx-auto d-block" alt="...">
      <div class="container-lg p-2">
        <div class="container">
          <div class="row justify-content-md-center">
            @foreach($currentWeather as $weather)
            <div class="col border border-dark m-1 p-1">
              <h5>{{strtoupper($weather['name'])}}</h5>
              <div class="row">
                <div class="col">
                  <img src="{{$weather['image']}}" class="rounded mx-auto d-block lightslategrey">
                </div>
                <div class="col">
                  <h6>{{strtoupper($weather['weather'][0]['description'])}}</h6>
                  <p>{{$weather['main']['temp']}} &#176;C</p>
                  <p>High {{$weather['main']['temp_max']}} &#176;C</p>
                  <p>Low {{$weather['main']['temp_min']}} &#176;C</p>
                </div>
              </div>
              <a href="{{route('cityDetails')}}/{{strtolower($weather['name'])}}">A glimpse of {{$weather['name']}}</a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </body>
</html>
