<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>ToDoList</title>

  <!-- Bootstrap core CSS -->
  <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  
  
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="{{url('css/scrolling-nav.css')}}" rel="stylesheet">
  
  <script src="{{ mix('js/app.js') }}"></script>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Listing</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        @if(Route::has('login'))
            <ul class="navbar-nav ml-auto">
              @auth
                <li class="nav-item header-right-menu">
                  <div class="dropdown">
                    <a class="nav-link js-scroll-trigger dropbtn" href="javascript:void(0);" >
                        <img src="{{ url('images/' . auth()->user()->profile_pic) }}" height="40px" width="40px;">
                    </a>
                    <div class="dropdown-content row">
                        <center><h2><u>User info</u></h2></center>
                        <br>
                       <label class="col-sm-5">Name:</label>
                       <span class="col-sm-7">{{ auth()->user()->name }}</span> <br>
                       <label class="col-sm-5">Email:</label>
                       <span class="col-sm-7">{{ auth()->user()->email }}</span> <br>
                       <label class="col-sm-5">Join at:</label>
                       <span class="col-sm-7">{{ auth()->user()->created_at }}</span> <br>
                       <center><a href="/user/edit/{{ auth()->user()->id }}"><b>Edit</b></a></center>
                    </div>
                  </div>
                </li>
                <li class="nav-item header-right-menu">
                  <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" style="margin-top:8px;">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              @else
                <li class="nav-item header-right-menu">
                  <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>
                </li>
                @if(Route::has('register'))
                  <li class="nav-item header-right-menu">
                    <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a>
                  </li>
                @endif
              @endauth
            </ul>
        @endif
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Welcome to ToDoList App</h1>
      <b><center>{{ request()->session()->get('msg') }}</center></b><br>
      <p class="lead">List up all your tasks today</p>
    </div>
      
  </header>

  @yield('content')

 <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; ToDoList {{ date('Y') }}</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="{{url('js/scrolling-nav.js')}}"></script>

</body>

</html>
