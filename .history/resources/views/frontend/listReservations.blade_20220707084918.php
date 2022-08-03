@extends('frontend.layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Numero</th>
        <th scope="col">Status</th>
        <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($reservations as $key=>$art) 
        <tr>
        <th scope="row">1</th>
        <td>{{ $art->id }}</td>
        <td>{{ $art->status }}</td>
        <td>{{ $art->created_at }}</td>
        <td><a href="/detail/{{ $user->id }}" class="btn btn-info">Detail</a>
        </tr>
    @endforeach    
    </tbody>
    </table>
  
@endsection