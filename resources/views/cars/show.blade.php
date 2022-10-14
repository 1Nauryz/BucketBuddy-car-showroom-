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
<div><a href="{{route('cars.create')}}">Add your car</a></div>
<p>{{$car->image}}</p>
<p>{{$car->model}}</p>
<h2>{{$car->city}}</h2>
<h3>{{$car->volume}}</h3>
<h4>{{$car->mileage}}</h4>
<h5>{{$car->transmission}}</h5>
<a href="{{route('cars.edit', $car->id)}}">Edit</a>
</body>
</html>
@endsection

