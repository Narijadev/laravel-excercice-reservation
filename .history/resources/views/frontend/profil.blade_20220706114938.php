@extends('frontend.layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-4">
        
    </div>
    <div class="col-sm-8">
        <div class="card">
            <img src="img.jpg" alt="John" style="width:100%">
            <h1>{{ $input->firstname }}</h1>
            <p class="title">CEO & Founder, Example</p>
            <p>{{ $input->lastname }}</p>
            <a href="#"><i class="fa fa-dribbble"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a> 
            <a href="#"><i class="fa fa-linkedin"></i></a> 
            <a href="#"><i class="fa fa-facebook"></i></a> 
            <p><button>Contact</button></p>
        </div>
    </div>
</div>
@endsection