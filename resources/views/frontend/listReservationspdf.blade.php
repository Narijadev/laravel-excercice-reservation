<label>
<h1>Liste reservation</h1>
</label>
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
    <!-- @if (count($reservations)>0)-->
            @foreach ($reservations as $key=>$res) 
                <tr>
                <th scope="row">1</th>
                <td>{{ $res->id }}</td>
                <td>{{ $res->status }}</td>
                <td>{{ $res->created_at }}</td>
                
                </tr>
            @endforeach 
           <!-- @else 
                <div class="list-group-item" align="center">No results</div>
            @endif-->
                  
    </tbody>
     
    </table>
   
</div>  
