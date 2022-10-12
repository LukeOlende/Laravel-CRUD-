@extends('layouts.navbar')

@section('content')

<h3>USERS</h3>
<a class="btn btn-primary mb-2" href="{{ url('/add-user') }}" style="float: right;" >Create New User</a>
<table class="table table-striped table-bordered border-dark table-sm">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Country</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  <tbody>
  @foreach ($web_users as $web_user)
    <tr>
      <th scope="row">{{$web_user->id}}</th>
      <td>{{$web_user->name}}</td>
      <td>{{$web_user->email}}</td>
      <td>{{$web_user->country->name}}</td>
      <td>{{$web_user->state->name}}</td>
      <td>{{$web_user->city->name}}</td>
      <td>{{$web_user->role}}</td>
      
      <td style="display: flex;">
      <div>
        <a href="{{ url('/edit-user/'.$web_user->id) }}" class="btn btn-primary mx-2">Edit</a>
      </div>  
        <form action="{{ url('/delete-user/'.$web_user->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection