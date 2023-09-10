<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="shortcut icon" href="{{asset('images/vote (1).png')}}" type="image/x-icon">
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <div class="wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="main-box">
                <h1 class="heading">Registration</h1>
                <form action="{{route('register-user')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    @csrf
                 
                    <div class="input-box">
                      <input type="text" name="name" value="{{old('name')}}" class="input-field" id="name" required>
                      <label for="name" class="input-label">Name</label>
                      <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="input-box">
                      <input type="email" name="email" value="{{old('email')}}" class="input-field" id="email" required>
                      <label for="email" class="input-label">Email</label>
                      <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="input-box">
                      <input type="password" name="password" value="{{old('password')}}" class="input-field" id="password" required>
                      <label for="password" class="input-label">Password</label>
                      <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="button">
                      <button type="submit" class="btn btn-primary">Sign up</button>
                    </div>
                </form>
                <div class="text text-center">
                    Already have an account?<a href="{{ route('login') }}">Login here.</a>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Bootstrap JavaScript Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>