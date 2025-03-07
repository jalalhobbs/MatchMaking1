<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{Auth::id()}}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body onload="$(document).ready(setLikeButtons());">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="logo" src="{{asset('/images/love.png')}}">
                Match Maker One
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item @if(isset($pageName) && $pageName == 'Home')active @endif">
                                <a class="nav-link" href="{{ route('home') }}">
                                    Home <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(isset($pageName) && $pageName == 'Matches')active @endif"
                                   href="{{ route('matches') }}">
                                    Matches
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(isset($pageName) && $pageName == 'Likes You')active @endif"
                                   href="{{ route('likesYou') }}">
                                    Likes You
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(isset($pageName) && $pageName == 'Liked Profiles')active @endif"
                                   href="{{ route('likedProfiles') }}">
                                    Liked Profiles
                                </a>
                            </li>

                            <li class="nav-item d-md-none">
                                <a class="nav-link" href="{{ route('profile.edit', [Auth::user()->id]) }}">
                                    {{ __('My Profile') }}
                                </a>
                            </li>

                            <li class="nav-item d-md-none">
                                <a class="nav-link" href="{{ route('looking-for.edit', [Auth::user()->id]) }}">
                                    {{ __('Looking for.....') }}
                                </a>
                            </li>
                            <li class="nav-item d-md-none">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>

                        </ul>
                        <li class="nav-item dropdown d-none d-sm-none d-md-block">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('profile.edit', [Auth::user()->id]) }}">
                                    {{ __('My Profile') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('looking-for.edit', [Auth::user()->id]) }}">
                                    {{ __('Looking for.....') }}
                                </a>


                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="footer">

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="footerList">
                        <li>
                            <a href="{{ route('about')}}">About Match Maker One</a>
                        </li>
                        <li>
                            <a href="{{ route('faq')}}">FAQ</a>
                        </li>
                        <li>
                            <a href="{{ route('help')}}">Help</a>
                        </li>
                    </ul>


                </div>
                <div class="col-md-4">

                    <ul class="footerList">
                        <li>
                            <a href="{{ route('advice')}}">Dating Advice</a>
                        </li>
                        <li>
                            <a href="{{ route('safety')}}">Dating Safety</a>
                        </li>
                        <li>
                            <a></a>
                        </li>
                    </ul>

                </div>
                <div class="col-md-4">

                    <ul class="footerList">
                        <li>
                            <a></a>
                        </li>
                        <li>
                            <a></a>
                        </li>
                        <li>
                            <a></a>
                        </li>
                    </ul>
                    <div class="row justify-content-center">
                        <p>&copy; 2018 Match Maker One</p>
                    </div>
                </div>

            </div>


        </div>


    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>