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
  <div class="wrapper">
    <h2>Registration</h2>
   <!-- Success Alert -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mt-3" id='success-alert' role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <form action="reg_submit" method="post">
      @csrf
      <div class="input-box">
        <input type="text" name='email' placeholder="Enter your email" >
        @error('email')
        <div style="color:red; padding-bottom:10px">{{$message}}</div>
    @enderror
      </div>
      <div class="input-box">
        <input type="password" name='password' placeholder="Create password" >
        @error('password')
            <div class="text-danger">{{$message}}</div>
        @enderror
      </div>
      <div class="input-box">
        <input type="password" name='cpassword' placeholder="Confirm password" >
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login">Login now</a></h3>
      </div>
    </form>
  </div>
  <!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/reg_login.js"></script>

</body>
</html>