@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Home</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome {{ Auth::user()->firstName }}!
                        <div class="container">
                            <div class="flex-row row">
                                @if($potentialMatches)
                                    @foreach($potentialMatches as $potentialMatch)
                                        @component('profile-card', ['firstName' => $potentialMatch->firstName,
                                                                    'profilePic' => $potentialMatch->profilePicture,
                                                                    'dob' => $potentialMatch->dob,
                                                                    'userId' => $potentialMatch->id,
                                                                    'likeStatus' => $potentialMatch->likeStatus,
                                                                    'gender' => $potentialMatch->genderName])
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














































































