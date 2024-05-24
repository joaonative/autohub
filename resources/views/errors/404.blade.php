@extends('layout')

@section('title', '404 Not Found')
@section('content')
    <div class='flex justify-center'>    <a class='btn' href="{{route('home')}}">Page Not Found, Return to Home</a>
</div>
@endsection