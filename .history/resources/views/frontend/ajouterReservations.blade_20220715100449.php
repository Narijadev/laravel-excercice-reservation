@extends('frontend.layouts.app')
<div class="row">
    <div class="col">

    </div>
  </div>     
@section('content')
<div class="container">
    <div class="messages"></div>
    <br>
    <h2>Veuillez ajouter des utilisateurs en cliquant sur "Ajouter un utilisateur"</h2>
    <br>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
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
       
        <td><a href="/voir/{{ $user->id }}" class="btn btn-info">Voir</a>
        </td>
        <td><button type="button" class="btn btn-warning">Modifier</button><i class="bi bi-pen"></i></td>
        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
        </tr>
    @endforeach    
    </tbody>
    </table>

  


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" placeholder="First name">
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="Last name">
          </div>
        </div>
      </form>
      </div>  
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection