@extends('layouts.app')
@section('content')
    <form action="{{route('cars.storeMes')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="message">Write an updated message:</label>
            <input type="text" class="form-control @error('message') is-invalid @enderror" name="message">
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">GO</button>
        </div>
    </form>
@endsection
