@extends('frontend.layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">firstname</th>
        <th scope="col">lastname</th>
        <th scope="col">birthdate</th>
        <th scope="col">email</th>
        <th scope="col">phone</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $key=>$user) 
        <tr>
        <th scope="row">1</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->firstname }}</td>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->birthdate }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <a href="<?= $this->Url->build('/edit-user/' . $data->id, ['fullBase' => true]) ?>" class="btn btn-warning"> <i class="bi bi-pen">Edit</a>
        <a href="<?= $this->Url->build('/delete-user/' . $data->id, ['fullBase' => true]) ?>" class="btn btn-danger">Delete</a>
        <td><button type="button"  class="btn btn-info">Info</button></td>
        <td><button type="button" class="btn btn-info">Info</button><i class="bi bi-pen"></i></td>
        <td><button type="button" class="btn btn-info">Info</button></td>
        </tr>
    @endforeach    
    </tbody>
    </table>
@endsection