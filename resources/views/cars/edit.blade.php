@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shop</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="antialiased">
<a href="{{route('cars.index')}}">Go to Cars page</a>

<form action="{{route('cars.update',$car->id)}}" method="post">
    @csrf
    @method('PUT')
    Image: <input type="file" value="{{$car->image}}"> <br>
    Car model: <input type="text" name="model" value="{{$car->model}}"> <br>
    City: <input type="text" name="city" value="{{$car->city}}"> <br>
    Volume: <input type="text" name="volume" value="{{$car->volume}}"> <br>
    Mileage: <input type="text" name="mileage" value="{{$car->mileage}}"> <br>
    Transmission: <input type="text" name="transmission" value="{{$car->transmission}}"> <br>
    <button type="submit">Update car info</button>

</form>
</body>
</html>
@endsection

