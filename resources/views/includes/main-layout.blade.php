<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name','Online Voting System')}}</title>
    <link rel="shortcut icon" href="{{asset('images/vote (1).png')}}" type="image/x-icon">
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
 
    <!-- main content -->
    @yield('content')

    <!-- footer -->
    @include('includes.footer')

    <!-- Custom JS Link -->
    <script src="{{asset('js/script.js')}}"></script>
    <!-- Bootstrap JavaScript Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jquery cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    @yield('script')
</body>
</html>