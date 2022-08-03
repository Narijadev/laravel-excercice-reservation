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
    @foreach ($reservations as $key=>$res) 
        <tr>
        <th scope="row">1</th>
        <td>{{ $res->id }}</td>
        <td>{{ $res->status }}</td>
        <td>{{ $res->created_at }}</td>
        <td><a href="/detail/{{ $res->id }}" class="btn btn-info">Detail</a>
        </tr>
    @endforeach    
    </tbody>
    </table>
  
@endsection