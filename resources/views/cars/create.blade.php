@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{route('cars.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="model">Car model:</label>
        <input type="text" class="form-control" name="model">
    </div>
    <div class="form-group">
        <label for="city">City:</label>
        <input type="text" class="form-control" name="city">
    </div>
    <div class="form-group">
        <label for="city">Volume:</label>
        <input type="text" class="form-control" name="volume">
    </div>
    <div class="form-group">
        <label for="city">Mileage:</label>
        <input type="text" class="form-control" name="mileage">
    </div>
    <div class="form-group">
        <label for="city">Transmission:</label>
        <input type="text" class="form-control" name="transmission">
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" class="form-control" name="price">
    </div>
    <div class="form-group">
        <label for="text">Phone:</label>
        <input type="text" class="form-control" name="phone">
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control" @error('image') is-invalid @enderror id="imageInput" name="image">
        @error('image')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="brand">Brand:</label>
        <select name="category_id" id="">
            @foreach($categories as $cat)
                <option value="{{$cat->id}}">
                    {{$cat->name}}
                </option>
            @endforeach
        </select>
    </div>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection

