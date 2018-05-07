<div class="col-sm-6 col-sm-4 col-lg-3">
    <div class="thumbnail">
        <h4>Name: {{ $firstName }}</h4>
        <p class="flex-text"> </p>
        <img src={{$profilePic}}>
        <div class="caption">
            <p class="flex-text"> </p>
            <div class="text-center .ml-1">
                <h6>Gender: {{$gender}}</h6>
                <h6>Age: {{$age}}</h6>
                @if($bodyTypeName)
                    <h6>Body Type: {{$bodyTypeName}}</h6>
                @endif
                @if($email)
                    <h6>Email: {{$email}}</h6>
                @endif
            </div>

            <form action="updateLikeStatus" method="post" data-userid="{{$userId}}">
                {{ csrf_field() }}

                <input type="hidden" name="targetId" value="{{$userId}}">
                <div class="btn-group btn-group-toggle text-center col-12" data-toggle="buttons">

                    <label class="btn btn-dislike @if ($likeStatus == 0) active @endif col-5">
                        <input type="radio" autocomplete="off" checked> Dislike
                    </label>

                    <label class="btn btn-no-like-status @if ($likeStatus == 1) active @endif col-2">
                        <input type="radio" autocomplete="off">
                    </label>

                    <label class="btn btn-like @if ($likeStatus == 2) active @endif col-5">
                        <input type="radio" autocomplete="off"> Like
                    </label>

                </div>
            </form>

            <button type="button" class="btn btn-info mt-4 col-12" data-toggle="modal" data-target="#myModal{{$userId}}">More Info</button>

            <!-- Modal -->
            <div id="myModal{{$userId}}" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Name: {{ $firstName }}</h4>
                            <button type="button"  data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="thumbnail">
                                        <img src="{{$profilePic}}" alt="{{ $firstName }}" class="center" style="width:40%; margin:0 auto">
                                </div>
                            </div>

                        </div>
                        <div class="modal-body">

                            <div class="col-lg-12">

                                    <div class="form-group row">
                                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                        <div class="col-md-6">
                                            <input id="gender" type="text" class="form-control" name="gender" value="{{$gender}}" required disabled>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                                        <div class="col-md-6">
                                            <input id="age" type="text" class="form-control" name="age" value="{{ $age }}" required disabled>
                                        </div>
                                    </div>

                                    @if($bodyTypeName)
                                    <div class="form-group row">
                                        <label for="bodyTypeName" class="col-md-4 col-form-label text-md-right">{{ __('Body Type') }}</label>

                                        <div class="col-md-6">
                                            <input id="bodyTypeName" type="text" class="form-control" name="BodyTypeName" value="{{ $bodyTypeName }}" required disabled>
                                        </div>
                                    </div>
                                    @endif
                                @if($stature)
                                    <div class="form-group row">
                                        <label for="stature" class="col-md-4 col-form-label text-md-right">{{ __('Stature') }}</label>

                                        <div class="col-md-6">
                                            <input id="stature" type="text" class="form-control" name="Stature" value="{{ $stature }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                @if($countryName)
                                    <div class="form-group row">
                                        <label for="countryName" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                        <div class="col-md-6">
                                            <input id="countryName" type="text" class="form-control" name="countryName" value="{{ $countryName }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                @if($ethnicityName)
                                    <div class="form-group row">
                                        <label for="ethnicityName" class="col-md-4 col-form-label text-md-right">{{ __('Ethnicity') }}</label>

                                        <div class="col-md-6">
                                            <input id="ethnicityName" type="text" class="form-control" name="ethnicityName" value="{{ $ethnicityName }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                @if($educationName)
                                    <div class="form-group row">
                                        <label for="educationName" class="col-md-4 col-form-label text-md-right">{{ __('Education') }}</label>

                                        <div class="col-md-6">
                                            <input id="educationName" type="text" class="form-control" name="educationName" value="{{ $educationName }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                @if($religionName)
                                    <div class="form-group row">
                                        <label for="ReligionName" class="col-md-4 col-form-label text-md-right">{{ __('Religion') }}</label>

                                        <div class="col-md-6">
                                            <input id="ReligionName" type="text" class="form-control" name="ReligionName" value="{{ $religionName }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                @if($hairColourName)
                                    <div class="form-group row">
                                        <label for="HairColourName" class="col-md-4 col-form-label text-md-right">{{ __('Hair Colour') }}</label>

                                        <div class="col-md-6">
                                            <input id="HairColourName" type="text" class="form-control" name="HairColourName" value="{{ $hairColourName }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                @if($eyeColourName)
                                    <div class="form-group row">
                                        <label for="eyeColourName" class="col-md-4 col-form-label text-md-right">{{ __('Eye Colour') }}</label>

                                        <div class="col-md-6">
                                            <input id="eyeColourName" type="text" class="form-control" name="eyeColourName" value="{{ $eyeColourName }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                @if($drinkingPrefName)
                                    <div class="form-group row">
                                        <label for="drinkingPrefName" class="col-md-4 col-form-label text-md-right">{{ __('Drinking') }}</label>

                                        <div class="col-md-6">
                                            <input id="drinkingPrefName" type="text" class="form-control" name="drinkingPrefName" value="{{ $drinkingPrefName }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                @if($smokingPrefName)
                                    <div class="form-group row">
                                        <label for="smokingPrefName" class="col-md-4 col-form-label text-md-right">{{ __('Smoking') }}</label>

                                        <div class="col-md-6">
                                            <input id="smokingPrefName" type="text" class="form-control" name="smokingPrefName" value="{{ $smokingPrefName }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                @if($leisureName)
                                    <div class="form-group row">
                                        <label for="leisureName" class="col-md-4 col-form-label text-md-right">{{ __('Leisure') }}</label>

                                        <div class="col-md-6">
                                            <input id="leisureName" type="text" class="form-control" name="leisureName" value="{{ $leisureName }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                @if($personalityTypeName)
                                    <div class="form-group row">
                                        <label for="personalityTypeName" class="col-md-4 col-form-label text-md-right">{{ __('Personality') }}</label>

                                        <div class="col-md-6">
                                            <input id="personalityTypeName" type="text" class="form-control" name="personalityTypeName" value="{{ $personalityTypeName }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                @if($email)
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                        <div class="col-md-6">
                                            <input id="bodyTypeName" type="text" class="form-control" name="Email" value="{{ $email }}" required disabled>
                                        </div>
                                    </div>
                                @endif
                                <form action="updateLikeStatus" method="post" data-userid="{{$userId}}">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="targetId" value="{{$userId}}">
                                    <div class="btn-group btn-group-toggle text-center col-12" data-toggle="buttons">

                                        <label class="btn btn-dislike @if ($likeStatus == 0) active @endif col-5">
                                            <input type="radio" autocomplete="off" checked> Dislike
                                        </label>

                                        <label class="btn btn-no-like-status @if ($likeStatus == 1) active @endif col-2">
                                            <input type="radio" autocomplete="off">
                                        </label>

                                        <label class="btn btn-like @if ($likeStatus == 2) active @endif col-5">
                                            <input type="radio" autocomplete="off"> Like
                                        </label>

                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.caption -->
    </div>
    <!-- /.thumbnail -->
</div>
{{--<script>--}}
{{--$('input[name=likeStatus{{$userId}}]').change(function() {--}}
{{--$('form').submit();--}}
{{--return false;--}}
{{--});--}}
{{--</script>--}}