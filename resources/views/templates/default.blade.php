<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script>
      window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <title>@yield('title','photoalbum')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="{{url('/')}}/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/css/lightbox.css">

    <!-- Custom styles for this template -->
   <style>
       body{
           margin-top:120px;
       }
   </style>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

<a href="/laravel-album/"><img src="{{ asset('/public/logo.png') }}" class="logo" height="50" width="50" >
</img></a>
    <a class="navbar-brand" href="/laravel-album/"> &nbsp photoalbum </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            
            @if(Auth::check())
           <li class="nav-item">
                <a class="nav-link" href="{{route('albums')}}">My Albums</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('album.create')}}">New Album</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('photos.create')}}">New Image</a>
            </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('categories.index')}}">Categories</a>
                </li>
            @endif
        </ul>


        
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                <li><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle  nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @if(Auth::user()->isAdmin())
                            <li>
                                <a href="{{route('admin')}}">ADMIN</a>
                            </li>

                                    <li class="nav-item">
                                        <a href="{{route('user-list')}}">Users</a>
                                    </li>

                            </li>
                            @endif
                    </ul>
                </li>
            @endif
        </ul>

    </div>
    
</nav>

<div class="container">
   @yield('content')

</div>
@section('footer')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="/js/lightbox.min.js"></script>
@show
</body>
</html>
