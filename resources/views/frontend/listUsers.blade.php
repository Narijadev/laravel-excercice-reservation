@extends('frontend.layouts.app')

@section('content')
<div class="container">
<div class="form-inline my-2 my-lg-0 ">
    <input type="text" class="form-control mr--sm-2 mt-3 mb-3" id="search" name="search"  placeholder="Search" aria-label="Search">
  
</div>
<form method="get" action="{{{ URL::to('search2') }}}">
<input class="input-xxlarge" name="q" type="text" placeholder="Search...">
<div class="control-group">
    <div class="controls">
        <input type="submit" class="btn" id="submit" value="Submit" />
    </div>
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
        <div class="pagination">
            <!-- {{ $users->links() }} --> 
            
            {{ $users->appends(array('search' => $search))->links() }} 
        </div>
     <!--  {{ $users->appends(array('q' => $search))->links() }} --> 
</div>   
<!--div align="center">
            <table>
                <tr>
                    <th>{{ $users->links() }}</th>
                </tr>
            </table>
</div-->             
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

        $('#delete2').on('click', function(){

        var confirmation = confirm("are you sure you want to remove the item?");

        if (confirmation) {
        // execute ajax
            alert('removed');
        }
        });   
}); 
$(document).on("click", "#delete", function() { 
       
       var $ele = $(this).parent().parent();
       var id= $(this).val();
       var url = "{{URL('delete')}}";
       var dltUrl = url+"/"+id;
       
       var result = confirm('Are you sure?');
       if(result) {

                // If you pressed OK!";
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
   }
   });
   


</script>
       


@endsection