<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Users</title>
    <style>
    body {
    /* background-image: url('/images/little\ ride.jpg'); */
    height: 500px;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;
    opacity: 1;
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: darkblue;">
  <div class="container-fluid">
    <a class="navbar-brand mx-5" href="https://little.bz/">
      <img src="/images/little.png" width="40" height="40" class="d-inline-block align-top" alt="Little">
      <b>LITTLE ADMIN</b>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-2">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif
</div>

<div class="container mt-2">
    @if(session()->exists('message'))
        <div class="alert alert-success" role="alert">
          {{session('message')}}
        </div>
    @endif
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>