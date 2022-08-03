@extends('frontend.layouts.app')
@section('content')
@foreach ($reservation as $artRes)
        <div class="card">
            <img src="img.jpg" alt="John" style="width:80%">
            <h1>{{ $artRes->name }}</h1>
            <p class="title">CEO & Founder, Example</p>
            <p>{{ $artRes->lastname }}</p>
            <p>{{ $artRes->lastname }}</p>
            <a href="#"><i class="fa fa-dribbble"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a> 
            <a href="#"><i class="fa fa-linkedin"></i></a> 
            <a href="#"><i class="fa fa-facebook"></i></a> 
            <p><button>Contact</button></p>
        </div>
        @endforeach 
@endsection