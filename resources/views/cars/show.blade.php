@extends('layouts.app')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">{{$car->model}}</h1>
        <p class="lead">{{$car->city}}</p>
        <p class="lead">{{$car->volume}}</p>
        <p class="lead">{{$car->mileage}}</p>
        <p class="lead">{{$car->transmission}}</p>
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
@endsection

