@extends('layouts.navbar')

@section('content')
<head>
<style>
.form-check{
  border:2px solid #ccc;
  border-radius: 5px; 
  width: auto; 
  height: 100px; 
  overflow-y: scroll;
}
</style>
</head>
<section>
<a class="btn btn-info mt-2" href="{{ url('/') }}" style="float: right;">Go Back</a>
            <div class="row ">
                <div class="col-12 col-sn-8 col-md-6 m-auto">
                    <div class="card border-dark shadow">
                        <div class="card-body">
                            <div style="text-align:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle " viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            <h2>Edit New User</h2>
                            </div>
                            <form method="post" action="{{ url('/edit-user/'.$web_user->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <div class="form-group">
                                    <label for="exampleFormControlInput"><b>Name:</b></label>
                                    <input type="text" name="name" value="{{ old('name') ?? $web_user->name }}" class="form-control mb-2" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput"><b>Email Address:</b></label>
                                    <input type="email" name="email" value="{{ old('email') ?? $web_user->email }}" readonly class="form-control-plaintext mb-2" placeholder="name@example.com" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput"><b>Password:</b></label>
                                    <input type="password" name="password" value="{{ old('password') ?? $web_user->password }}" class="form-control mb-2" placeholder="Password" >
                                    <span id = "message" style="color:red"> 
                                        <p>Password must be 8 characters or more </p>
                                    </span> 
                                </div>
                                <div class="form-group">
                                    <label for="country"><b>Country:</b></label>
                                    <select name="country_id" class="form-control" id="country-dropdown" required>
                                        <option value="{{ old('country_id') ?? $web_user->country->name }}"></option>
                                        @foreach ($countries as $country) 
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="state" class="mt-2"><b>State:</b></label>
                                    <select name="state_id" class="form-control" id="state-dropdown">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="mt-2"><b>City:</b></label>
                                    <select name="city_id" class="form-control" id="city-dropdown">
                                    </select>
                                </div>
                                <label for="exampleFormControlInput" class="mt-2"><b>Role:</b></label>
                                <select name="role[]" class="form-select form-select" aria-label=".form-select-sm example" multiple>
                                    <option value="Programmer">Programmer</option>
                                    <option value="Department Manager">Department Manager</option>
                                    <option value="Corporate Admin">Corporate Admin</option>
                                    <option value="Little Supper Admin">Little Supper Admin</option>
                                    <option value="Customer Support">Customer Support</option>
                                    <option value="Sales Representative">Sales Representative</option>
                                </select>
                                <span style="color: darkgreen;">
                                    <p>Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p>
                                </span>
                                <!-- <div class="form-check">
                                    <input class="form-check-input mx-auto" type="checkbox" name="role[]" value="Programmer" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Programmer</label>
                                    <br>
                                    <input class="form-check-input mx-auto" type="checkbox" name="role[]" value="Department Manager" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Department Manager</label>
                                    <br>
                                    <input class="form-check-input mx-auto" type="checkbox" name="role[]" value="Corprate Admin" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Corprate Admin</label>
                                    <br>
                                    <input class="form-check-input mx-auto" type="checkbox" name="role[]" value="Little Super Admin" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Little Super Admin</label>
                                    <br>
                                    <input class="form-check-input mx-auto" type="checkbox" name="role[]" value="Customer Support" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Customer Support</label>
                                    <br>
                                    <input class="form-check-input mx-auto" type="checkbox" name="role[]" value="Sales Representative" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Sales Representative</label>
                                </div> -->
                                <div class="text-center mt-3">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
$(document).ready(function() {
    $('#country-dropdown').on('change', function() {
        var country_id = this.value;
        $("#state-dropdown").html('');
        $.ajax({
            url:"{{url('get-states-by-country')}}",
            type: "POST",
            data: {
            country_id: country_id,
            _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                $('#state-dropdown').html('<option value="">Select State</option>'); 
                $.each(result.states,function(key,value){
                $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
                $('#city-dropdown').html('<option value="">Select State First</option>'); 
            }
        });
    });
        
    $('#state-dropdown').on('change', function() {
        var state_id = this.value;
        $("#city-dropdown").html('');
        $.ajax({
            url:"{{url('get-cities-by-state')}}",
            type: "POST",
            data: {
            state_id: state_id,
            _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                $('#city-dropdown').html('<option value="">Select City</option>'); 
                $.each(result.cities,function(key,value){
                $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            }
        });
    });
});
</script>
@endsection