
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
   
    <title>Home Page</title>
@include('components\navbar')
<div class="container">

  <table class='table table-hover table-striped table-bordered mt-5'>
    @if(session('up_success') )
        <div class="alert alert-success alert-dismissible fade show mt-3" id='success-alert' role="alert">
            {{ session('up_success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif
    @if(session('de_success') )
        <div class="alert alert-danger alert-dismissible fade show mt-3" id='success-alert' role="alert">
            {{ session('de_success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
    
    @endif
    <thead>
      <th>Id</th>
      <th>Email</th>
      <th>Password</th>
      <th>Edit</th>
      <th>Delete</th>
    </thead>
  
  @foreach ($data as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->password}}</td>
        {{-- <td>{{$item->password}}</td> --}}
        <td><a href="edit/{{$item->id}}"><button class="btn btn-warning">Edit</button></a></td>
        <td><a href="delete/{{$item->id}}"><button class="btn btn-danger">Delete</button></a></td>
      </tr>
  @endforeach
  </table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

</div>
