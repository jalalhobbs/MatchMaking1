@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">I'm Looking For Someone.....</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form method="POST" action="{{ route('looking-for.update', [Auth::user()->id]) }}" id="constraintForm">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="targetGenderId" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetGenderId" class="form-control{{ $errors->has('targetGenderId') ? ' is-invalid' : '' }}" name="targetGenderId">
                                            @if($user->targetGenderId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($genders as $gender)
                                                @if(old('targetGenderId') == $gender->id)
                                                    <option selected value="{{ old('targetGenderId') }}">{{$gender->genderName}}</option>
                                                @elseif($user->targetGenderId == $gender->id)
                                                    <option selected value="{{$user->targetGenderId}}">{{$gender->genderName}}</option>
                                                    <option value=""></option>
                                                @else
                                                    @if(session('targetGenderId')== $gender->id)
                                                        <option selected value="{{session('targetGenderId')}}">{{$gender->genderName}}</option>
                                                    @else
                                                        <option value="{{$gender->id}}">{{$gender->genderName}}</option>
                                                        @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetGenderId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetGenderId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="targetMinAge" class="col-md-4 col-form-label text-md-right">{{ __('Minimum Age') }}</label>

                                    <div class="col-md-6">
                                        <input id="targetMinAge" type="text" class="form-control{{ $errors->has('targetMinAge') ? ' is-invalid' : '' }}" name="targetMinAge" value="{{ old('targetMinAge', $user->targetMinAge) }}">

                                        @if ($errors->has('targetMinAge'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetMinAge') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="targetMaxAge" class="col-md-4 col-form-label text-md-right">{{ __('Maximum Age') }}</label>

                                    <div class="col-md-6">
                                        <input id="targetMaxAge" type="text" class="form-control{{ $errors->has('targetMaxAge') ? ' is-invalid' : '' }}" name="targetMaxAge" value="{{ old('targetMaxAge', $user->targetMaxAge) }}">

                                        @if ($errors->has('targetMaxAge'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetMaxAge') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="targetCountryId" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetCountryId" class="form-control{{ $errors->has('targetCountryId') ? ' is-invalid' : '' }}" name="targetCountryId">
                                            @if($user->targetCountryId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($countries as $country)

                                                @if(old('targetCountryId') == $country->id)
                                                    <option selected value="{{ old('targetCountryId') }}">{{$country->countryName}}</option>
                                                @elseif($user->targetCountryId == $country->id)
                                                    <option selected value="{{$user->targetCountryId}}">{{$country->countryName}}</option>
                                                    <option value=""></option>
                                                @else
                                                    <option value="{{$country->id}}">{{$country->countryName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetCountryId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetCountryId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="targetEthnicityId" class="col-md-4 col-form-label text-md-right">{{ __('Ethnicity') }}</label>

                                    <div class="col-md-6">
                                        <select id="" class="form-control{{ $errors->has('targetEthnicityId') ? ' is-invalid' : '' }}" name="targetEthnicityId">
                                            @if($user->targetEthnicityId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($ethnicities as $ethnicity)

                                                @if(old('targetEthnicityId') == $ethnicity->id)
                                                    <option selected value="{{ old('targetEthnicityId') }}">{{$ethnicity->ethnicityName}}</option>
                                                @elseif($user->targetEthnicityId == $ethnicity->id)
                                                    <option selected value="{{$user->targetEthnicityId}}">{{$ethnicity->ethnicityName}}</option>
                                                    <option value=""></option>
                                                @else
                                                    <option value="{{$ethnicity->id}}">{{$ethnicity->ethnicityName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetEthnicityId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetEthnicityId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="targetMinHeight" class="col-md-4 col-form-label text-md-right">{{ __('Minimum Height (cm)') }}</label>

                                    <div class="col-md-6">
                                        <input id="targetMinHeight" type="text" class="form-control{{ $errors->has('targetMinHeight') ? ' is-invalid' : '' }}" name="targetMinHeight" value="{{ old('targetMinHeight', $user->targetMinHeight) }}">

                                        @if ($errors->has('targetMinHeight'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetMinHeight') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="targetMaxHeight" class="col-md-4 col-form-label text-md-right">{{ __('Maximum Height (cm)') }}</label>

                                    <div class="col-md-6">
                                        <input id="targetMaxHeight" type="text" class="form-control{{ $errors->has('targetMaxHeight') ? ' is-invalid' : '' }}" name="targetMaxHeight" value="{{ old('targetMaxHeight', $user->targetMaxHeight) }}">

                                        @if ($errors->has('targetMaxHeight'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetMaxHeight') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="targetBodyTypeId" class="col-md-4 col-form-label text-md-right">{{ __('Ideal Body Type') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetBodyTypeId" class="form-control{{ $errors->has('targetBodyTypeId') ? ' is-invalid' : '' }}" name="targetBodyTypeId">
                                            @if($user->targetBodyTypeId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($bodyTypes as $bodyType)
                                                    @if(old('targetBodyTypeId') == $bodyType->id)
                                                        <option selected value="{{ old('targetBodyTypeId') }}">{{$bodyType->bodyTypeName}}</option>
                                                    @elseif($user->targetBodyTypeId == $bodyType->id)
                                                        <option selected value="{{$user->targetBodyTypeId}}">{{$bodyType->bodyTypeName}}</option>
                                                        <option value=""></option>
                                                    @else
                                                        <option value="{{$bodyType->id}}">{{$bodyType->bodyTypeName}}</option>
                                                    @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetBodyTypeId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetBodyTypeId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="targetEducationId" class="col-md-4 col-form-label text-md-right">{{ __('Education') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetEducationId" class="form-control{{ $errors->has('targetEducationId') ? ' is-invalid' : '' }}" name="targetEducationId">
                                            @if($user->targetEducationId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($educations as $education)

                                                @if(old('targetEducationId') == $education->id)
                                                    <option selected value="{{ old('targetEducationId') }}">{{$education->educationName}}</option>
                                                @elseif($user->targetEducationId == $education->id)
                                                    <option selected value="{{$user->targetEducationId}}">{{$education->educationName}}</option>
                                                    <option value=""></option>
                                                @else
                                                    <option value="{{$education->id}}">{{$education->educationName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetEducationId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetEducationId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="targetReligionId" class="col-md-4 col-form-label text-md-right">{{ __('Religion') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetReligionId" class="form-control{{ $errors->has('targetReligionId') ? ' is-invalid' : '' }}" name="targetReligionId">
                                            @if($user->targetReligionId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($religions as $religion)

                                                @if(old('targetReligionId') == $religion->id)
                                                    <option selected value="{{ old('targetReligionId') }}">{{$religion->religionName}}</option>
                                                @elseif($user->targetReligionId == $religion->id)
                                                    <option selected value="{{$user->targetReligionId}}">{{$religion->religionName}}</option>
                                                    <option value=""></option>
                                                @else
                                                    <option value="{{$religion->id}}">{{$religion->religionName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetReligionId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetReligionId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="targetHairColourId" class="col-md-4 col-form-label text-md-right">{{ __('Hair Colour') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetHairColourId" class="form-control{{ $errors->has('targetHairColourId') ? ' is-invalid' : '' }}" name="targetHairColourId">
                                            @if($user->targetHairColourId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($hairColours as $hairColour)

                                                @if(old('targetHairColourId') == $hairColour->id)
                                                    <option selected value="{{ old('targetHairColourId') }}">{{$hairColour->hairColourName}}</option>
                                                @elseif($user->targetHairColourId == $hairColour->id)
                                                    <option selected value="{{$user->targetHairColourId}}">{{$hairColour->hairColourName}}</option>
                                                    <option value=""></option>
                                                @else
                                                    <option value="{{$hairColour->id}}">{{$hairColour->hairColourName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetHairColourId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetHairColourId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="targetEyeColourId" class="col-md-4 col-form-label text-md-right">{{ __('Eye Colour') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetEyeColourId" class="form-control{{ $errors->has('targetEyeColourId') ? ' is-invalid' : '' }}" name="targetEyeColourId">
                                            @if($user->targetEyeColourId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($eyeColours as $eyeColour)

                                                @if(old('targetEyeColourId') == $eyeColour->id)
                                                    <option selected value="{{ old('targetEyeColourId') }}">{{$eyeColour->eyeColourName}}</option>
                                                @elseif($user->targetEyeColourId == $eyeColour->id)
                                                    <option selected value="{{$user->targetEyeColourId}}">{{$eyeColour->eyeColourName}}</option>
                                                    <option value=""></option>
                                                @else
                                                    <option value="{{$eyeColour->id}}">{{$eyeColour->eyeColourName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetEyeColourId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetEyeColourId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="targetDrinkingId" class="col-md-4 col-form-label text-md-right">{{ __('Drinking') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetDrinkingId" class="form-control{{ $errors->has('targetDrinkingId') ? ' is-invalid' : '' }}" name="targetDrinkingId">
                                            @if($user->targetDrinkingId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($drinkings as $drinking)

                                                @if(old('targetDrinkingId') == $drinking->id)
                                                    <option selected value="{{ old('targetDrinkingId') }}">{{$drinking->drinkingPrefName}}</option>
                                                @elseif($user->targetDrinkingId == $drinking->id)
                                                    <option selected value="{{$user->targetDrinkingId}}">{{$drinking->drinkingPrefName}}</option>
                                                    <option value=""></option>
                                                @else
                                                    <option value="{{$drinking->id}}">{{$drinking->drinkingPrefName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetDrinkingId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetDrinkingId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="targetSmokingId" class="col-md-4 col-form-label text-md-right">{{ __('Smoking') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetSmokingId" class="form-control{{ $errors->has('targetSmokingId') ? ' is-invalid' : '' }}" name="targetSmokingId">
                                            @if($user->targetSmokingId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($smokings as $smoking)

                                                @if(old('targetSmokingId') == $smoking->id)
                                                    <option selected value="{{ old('targetSmokingId') }}">{{$smoking->smokingPrefName}}</option>
                                                @elseif($user->targetSmokingId == $smoking->id)
                                                    <option selected value="{{$user->targetSmokingId}}">{{$smoking->smokingPrefName}}</option>
                                                    <option value=""></option>
                                                @else
                                                    <option value="{{$smoking->id}}">{{$smoking->smokingPrefName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetSmokingId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetSmokingId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="targetLeisureId" class="col-md-4 col-form-label text-md-right">{{ __('Leisure time description') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetLeisureId" class="form-control{{ $errors->has('targetLeisureId') ? ' is-invalid' : '' }}" name="targetLeisureId">
                                            @if($user->targetLeisureId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($leisures as $leisure)

                                                @if(old('targetLeisureId') == $leisure->id)
                                                    <option selected value="{{ old('targetLeisureId') }}">{{$leisure->leisureName}}</option>
                                                @elseif($user->targetLeisureId == $leisure->id)
                                                    <option selected value="{{$user->targetLeisureId}}">{{$leisure->leisureName}}</option>
                                                    <option value=""></option>
                                                @else
                                                    <option value="{{$leisure->id}}">{{$leisure->leisureName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetLeisureId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetLeisureId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="targetPersonalityTypeId" class="col-md-4 col-form-label text-md-right">{{ __('Personality type') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetPersonalityTypeId" class="form-control{{ $errors->has('targetPersonalityTypeId') ? ' is-invalid' : '' }}" name="targetPersonalityTypeId">
                                            @if($user->targetPersonalityTypeId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($personalityTypes as $personalityType)

                                                @if(old('targetPersonalityTypeId') == $personalityType->id)
                                                    <option selected value="{{ old('targetPersonalityTypeId') }}">{{$personalityType->personalityTypeName}}</option>
                                                @elseif($user->targetPersonalityTypeId == $personalityType->id)
                                                    <option selected value="{{$user->targetPersonalityTypeId}}">{{$personalityType->personalityTypeName}}</option>
                                                    <option value=""></option>
                                                @else
                                                    <option value="{{$personalityType->id}}">{{$personalityType->personalityTypeName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetPersonalityTypeId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetPersonalityTypeId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4 text-md-right">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Confirm') }}
                                        </button>
                                    </div>
                                </div>


                            </form>






                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
