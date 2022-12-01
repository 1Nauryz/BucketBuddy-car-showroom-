@extends('layouts.app')
@section('content')
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bucket Buddy</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/showb.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
    @if($car->user_id != \Illuminate\Support\Facades\Auth::user()->id)
        <p>Write Message</p>
        <form action="{{route('cars.message', $car->id)}}" method="post">
            @csrf
            <input name="message" class="form-control form-control-lg" type="text" placeholder="Write message" >
            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>
            <hr>
        </form>
    @endif
    @foreach($cars as $car)
        <p>
            Name: {{$car->name}} <br>
            Message: {{$car->pivot->message}} <br>

        </p>
    @endforeach
    </body>


    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core theme JS-->
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection

