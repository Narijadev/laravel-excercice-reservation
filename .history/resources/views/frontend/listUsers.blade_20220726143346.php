@extends('frontend.layouts.app')

@section('content')
<div class="container">
<div class="form-inline my-2 my-lg-0 ">
    <input type="text" class="form-control mr-sm-2 mt-3 mb-3" id="search" name="search"  placeholder="Search" aria-label="Search">
</div>

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
            <!--td><button type="button" class="btn btn-warning" onclick="click()">Click Me</button></td-->
            <td><button type="button" class="btn btn-warning">Modifier</button><i class="bi bi-pen"></i></td>
            <!--td><button type="button" class="btn btn-danger">Supprimer</button></td-->
            <!--td>
                <form method="post" class="delete-form" data-route="{{route('delete',$user->id)}}">
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td-->
            <td><a href="{{ route('company.destroy',$user->id) }}" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteCompany" data-id="{{ $user->id }}">
                Delete
                </a></td>
            </tr>
        @endforeach    
        </tbody>
        </table>
</div>   
<script type="text/javascript">
 $(document).ready(function () {
       
        $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data:{'search':$value},
                success:function(data){
                $('tbody').html(data);
                }
            });
        });
      /*  $('.delete-form').on('submit', function(e) {
              e.preventDefault();

              $.ajax({
                  type: 'delete',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: $(this).data('route'),
                  data: {
                    '_method': 'delete'
                  },
                  success: function (response, textStatus, xhr) {
                    alert(response)
                    window.location='/posts'
                  }
              });
            })*/
 $("body").on("click","#deleteCompany",function(e){

            if(!confirm("Do you really want to do this?")) {
            return false;
            }

            e.preventDefault();
            var id = $(this).data("id");
            // var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            var url = e.target;

            $.ajax(
                {
                url: url.href, //or you can use url: "company/"+id,
                type: 'DELETE',
                data: {
                    _token: token,
                        id: id
                },
                success: function (response){

                    $("#success").html(response.message)

                    Swal.fire(
                    'Remind!',
                    'Company deleted successfully!',
                    'success'
                    )
                }
            });
            return false;
            });

        });
</script>
       
<!--script>
       

    $(document).on("click", ".delete", function() { 
        var $ele = $(this).parent().parent();
        var id= $(this).val();
        var url = "{{URL('delete')}}";
        var dltUrl = url+"/"+id;
		$.ajax({
			url: dltUrl,
			type: "DELETE",
			cache: false,
			data:{
				_token:'{{ csrf_token() }}'
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$ele.fadeOut().remove();
				}
			}
		});
	});
        


        

</script-->

@endsection