@extends('layouts.navbar')

@section('content')

<a class="btn btn-info mt-2" href="{{ url('/role') }}" style="float: right;">Go Back</a>
<br>
<h3>Add New Role</h3>
<div class="row ">
    <div class="col-12 col-sn-8 col-md-6 m-auto">
        <div class="card border-dark">
            <div class="card-body ">
                <form method="post" action="{{ url('/add-role') }}">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"><b>Name:</b></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Role Name">
                    </div>
                    
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection