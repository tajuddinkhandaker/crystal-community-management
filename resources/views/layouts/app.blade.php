<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AIT | @yield('title')</title>

    <!-- Fonts -->
    <link href="fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <script src="bower_components/webcomponentsjs/webcomponents.js"></script>
    <link rel="import"
            href="bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
    <link rel="import"
            href="bower_components/paper-menu/paper-menu.html">
    <link rel="import"
        href="bower_components/paper-item/paper-item.html">
    @yield('paper-elements')

    <!-- Styles -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- sweet alert -->
    <script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bower_components/sweetalert/dist/sweetalert.css">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    @yield('header-styles')

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    AIT
                </a>
            </div>

            <div id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else  
                        <li>
                            <paper-dropdown-menu class="pull-right" label="{{ Auth::user()->name }}">
                              <paper-menu class="dropdown-content">
                                <a href="{{ url('/logout') }}" tabindex="-1">
                                    <paper-item class="fancy" raised><i class="fa fa-btn fa-sign-out"></i>Logout</paper-item>
                                </a>                                
                                <a href="/publish-announcement" tabindex="-1">
                                    <paper-item class="fancy" raised>Publish New Announcement</paper-item>
                                </a>
                                <a href="/user-profile" tabindex="-1">
                                  <paper-item class="fancy" raised>Edit Profile</paper-item>
                                </a>
                              </paper-menu>
                            </paper-dropdown-menu>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        @include('includes.flash')
    </div>

    @yield('content')

    <!-- JavaScripts -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
