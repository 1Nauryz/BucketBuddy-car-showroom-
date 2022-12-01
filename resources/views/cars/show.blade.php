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
<header>
    <div class="masthead-content">
        <div>
            <img src="{{asset($car->image)}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="600" height="250" loading="lazy">
        </div>
    </div>
</header>
<section>
    <div class="container px-5">

        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <div class="p-5"><img class="img-fluid rounded-circle" src="{{asset('img/02.jpg')}}" alt="..." /></div>
            </div>

            <div class="col-lg-6">
                <div class="p-5">
                    <h2 class="display-4">{{$car->model}}</h2>
                    <p>
                    City: {{$car->city}} <br>
                    Engine volume: {{$car->volume}} <br>
                    Mileage: {{$car->mileage}} <br>
                    Transmission: {{$car->transmission}} <br>
                    Price: {{$car->price}} <br>
                    Phone number: {{$car->phone}} <br></p>
                    @if($avgRating != 0)
                        <h4 style="color: #e6cbb8">Average rating: {{$avgRating}}</h4>
                    @endif
                    @auth
                        <hr>
                        <a href="{{route('cars.showmessage', $car->id)}}" class="btn btn-outline-info mt-2 text-center">Message</a>

                        <hr>
                    <form action="{{route('cars.rate', $car->id)}}" method="post">
                        @csrf
                        <select name="rating">
                        @for($i=0; $i<=5; $i++)
                            <option {{$myRating == $i ? 'selected' : ''}} value="{{$i}}">
                                {{ $i==0 ? 'Not rated' : $i }}
                            </option>
                        @endfor
                        </select>
                        <br><button type="submit" style="border-left: #0A38F5">Rate</button>
                    </form>
                        <form action="{{route('cars.unrate', $car->id)}}" method="post">
                            @csrf
                            <button type="submit" style="border-left: #0A38F5">Unrate</button>
                        </form>
                        <hr>
                    @endauth
                @can('delete', $car)
                        <hr class="my-4">
                        <form action="{{route('cars.destroy', $car->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <p class="lead">
                                <button type="submit" class="btn btn-primary btn-lg">Delete</button>
                            </p>
                        </form>
                        <hr>
                    @endcan
                    @can('create', \App\Models\Comment::class)
                        <form action="{{route('comments.store')}}" method="post">
                            @csrf
                            <textarea name="content" rows="3"></textarea>
                            <input type="hidden" name="car_id" value="{{$car->id}}"> <br>
                            <button type="submit" class="btn btn-secondary btn-lg">Save comment</button>
                        </form>
                    @endcan
                    <hr>
                    @foreach($car->comments as $com)
                        <p>{{$com->content}}</p>
                        <p>Author: {{$com->user->name}}</p>
                        @can('delete', $com)
                            <form action="{{route('comments.destroy', $com->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete comment</button>
                            </form>
                        @endcan
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<section>

</section>
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core theme JS-->
<script src="{{asset('js/scripts.js')}}"></script>
@endsection

