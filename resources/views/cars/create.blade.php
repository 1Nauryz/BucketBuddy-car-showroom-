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

<form action="{{route('cars.store')}}" method="post">
    @csrf
    Image: <input type="file"> <br>
    Car model: <input type="text" name="model"> <br>
    City: <input type="text" name="city"> <br>
    Volume: <input type="text" name="volume"> <br>
    Mileage: <input type="text" name="mileage"> <br>
    Transmission: <input type="text" name="transmission"> <br>
    <button type="submit">Save car</button>

</form>
</body>
</html>
@endsection

