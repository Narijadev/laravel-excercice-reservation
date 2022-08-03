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
            <td><button type="button" class="btn btn-warning">Modifier</button><i class="bi bi-pen"></i></td>
           
           

                <td><form action="{{ route('delete.user', $user->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form></td>
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


    $(document).on("click", "#delete", function() { 
        if(!confirm("Do you really want to do this?")) {
            return false;
            }
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
       


@endsection