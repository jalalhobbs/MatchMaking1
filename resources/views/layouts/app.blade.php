<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="fb-root"></div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo" src="{{asset('/images/love.png')}}">
                    Match Maker One
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Home') }}
                                    </a>

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

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

        <footer class="footer navbar-fixed-bottom">

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                            <ul class="footerList">
                                <li>
                                    <a>About Match Maker One</a>
                                </li>
                                <li>
                                    <a>FAQ</a>
                                </li>
                                <li>
                                    <a>Help</a>
                                </li>
                            </ul>


                    </div>
                    <div class="col-md-4">

                        <ul class="footerList">
                            <li>
                                <a>Dating Advice</a>
                            </li>
                            <li>
                                <a>Dating Safety</a>
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

                    </div>
                </div>
                <div class="row justify-content-center">
                    <p>&copy; 2018 Match Maker One</p>
                </div>

            </div>


        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Facebook Register Button -->

    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId            : 'your-app-id',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v2.12'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</body>
</html>
