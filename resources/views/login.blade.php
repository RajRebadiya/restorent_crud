<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title> 
    <link rel="stylesheet" href="assets/css/reg_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   </head>
<body>
    {{-- @include('components\navbar') --}}
    
    <div class="wrapper">
        <h2>Login</h2>
        @if(session('error'))
        <div class="alert alert-success alert-dismissible fade show mt-3" id='success-alert' role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('ses_error'))
        <div class="alert alert-success alert-dismissible fade show mt-3" id='success-alert' role="alert">
            {{ session('ses_error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="reg_login" method="post">
            @csrf
            <div class="input-box">
                <input type="text" name='email' placeholder="Enter your email" >
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
      </div>
      <div class="input-box">
        <input type="password" name='password' placeholder="Enter your password" >
        @error('password')
            <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="input-box button">
        <input type="Submit" value="Login Now">
      </div>
      <div class="text">
        <h3>You don't have an account? <a href="register">Register now</a></h3>
      </div>
    </form>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>