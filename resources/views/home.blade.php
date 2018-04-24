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
                            <div class="flex-row row">
                                @if($matches)
                                    @foreach($matches as $match)
                                        @component('profile-card', ['firstName' => $match->firstName,
                                                                    'profilePic' => $match->profilePicture,
                                                                    'age' => $match->age,
                                                                    'userId' => $match->id,
                                                                    'likeStatus' => $match->likeStatus,
                                                                    'gender' => $match->genderName,
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














































































