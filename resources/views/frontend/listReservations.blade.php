@extends('frontend.layouts.app')

@section('content')
<div class="container">
<div class="row mt-2 mb-2">
    <form class="form-inline my-2 my-lg-0 " method="get" action="{{{ URL::to('searchReservation') }}}">
        <input class="form-control mr-sm-2" name="q" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>         
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
    {{ $reservations->appends(array('q' => $search))->links() }} 
</div>  
@endsection