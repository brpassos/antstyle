<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AntStyle</title>

    @include('connections.css')


</head>
<body id="app-layout" ng-app="clanApp">
    <div id="wrap">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="cursor:pointer" data-toggle="offcanvas" ng-click="sidebarOn=!sidebarOn" ng-init="sidebarOn=true">
                        <i class="fa fa-bars"></i>
                    </a>
                    <a class="navbar-brand"><i class="fa" ng-class="{'fa-angle-left': sidebarOn, 'fa-angle-right': !sidebarOn}"></i></a>

                    <a class="navbar-brand" href="{{ url('/') }}">
                        AntStyle
                        <% sidebarOn %>
                    </a>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <style>
            .side-menu{
                background-color: #2f4f90;
            }
            .side-menu > a{
                font-size: 16px;
                color: #fff;
                height: 40px;
            }
            .side-menu > a:hover{
                font-size: 16px;
                color: #fff;
                text-decoration: none;
            }
        </style>

        <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-left">
                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                    <ul class="side-menu">
                        <li href="#" class=" active"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;&nbsp;Dashboard</li>
                        <li href="#" class=""><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Jobs</li>
                        <li href="#" class=""><i class="fa fa-tags"></i>&nbsp;&nbsp;Tags</li>
                        <li href="#" class=""><i class="fa fa-users"></i>&nbsp;&nbsp;Clientes</li>
                        <a href="#" class=""><i class="fa fa-dashboard"></i>&nbsp;&nbsp;Configurações</a>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-9 content">


                    @yield('content')
                </div>
            </div>
        </div>

        <div id="push"></div>
    </div>

    <footer>
        <div class="container text-center">
            <a href="https://github.com/brpassos/antstyle">Git Hub</a>
            <span></span>
            <a href="/termos">Termos de Uso</a>
            <span></span>
            <a href="/sobre">Sobre</a>
        </div>
    </footer>


    @include('connections.js')

    <script>
        $(document).ready(function () {
            $('[data-toggle=offcanvas]').click(function () {
                if ($('.sidebar-offcanvas').css('background-color') == 'rgb(255, 255, 255)') {
                    $('.list-group-item').attr('tabindex', '-1');
                } else {
                    $('.list-group-item').attr('tabindex', '');
                }
                $('.row-offcanvas').toggleClass('active');

            });
        });
    </script>

</body>
</html>
