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

    <!-- Scripts -->
    {{--<script src="{{ asset('js/like.js') }}"></script>--}}
    <script type="text/javascript">
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('updateLikeStatus') }}';
        function setLikeButtons() {
            targetId = 0;
            $('.btn-dislike').on('click', function (event) {

                event.preventDefault();
                targetId = event.target.parentNode.parentNode.dataset['userid'];

                $.ajax({
                    method: 'POST',
                    url: urlLike,
                    data: {isLike: 0, targetId: targetId, _token: token}
                })
                    .done(function () {
                        //change the page
                    });
            });


            $('.btn-no-like-status').on('click', function (event) {

                event.preventDefault();
                targetId = event.target.parentNode.parentNode.dataset['userid'];

                $.ajax({
                    method: 'POST',
                    url: urlLike,
                    data: {isLike: 1, targetId: targetId, _token: token}
                })
                    .done(function () {
                        //change the page
                    });
            });

            $('.btn-like').on('click', function (event) {

                event.preventDefault();
                targetId = event.target.parentNode.parentNode.dataset['userid'];

                $.ajax({
                    method: 'POST',
                    url: urlLike,
                    data: {isLike: 2, targetId: targetId, _token: token}
                })
                    .done(function () {
                        //change the page
                    });
            });
        };
    @if (isset($pageName) and $pageName=="Home")
            let profileUrl = './api/potentialmatch/{{Auth::id()}}';
            const getProfiles = () => {
                fetch(profileUrl)
                    .then(res => res.json())
                    .then(profiles => {
                        return profiles.map(profile => {
                            console.log(profile);

                            // create profile card
                            let profileCard = $("<div>", {class: "col-sm-6 col-sm-4 col-lg-3"});

                            // create thumbnail
                            let content = document.createElement('div');
                            content.className = "thumbnail";
                            if (profile.content != null) {
                                profileCard.append(content);
                            }

                            // create name
                            let firstName = document.createElement('h5');
                            firstName.innerHTML = `Name: ${profile.firstName}`;
                            content.append(firstName);

                            // create profile pic
                            let profilePic = document.createElement('img');
                            profilePic.src = profile.profilePictureUrl;
                            content.append(profilePic);


                            // create caption
                            let caption = document.createElement('div');
                            caption.className = "caption";

                            // create gender
                            let gender = document.createElement('p');
                            gender.innerHTML = `Gender: ${profile.genderDisplay}`;
                            gender.className = "flex-text text-muted";
                            if (profile.gender != null) {
                                caption.append(gender);
                            }
                            // create age
                            let age = document.createElement('p');
                            age.innerHTML = `Age: ${profile.age}`;
                            age.className = "flex-text text-muted";
                            if (profile.age != null) {
                                caption.append(age);
                            }
                            // create body type
                            let bodyType = document.createElement('p');
                            bodyType.innerHTML = `bodyType: ${profile.bodyTypeDisplay}`;
                            bodyType.className = "flex-text text-muted";
                            if (profile.bodyType != null) {
                                caption.append(bodyType);
                            }

                            // create button form
                            let buttonForm = document.createElement('form');
                            buttonForm.setAttribute('action', 'updateLikeStatus');
                            buttonForm.setAttribute('method', 'post');
                            buttonForm.setAttribute('data-userid', profile.id);

                            // create tokenInput
                            let tokenInput = document.createElement('input');
                            tokenInput.setAttribute('type', 'hidden');
                            tokenInput.setAttribute('name', '_token');
                            tokenInput.setAttribute('value', '{{ Session::token() }}');
                            buttonForm.append(tokenInput);

                            // create targetIdInput
                            let targetIdInput = document.createElement('input');
                            targetIdInput.setAttribute('type', 'hidden');
                            targetIdInput.setAttribute('name', 'targetId');
                            targetIdInput.setAttribute('value', profile.id);
                            buttonForm.append(targetIdInput);

                            // create buttons
                            let divButtons = document.createElement('div');
                            divButtons.setAttribute('data-toggle', 'buttons');
                            divButtons.className = "btn-group btn-group-toggle text-center col-12";

                            // create dislike button
                            let dislikeButtonLabel = document.createElement('label');
                            dislikeButtonLabel.className = "btn btn-dislike col-5";
                            if (profile.likeStatus == 0) {
                                dislikeButtonLabel.classList.add("active");
                            }

                            let dislikeInput = document.createElement('input');
                            dislikeInput.setAttribute('type', 'radio');
                            dislikeInput.setAttribute('autocomplete', 'off');
                            dislikeInput.setAttribute('checked', 'checked');

                            dislikeButtonLabel.append(dislikeInput);
                            dislikeButtonLabel.append("Dislike");
                            divButtons.append(dislikeButtonLabel);

                            // create neutral button
                            let neutralLabel = document.createElement('label');
                            neutralLabel.className = "btn btn-no-like-status col-2";
                            if (profile.likeStatus == 1) {
                                neutralLabel.classList.add("active");
                            }

                            let neutralInput = document.createElement('input');
                            neutralInput.setAttribute('type', 'radio');
                            neutralInput.setAttribute('autocomplete', 'off');


                            neutralLabel.append(neutralInput);
                            divButtons.append(neutralLabel);

                            // create dislike button
                            let likeButtonLabel = document.createElement('label');
                            likeButtonLabel.className = "btn btn-like col-5";

                            let likeInput = document.createElement('input');
                            likeInput.setAttribute('type', 'radio');
                            likeInput.setAttribute('autocomplete', 'off');


                            likeButtonLabel.append(likeInput);
                            likeButtonLabel.append("Like");
                            divButtons.append(likeButtonLabel);

                            buttonForm.append(divButtons);
                            caption.append(buttonForm);
                            content.append(caption);
                            profileCard.append(content);
                            $("#profiles").append(profileCard);
                        });
                    })
                    .then(buttons => setLikeButtons());
            };





    @endif


        </script>
</head>
<body onload="@if (isset($pageName) and $pageName=="Home")
        getProfiles()
@else
        setLikeButtons()
@endif">
<div id="fb-root"></div>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    {{ __('Home') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('matches') }}">
                                    {{ __('Matches') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('likedProfiles') }}">
                                    {{ __('Liked Profiles') }}
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

@if (Request::capture()->fullUrl() === route('home'))
    {{--<script src="{{ asset('js/like.js') }}"></script>--}}
@endif

<!-- Facebook Register Button -->

<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: 'your-app-id',
            autoLogAppEvents: true,
            xfbml: true,
            version: 'v2.12'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

{{--@if (Request::capture()->fullUrl() === route('home'))--}}
    {{--{--}}
    {{--<script type="text/javascript">--}}
        {{--var token = '{{ Session::token() }}';--}}
        {{--var urlLike = '{{ route('updateLikeStatus') }}';--}}
        {{--$(document).ready(setLikeButtons());--}}
    {{--</script>--}}
    {{--}--}}
{{--@endif--}}


</body>
</html>