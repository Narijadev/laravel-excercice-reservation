@extends('frontend.layouts.app')

@section('content')
<div class="container">
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
            <td><button type="button" onclick="click()">Click Me</button></td>
            <td><button type="button" class="btn btn-warning">Modifier</button><i class="bi bi-pen"></i></td>
            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
            <td>
                <form method="post" class="delete-form" data-route="{{route('posts.destroy',$user->id)}}">
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
            </tr>
        @endforeach    
        </tbody>
        </table>
</div>   

<script type="text/javascript">
          $(document).ready(function() {

            $('.delete-form').on('submit', function(e) {
              e.preventDefault();

              $.ajax({
                  type: 'post',
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
            })
          });
        </script>
<script>
        $(document).ready(function() {
            var url = "{{URL('userData')}}";
            $.ajax({
                url: "/userData/getUserData",
                type: "POST",
                data:{ 
                    _token:'{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult);
                    var resultData = dataResult.data;
                    var bodyData = '';
                    var i=1;
                    $.each(resultData,function(index,row){
                        var editUrl = url+'/'+row.id+"/edit";
                        bodyData+="<tr>"
                        bodyData+="<td>"+ i++ +"</td><td>"+row.name+"</td><td>"+row.email+"</td><td>"+row.phone+"</td>"
                        +"<td>"+row.city+"</td><td><a class='btn btn-primary' href='"+editUrl+"'>Edit</a>" 
                        +"<button class='btn btn-danger delete' value='"+row.id+"' style='margin-left:20px;'>Delete</button></td>";
                        bodyData+="</tr>";
                        
                    })
                    $("#bodyData").append(bodyData);
                }
            });


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
        
});
</script>

@endsection