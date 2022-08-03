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
    @if (count(array($reservation)) > 0) 
        @foreach ($reservation as $res)
            <tr>
            <th scope="row">1</th>
            <td>{{ $res->name }}</td>
            <td>{{ $res->lastname }}</td>
            <td>{{ $res->lastname }}</td>
            <td>{{ $res->status }}</td>
            <td><a href="/voir/{{ $res->id }}" class="btn btn-info">Voir</a>
        </td>
        <td><button type="button" class="btn btn-warning">Modifier</button><i class="bi bi-pen"></i></td>
        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
            </tr>
        @endforeach 
    @endif      
        </tbody>
        </table>
  
@endsection