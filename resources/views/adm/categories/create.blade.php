@extends('layouts.adm')
@section('title', 'Categories Page')
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
    <h3>CATEGORIES PAGE</h3>
    <form action="{{route('adm.categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="city">Name:</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="city">Code:</label>
            <input type="text" class="form-control" name="code">
        </div>
        <div class="form-group">
            <label for="city">Image:</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image">
        </div>
        @error('image')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
