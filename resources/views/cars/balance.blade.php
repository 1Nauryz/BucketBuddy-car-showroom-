@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('balance.store')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="balance">How much do you want to replenish the balance:</label>
                    <input type="text" class="form-control @error('model') is-invalid @enderror" name="balance">
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                <button type="submit" class="btn btn-success">GO</button>
        </form>
    </div>
@endsection
