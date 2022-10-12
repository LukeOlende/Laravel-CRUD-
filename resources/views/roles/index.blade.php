@extends('layouts.navbar')

@section('content')

<h3>Roles</h3>
<a class="btn btn-info mb-3" href="{{ url('/') }}" style="float: right;">Go Back</a>
<a class="btn btn-primary mb-3" href="{{ url('/add-role') }}">Add Role</a>
<table class="table table-striped table-bordered border-dark table-sm">
<tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Date Created</th>
    </tr>
  <tbody>
    @foreach ($roles as $role)
    <tr>
      <th scope="row">{{$role -> id}}</th>
      <td>{{$role->name}}</td>
      <td>{{ $role->created_at }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection