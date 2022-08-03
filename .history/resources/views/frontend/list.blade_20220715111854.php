@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <table class="table">
    <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($articles as $key=>$art) 
            <tr>
            <th scope="row">1</th>
            <td>{{ $art->title }}</td>
            <td>{{ $art->content }}</td>
            <td>{{ $art->image }}</td>
            </tr>
        @endforeach    
        </tbody>
        </table>
</div> 
@endsection