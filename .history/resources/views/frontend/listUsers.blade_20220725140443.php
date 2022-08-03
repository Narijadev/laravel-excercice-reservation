@extends('frontend.layouts.app')

@section('content')
<div class="container">
<div class="form-group">
    <label>Type a country name</label>
    <input type="text" name="country" id="country" placeholder="Enter country name" class="form-control">
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
            <td><button type="button" class="btn btn-warning" onclick="click()">Click Me</button></td>
            <td><button type="button" class="btn btn-warning">Modifier</button><i class="bi bi-pen"></i></td>
            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
            <td>
                
            </td>
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
        })
      
</script>


@endsection