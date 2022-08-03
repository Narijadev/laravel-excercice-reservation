@extends('frontend.layouts.app')

@section('content')
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
    @foreach ($reservations as $key=>$art) 
        <tr>
        <th scope="row">1</th>
        <td>{{ $art->id }}</td>
        <td>{{ $art->status }}</td>
        <td>{{ $art->created_at }}</td>
        </tr>
    @endforeach    
    </tbody>
    </table>
  
@endsection