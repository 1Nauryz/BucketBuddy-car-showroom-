@extends('layouts.app')

@section('title', 'Show Fav')

@section('content')
    @foreach($cars as $car)
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{$car->image}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">{{$car->model}}</h1>
                    <p class="lead">City: {{$car->city}} <br>
                        Engine volume: {{$car->volume}} <br>
                        Mileage: {{$car->mileage}} <br>
                        Transmission: {{$car->transmission}} <br>
                        Price: {{$car->price}} <br>
                        Phone number: {{$car->phone}} <br>
                    </p>
                    <div>Author: {{$car->user->name}}</div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <form action="{{route('cars.favorites', $car->id)}}" method="post">
                            @csrf
                                <button type="submit" class="btn btn-outline-secondary btn-lg px-4">
    Delete from favorites
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
