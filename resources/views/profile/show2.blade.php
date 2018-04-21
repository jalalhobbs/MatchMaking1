@extends('layouts.app')
{{--DO NOT DELETE! Daz 20.04.2018--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$user->firstName}}'s Profile</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form method="" action="" id="profileForm">
                                @csrf
                                @method('')






                                <div class="form-group row">
                                    <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName', $user->firstName) }}" required disabled>

                                        @if ($errors->has('firstName'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('firstName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName', $user->lastName) }}" required disabled>

                                        @if ($errors->has('lastName'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('lastName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="profilepicture" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                                    <div class="col-md-6">
                                        @if ($user->profilePicture != null)
                                            <img src="{{ $user->profilePicture }}" alt="Profile Picture for {{$user->firstName}} {{$user->lastName}}" height="150">
                                        @else
                                            <input type="input" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" disabled value="No Image has been added for {{$user->firstName}} {{$user->lastName}}">

                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                                    <div class="col-md-6">
                                        <input id="age" type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ $age }}" required disabled>

                                    @if ($errors->has('age'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('age') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="genderId" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                    <div class="col-md-6">
                                        <select id="genderId" class="form-control{{ $errors->has('genderId') ? ' is-invalid' : '' }}" name="genderId" required disabled>
                                            @if($user->genderId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($genders as $gender)
                                                @if(old('genderId') == $gender->id)
                                                    <option selected value="{{ old('genderId') }}">{{$gender->genderName}}</option>
                                                @elseif($user->genderId == $gender->id)
                                                    <option selected value="{{$user->genderId}}">{{$gender->genderName}}</option>
                                                @else
                                                  <option value="{{$gender->id}}">{{$gender->genderName}}</option>
                                                    @endif
                                           @endforeach
                                      </select>
                                        @if ($errors->has('genderId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('genderId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Stature (cm)') }}</label>

                                    <div class="col-md-6">
                                        <input id="height" type="text" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ old('height', $user->height) }}" required disabled>

                                        @if ($errors->has('height'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('height') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="countryId" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                    <div class="col-md-6">
                                        <select id="countryId" class="form-control{{ $errors->has('countryId') ? ' is-invalid' : '' }}" name="countryId" required disabled>
                                            @if($user->countryId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($countries as $country)

                                                @if(old('countryId') == $country->id)
                                                    <option selected value="{{ old('countryId') }}">{{$country->countryName}}</option>
                                                @elseif($user->countryId == $country->id)
                                                    <option selected value="{{$user->countryId}}">{{$country->countryName}}</option>
                                                @else
                                                    <option value="{{$country->id}}">{{$country->countryName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('countryId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('countryId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ethnicityId" class="col-md-4 col-form-label text-md-right">{{ __('Ethnicity') }}</label>

                                    <div class="col-md-6">
                                        <select id="" class="form-control{{ $errors->has('ethnicityId') ? ' is-invalid' : '' }}" name="ethnicityId" required disabled>
                                            @if($user->ethnicityId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($ethnicities as $ethnicity)

                                                @if(old('ethnicityId') == $ethnicity->id)
                                                    <option selected value="{{ old('ethnicityId') }}">{{$ethnicity->ethnicityName}}</option>
                                                @elseif($user->ethnicityId == $ethnicity->id)
                                                    <option selected value="{{$user->ethnicityId}}">{{$ethnicity->ethnicityName}}</option>
                                                @else
                                                    <option value="{{$ethnicity->id}}">{{$ethnicity->ethnicityName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('ethnicityId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('ethnicityId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="educationId" class="col-md-4 col-form-label text-md-right">{{ __('Education') }}</label>

                                    <div class="col-md-6">
                                        <select id="educationId" class="form-control{{ $errors->has('educationId') ? ' is-invalid' : '' }}" name="educationId" required disabled>
                                            @if($user->educationId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($educations as $education)

                                                @if(old('educationId') == $education->id)
                                                    <option selected value="{{ old('educationId') }}">{{$education->educationName}}</option>
                                                @elseif($user->educationId == $education->id)
                                                    <option selected value="{{$user->educationId}}">{{$education->educationName}}</option>
                                                @else
                                                    <option value="{{$education->id}}">{{$education->educationName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('educationId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('educationId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="bodyTypeId" class="col-md-4 col-form-label text-md-right">{{ __('Body Type') }}</label>


                                    <div class="col-md-6">
                                        <select id="bodyTypeId" class="form-control{{ $errors->has('bodyTypeId') ? ' is-invalid' : '' }}" name="bodyTypeId" required disabled>
                                            @if($user->bodyTypeId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($bodyTypes as $bodyType)
                                                    @if(old('bodyTypeId') == $bodyType->id)
                                                        <option selected value="{{ old('bodyTypeId') }}">{{$bodyType->bodyTypeName}}</option>
                                                    @elseif($user->bodyTypeId == $bodyType->id)
                                                        <option selected value="{{$user->bodyTypeId}}">{{$bodyType->bodyTypeName}}</option>
                                                    @else
                                                        <option value="{{$bodyType->id}}">{{$bodyType->bodyTypeName}}</option>
                                                    @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('bodyTypeId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('bodyTypeId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="religionId" class="col-md-4 col-form-label text-md-right">{{ __('Religion') }}</label>

                                    <div class="col-md-6">
                                        <select id="religionId" class="form-control{{ $errors->has('religionId') ? ' is-invalid' : '' }}" name="religionId" required disabled>
                                            @if($user->religionId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($religions as $religion)

                                                @if(old('religionId') == $religion->id)
                                                    <option selected value="{{ old('religionId') }}">{{$religion->religionName}}</option>
                                                @elseif($user->religionId == $religion->id)
                                                    <option selected value="{{$user->religionId}}">{{$religion->religionName}}</option>
                                                @else
                                                    <option value="{{$religion->id}}">{{$religion->religionName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('religionId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('religionId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="hairColourId" class="col-md-4 col-form-label text-md-right">{{ __('Hair Colour') }}</label>

                                    <div class="col-md-6">
                                        <select id="hairColourId" class="form-control{{ $errors->has('hairColourId') ? ' is-invalid' : '' }}" name="hairColourId" required disabled>
                                            @if($user->hairColourId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($hairColours as $hairColour)

                                                @if(old('hairColourId') == $hairColour->id)
                                                    <option selected value="{{ old('hairColourId') }}">{{$hairColour->hairColourName}}</option>
                                                @elseif($user->hairColourId == $hairColour->id)
                                                    <option selected value="{{$user->hairColourId}}">{{$hairColour->hairColourName}}</option>
                                                @else
                                                    <option value="{{$hairColour->id}}">{{$hairColour->hairColourName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('hairColourId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('hairColourId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="eyeColourId" class="col-md-4 col-form-label text-md-right">{{ __('Eye Colour') }}</label>

                                    <div class="col-md-6">
                                        <select id="eyeColourId" class="form-control{{ $errors->has('eyeColourId') ? ' is-invalid' : '' }}" name="eyeColourId" required disabled>
                                            @if($user->eyeColourId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($eyeColours as $eyeColour)

                                                @if(old('eyeColourId') == $eyeColour->id)
                                                    <option selected value="{{ old('eyeColourId') }}">{{$eyeColour->eyeColourName}}</option>
                                                @elseif($user->eyeColourId == $eyeColour->id)
                                                    <option selected value="{{$user->eyeColourId}}">{{$eyeColour->eyeColourName}}</option>
                                                @else
                                                    <option value="{{$eyeColour->id}}">{{$eyeColour->eyeColourName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('eyeColourId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('eyeColourId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="drinkingId" class="col-md-4 col-form-label text-md-right">{{ __('Drinking') }}</label>

                                    <div class="col-md-6">
                                        <select id="drinkingId" class="form-control{{ $errors->has('drinkingId') ? ' is-invalid' : '' }}" name="drinkingId" required disabled>
                                            @if($user->drinkingId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($drinkings as $drinking)

                                                @if(old('eyeColourId') == $drinking->id)
                                                    <option selected value="{{ old('eyeColourId') }}">{{$drinking->drinkingPrefName}}</option>
                                                @elseif($user->drinkingId == $drinking->id)
                                                    <option selected value="{{$user->drinkingId}}">{{$drinking->drinkingPrefName}}</option>
                                                @else
                                                    <option value="{{$drinking->id}}">{{$drinking->drinkingPrefName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('drinkingId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('drinkingId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="smokingId" class="col-md-4 col-form-label text-md-right">{{ __('Smoking') }}</label>

                                    <div class="col-md-6">
                                        <select id="smokingId" class="form-control{{ $errors->has('smokingId') ? ' is-invalid' : '' }}" name="smokingId" required disabled>
                                            @if($user->smokingId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($smokings as $smoking)

                                                @if(old('eyeColourId') == $smoking->id)
                                                    <option selected value="{{ old('smokingId') }}">{{$smoking->smokingPrefName}}</option>
                                                @elseif($user->smokingId == $smoking->id)
                                                    <option selected value="{{$user->smokingId}}">{{$smoking->smokingPrefName}}</option>
                                                @else
                                                    <option value="{{$smoking->id}}">{{$smoking->smokingPrefName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('smokingId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('smokingId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="leisureId" class="col-md-4 col-form-label text-md-right">{{ __('Leisure') }}</label>

                                    <div class="col-md-6">
                                        <select id="leisureId" class="form-control{{ $errors->has('leisureId') ? ' is-invalid' : '' }}" name="leisureId" required disabled>
                                            @if($user->leisureId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($leisures as $leisure)

                                                @if(old('leisureId') == $leisure->id)
                                                    <option selected value="{{ old('leisureId') }}">{{$leisure->leisureName}}</option>
                                                @elseif($user->leisureId == $leisure->id)
                                                    <option selected value="{{$user->leisureId}}">{{$leisure->leisureName}}</option>
                                                @else
                                                    <option value="{{$leisure->id}}">{{$leisure->leisureName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('leisureId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('leisureId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="personalityTypeId" class="col-md-4 col-form-label text-md-right">{{ __('Personality Type') }}</label>

                                    <div class="col-md-6">
                                        <select id="personalityTypeId" class="form-control{{ $errors->has('personalityTypeId') ? ' is-invalid' : '' }}" name="personalityTypeId" required disabled>
                                            @if($user->personalityTypeId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($personalityTypes as $personalityType)

                                                @if(old('personalityTypeId') == $personalityType->id)
                                                    <option selected value="{{ old('personalityTypeId') }}">{{$personalityType->personalityTypeName}}</option>
                                                @elseif($user->personalityTypeId == $personalityType->id)
                                                    <option selected value="{{$user->personalityTypeId}}">{{$personalityType->personalityTypeName}}</option>
                                                @else
                                                    <option value="{{$personalityType->id}}">{{$personalityType->personalityTypeName}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                        @if ($errors->has('personalityTypeId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('personalityTypeId') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>





                            </form>






                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
