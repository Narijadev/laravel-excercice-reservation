@extends('frontend.layouts.app')
  
@section('content')
<div class="container">
    <div class="messages"></div>
    <br>
    <h2>Veuillez ajouter des utilisateurs en cliquant sur "Ajouter un utilisateur"</h2>
    <br>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="open">
      Ajouter un utilisateur
    </button>
  <form method="post" action="{{url('ajouterUsersReservation')}}" id="form"><br/>
  
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

</div>



<div class="container">
  
		@csrf
  <!-- Modal -->
  <div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="alert alert-danger" style="display:none"></div>
      <div class="modal-header">
      	
        <h5 class="modal-title">Ajout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
            <div class="form-group col">
              <label for="Name">Name:</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group col">
              <label for="Lastname">Lastname:</label>
              <input type="text" class="form-control" name="lastname" id="lastname">
            </div>
      </div>
          <div class="row">
              <div class="form-group col">
                <label for="Firstname">Firstname:</label>
                <input type="text" class="form-control" name="firstname" id="firstname">
              </div>
              <div class="form-group col">
                <label for="Birthdate">Birthdate:</label>
                <input type="text" class="form-control" name="birthdate" id="birthdate">
              </div>
          </div>
          
          <div class="row">
            <div class="form-group col">
              <label for="Email">Email:</label>
              <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group col">
                <label for="Phone">Tél.:</label>
                <input type="text" class="form-control" name="phone" id="phone">
              </div>
          </div>
        
         
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button  class="btn btn-success" id="ajaxSubmit">Enregistrer</button>
        </div>
    </div>
  </div>
</div>
  </form>
</div>



      <script>
         jQuery(document).ready(function(){
           /* jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });*/
               jQuery.ajax({
                  url: "{{ url('/ajouterUsersReservation') }}",
                  method: 'post',
                  data: {
                    name: jQuery('#name').val(),
                    lastname: jQuery('#lastname').val(),
                    firstname: jQuery('#firstname').val(),
                    birthdate: jQuery('#birthdate').val(),
                    phone: jQuery('#phone').val(),
                    email: jQuery('#email').val(),
                  },
                  success: function(result){
                  	if(result.errors)
                  	{
                  		jQuery('.alert-danger').html('');

                  		jQuery.each(result.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<li>'+value+'</li>');
                  		});
                  	}
                  	else
                  	{
                  		jQuery('.alert-danger').hide();
                  		$('#open').hide();
                  		$('#myModal').modal('hide');
                  	}
                  }});
               });
            });
      </script>

@endsection