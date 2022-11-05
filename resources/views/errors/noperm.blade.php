@extends('layouts.adm')
@section('title', 'Error Page')
@section('content')
    <h1>NO PERMISSION</h1>
    <h2><a href="{{route('adm.users.index')}}">GO BACK</a></h2>
@endsection
