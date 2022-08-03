@extends('frontend.layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">lastname</th>
        <th scope="col">lastname</th>
        </tr>
    </thead>
    <tbody>
    @if (count(array($reservation)) > 0) {
        @foreach ($reservation as $res)
            <tr>
            <th scope="row">1</th>
            <td>{{ $res->name }}</td>
            <td>{{ $res->lastname }}</td>
            <td>{{ $res->lastname }}</td>
            </tr>
        @endforeach 
    @endif      
        </tbody>
        </table>
  
@endsection