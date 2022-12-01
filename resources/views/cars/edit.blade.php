@extends('layouts.app')
@section('content')
    <form action="{{route('cars.update', $cars->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="model">Car model:</label>
            <input type="text" class="form-control" name="model" value="{{$cars->model}}">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" name="city" value="{{$cars->city}}">
        </div>
        <div class="form-group">
            <label for="volume">Volume:</label>
            <input type="text" class="form-control" name="volume" value="{{$cars->volume}}">
        </div>
        <div class="form-group">
            <label for="mileage">Mileage:</label>
            <input type="text" class="form-control" name="mileage" value="{{$cars->mileage}}">
        </div>
        <div class="form-group">
            <label for="transmission">Transmission:</label>
            <input type="text" class="form-control" name="transmission" value="{{$cars->transmission}}">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" name="price" value="{{$cars->price}}">
        </div>
        <div class="form-group">
            <label for="text">Phone:</label>
            <input type="text" class="form-control" name="phone" value="{{$cars->phone}}">
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="text" class="form-control" name="image" value="{{$cars->image}}">
        </div>
        <div class="form-group">
            <label for="brand">Brand:</label>
            <select name="category_id" id="">
                @foreach($categories as $cat)
                    <option @if($cat->id == $cars->category_id) selected @endif value="{{$cat->id}}">
                        {{$cat->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Update info</button>
    </form>
@endsection

