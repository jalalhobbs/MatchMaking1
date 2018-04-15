<!doctype html>
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

<div class="jumbotron-fluid">
<div class="container-fluid  topMenu">
        <div class="row align-items-start">
            <div class="col-sm-6 d-none d-sm-block">
                <h3><img src="http://localhost/MatchMaking1/public/images/love.png"> Match Maker One  </h3>
            </div>
            <div class="col-sm-6 rightAlign">

                <p>Already A Member? <a class="btn btn-primary btn-md" href="http://localhost/MatchMaking1/public/login" role="button">Sign In &raquo;</a></p>

            </div>
        </div>
</div>
    <div class="container inputCard">
    <div class="row">
        <div class="col-lg-5">
    <div class="card">
        <div class="card-header">{{ __('Welcome') }}</div>
        <div class="card-body">

            <div class="row">
                <div class="col-lg-6">
                    <label for="My Gender">I am a...</label>
                <br>
                    <select>
                        <option value="#">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="Their Gender">I am looking for a...</label>
                    <br>
                    <select>
                        <option value="#">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <div class="row mt-5 justify-content-center">

                <div class="col-lg-6">
                    <a class="btn btn-primary btn-md" href="http://localhost/MatchMaking1/public/register" role="button">Let's Get Matching &raquo;</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
</div>
<footer class="fixed-bottom">

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
</body>
</html>
