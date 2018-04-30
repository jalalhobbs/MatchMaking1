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
                    Welcome {{ Auth::user()->firstName }}!
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
                                                                    'bodyType' => isset($match->bodyType) ? $match->bodyType : false,
                                                                    'email' => isset($match->email) ? $match->email : false
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














































































