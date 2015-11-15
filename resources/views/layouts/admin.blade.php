<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            {{config('interfusion.title')}}
            @section('title')
            @show
        </title>
        <link href="/css/admin.css" rel="stylesheet">
        @yield('styles')

        <!--[if lt IE 9]>
            <script src="/js/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">Interfusion Backoffice</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        @if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
                            <li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ action('\\Sentinel\Controllers\UserController@index') }}">Users</a></li>
                            <li {{ (Request::is('groups*') ? 'class="active"' : '') }}><a href="{{ action('\\Sentinel\Controllers\GroupController@index') }}">Groups</a></li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Sentry::check())
                            <li {{ (Request::is('profile') ? 'class="active"' : '') }}><a href="{{ route('sentinel.profile.show') }}">{{ Session::get('email') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('sentinel.logout') }}">Logout</a>
                            </li>
                        @else
                            <li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="{{ route('sentinel.login') }}">Login</a></li>
                            <li {{ (Request::is('users/create') ? 'class="active"' : '') }}><a href="{{ route('sentinel.register.form') }}">Register</a></li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <!-- ./ navbar -->

        <div class="container">
            @include('layouts.notifications')
            @yield('content')
        </div>

        <script src="/js/admin.js"></script>
        @yield('scripts')

    </body>
</html>