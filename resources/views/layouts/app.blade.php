<?php
$rota = Route::getCurrentRoute()->getPath();
$sidebar = true;
if($rota=="/" || $rota=="register" || $rota=="login"){
    $sidebar = false;
}
?>
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
                    @if($sidebar)
                    <a class="navbar-brand hidden-xs hidden-sm" style="cursor:pointer" id="menu-toggle" data-toggle="offcanvas" ng-click="sidebarOn=!sidebarOn"
                      ng-init="sidebarOn=true">
                        <i class="fa fa-bars"></i>
                    </a>

                    <a class="navbar-brand hidden-xs hidden-sm"><i class="fa" ng-class="{'fa-angle-left': sidebarOn, 'fa-angle-right': !sidebarOn}"></i></a>
                    @endif
                    <a class="navbar-brand" href="{{ url('/') }}">
                        AntStyle
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

        @if(!$sidebar)
            <style>
                #wrapper{
                    padding-left: 0;
                }
            </style>
        @endif

        <div id="wrapper" @if($sidebar)class="active"@endif>

        @if($sidebar)

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <div class="row">
                    <div class="col-sm-9 col-md-9">
                        <ul class="sidebar-nav hidden-xs hidden-sm" id="sidebar">
                            <a href="/home"><li class="@if($rota=="home")activeMenu @endif"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;&nbsp;Dashboard</li></a>
                            <a href="/jobs"><li class="@if($rota=="jobs")activeMenu @endif"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Jobs</li></a>
                            <a href="/tags"><li class="@if($rota=="tags")activeMenu @endif"><i class="fa fa-tags"></i>&nbsp;&nbsp;Tags</li></a>
                            <a href="/clientes"><li class="@if($rota=="clientes")activeMenu @endif"><i class="fa fa-users"></i>&nbsp;&nbsp;Clientes</li></a>
                        </ul>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <ul class="sidebar-nav sidebar-icon" ng-class="{'displayIcons': sidebarOn}">
                            <a href="/home"><li class="@if($rota=="home")activeMenu @endif"><i class="fa fa-dashboard" title="Dashboard"></i></li></a>
                            <a href="/jobs"><li class="@if($rota=="jobs")activeMenu @endif"><i class="fa fa-briefcase" title="Jobs"></i></li></a>
                            <a href="/tags"><li class="@if($rota=="tags")activeMenu @endif"><i class="fa fa-tags" title="Tags"></i></li></a>
                            <a href="/clientes"><li class="@if($rota=="clientes")activeMenu @endif"><i class="fa fa-users" title="Clientes"></i></li></a>
                        </ul>
                    </div>
                </div>

            </div>


        @endif


            <!-- Page content -->
            <div id="page-content-wrapper">
                <!-- Keep all page content within the page-content inset div! -->
                <div class="page-content inset">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="container-fluid">
                                @yield('content')
                            </div>
                        </div>
                    </div>
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

    {{--Menu toglle script--}}
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("active");
        });
    </script>

</body>
</html>
