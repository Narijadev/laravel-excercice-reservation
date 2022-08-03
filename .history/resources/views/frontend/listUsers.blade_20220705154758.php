@extends('frontend.layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">firstname</th>
        <th scope="col">lasttname</th>
        <th scope="col">phone</th>
        <th scope="col">lasttname</th>
        <th scope="col">lasttname</th>
        <th scope="col">lasttname</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $key=>$user) 
        <tr>
        <th scope="row">1</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->firstname }}</td>
        <td>{{ $user->lastname }}</td>
        </tr>
    @endforeach    
    </tbody>
    </table>
  
@endsection