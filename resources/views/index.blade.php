<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
    <link rel="stylesheet" href="{{ asset('assets/dist') }}/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins') }}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins') }}/fontawesome-free/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-blue">
        <a class="navbar-brand" href="#">Gallery</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          @if (Auth::check())
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/home">Dashboard <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          @endif

          @if (!Auth::check())

         
       
            <a href="/login" class="btn btn-info my-2 my-sm-0" type="submit">Login</a>

          @endif
         
        </div>
      </nav>
      <div class="container">
        <div class="container-fluid">
          @yield('main')

         
        </div>
      </div>
</body>
<!-- jQuery -->
<script src="{{ asset('assets/plugins') }}/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins') }}/jquery-ui/jquery-ui.min.js"></script>
<script src="{{ asset('assets/plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/plugins') }}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist') }}/js/adminlte.min.js"></script>
</html>