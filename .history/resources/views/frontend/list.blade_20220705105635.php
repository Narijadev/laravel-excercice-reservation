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
    @foreach ($article as $key=>$art) 
        <tr>
        <th scope="row">1</th>
        <td>{{$art->content}}</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
    </tbody>
    </table>
    @endforeach
@endsection