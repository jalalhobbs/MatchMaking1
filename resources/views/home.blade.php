@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$pageName}}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="text-center .ml-1">
                            <h3>Welcome {{ Auth::user()->firstName }}!</h3>
                        </div>
                        <div class="container">
                            <div class="flex-row row" id="profiles">
                                @if(isset($matches))
                                    @foreach($matches as $match)
                                        @component('profile-card', ['firstName' => isset($match->firstName) ? $match->firstName : false,
                                                                    'profilePic' => isset($match->profilePicture) ? $match->profilePicture : false,
                                                                    'age' => isset($match->age) ? $match->age : false,
                                                                    'userId' => isset($match->id) ? $match->id : false,
                                                                    'likeStatus' => isset($match->likeStatus) ? $match->likeStatus : false,
                                                                    'gender' => isset($match->genderName) ? $match->genderName : false,
                                                                    'bodyTypeName' => isset($match->bodyTypeName) ? $match->bodyTypeName : false,
                                                                    'email' => isset($match->email) ? $match->email : false,
                                                                    'countryName' => isset($match->countryName) ? $match->countryName : false,
                                                                    'ethnicityName' => isset($match->ethnicityName) ? $match->ethnicityName : false,
                                                                    'educationName' => isset($match->educationName) ? $match->educationName : false,
                                                                    'religionName' => isset($match->religionName) ? $match->religionName : false,
                                                                    'hairColourName' => isset($match->hairColourName) ? $match->hairColourName : false,
                                                                    'eyeColourName' => isset($match->eyeColourName) ? $match->eyeColourName : false,
                                                                    'drinkingPrefName' => isset($match->drinkingPrefName) ? $match->drinkingPrefName : false,
                                                                    'smokingPrefName' => isset($match->smokingPrefName) ? $match->smokingPrefName : false,
                                                                    'leisureName' => isset($match->leisureName) ? $match->leisureName : false,
                                                                    'personalityTypeName' => isset($match->personalityTypeName) ? $match->personalityTypeName : false,
                                                                    'stature' => isset($match->stature) ? $match->stature : false
                                                                    ]
                                        )
                                        @endcomponent
                                    @endforeach
                                @endif
                            </div>
                            <!-- /.flex-row  -->
                        </div>
                        <!-- /.container  -->
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection














































































