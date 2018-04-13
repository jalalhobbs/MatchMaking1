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
                                        <select id="targetGenderId" class="form-control{{ $errors->has('targetGenderId') ? ' is-invalid' : '' }}" name="targetGenderId" required>
                                            @if($userTargets->targetGenderId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($genders as $gender)
                                                @if(old('targetGenderId') == $gender->id)
                                                    <option selected value="{{ old('targetGenderId') }}">{{$gender->genderName}}</option>
                                                @elseif($userTargets->targetGenderId == $gender->id)
                                                    <option selected value="{{$userTargets->targetGenderId}}">{{$gender->genderName}}</option>
                                                @else
                                                    <option value="{{$gender->id}}">{{$gender->genderName}}</option>
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
                                        <input id="targetMinAge" type="text" class="form-control{{ $errors->has('targetMinAge') ? ' is-invalid' : '' }}" name="targetMinAge" value="{{ old('targetMinAge', $userTargets->targetMinAge) }}" required>

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
                                        <input id="targetMaxAge" type="text" class="form-control{{ $errors->has('targetMaxAge') ? ' is-invalid' : '' }}" name="targetMaxAge" value="{{ old('targetMaxAge', $userTargets->targetMaxAge) }}" required>

                                        @if ($errors->has('targetMaxAge'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetMaxAge') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="targetCountryId" class="col-md-4 col-form-label text-md-right">{{ __('Country of Lover') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetCountryId" class="form-control{{ $errors->has('targetCountryId') ? ' is-invalid' : '' }}" name="targetCountryId" required>
                                            @if($userTargets->targetCountryId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($countries as $country)

                                                @if(old('targetCountryId') == $country->id)
                                                    <option selected value="{{ old('targetCountryId') }}">{{$country->countryName}}</option>
                                                @elseif($userTargets->targetCountryId == $country->id)
                                                    <option selected value="{{$userTargets->targetCountryId}}">{{$country->countryName}}</option>
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
                                    <label for="targetEthnicityId" class="col-md-4 col-form-label text-md-right">{{ __('Ethnicity of Lover') }}</label>

                                    <div class="col-md-6">
                                        <select id="" class="form-control{{ $errors->has('targetEthnicityId') ? ' is-invalid' : '' }}" name="targetEthnicityId" required>
                                            @if($userTargets->targetEthnicityId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($ethnicities as $ethnicity)

                                                @if(old('targetEthnicityId') == $ethnicity->id)
                                                    <option selected value="{{ old('targetEthnicityId') }}">{{$ethnicity->ethnicityName}}</option>
                                                @elseif($userTargets->targetEthnicityId == $ethnicity->id)
                                                    <option selected value="{{$userTargets->targetEthnicityId}}">{{$ethnicity->ethnicityName}}</option>
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
                                        <input id="targetMinHeight" type="text" class="form-control{{ $errors->has('targetMinHeight') ? ' is-invalid' : '' }}" name="targetMinHeight" value="{{ old('targetMinHeight', $userTargets->targetMinHeight) }}" required>

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
                                        <input id="targetMaxHeight" type="text" class="form-control{{ $errors->has('targetMaxHeight') ? ' is-invalid' : '' }}" name="targetMaxHeight" value="{{ old('targetMaxHeight', $userTargets->targetMaxHeight) }}" required>

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
                                        <select id="targetBodyTypeId" class="form-control{{ $errors->has('targetBodyTypeId') ? ' is-invalid' : '' }}" name="targetBodyTypeId" required>
                                            @if($userTargets->targetBodyTypeId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($bodyTypes as $bodyType)
                                                    @if(old('targetBodyTypeId') == $bodyType->id)
                                                        <option selected value="{{ old('targetBodyTypeId') }}">{{$bodyType->bodyTypeName}}</option>
                                                    @elseif($userTargets->targetBodyTypeId == $bodyType->id)
                                                        <option selected value="{{$userTargets->targetBodyTypeId}}">{{$bodyType->bodyTypeName}}</option>
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
                                    <label for="targetReligionId" class="col-md-4 col-form-label text-md-right">{{ __('Religion of Lover') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetReligionId" class="form-control{{ $errors->has('targetReligionId') ? ' is-invalid' : '' }}" name="targetReligionId" required>
                                            @if($userTargets->targetReligionId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($religions as $religion)

                                                @if(old('targetReligionId') == $religion->id)
                                                    <option selected value="{{ old('targetReligionId') }}">{{$religion->religionName}}</option>
                                                @elseif($userTargets->targetReligionId == $religion->id)
                                                    <option selected value="{{$userTargets->targetReligionId}}">{{$religion->religionName}}</option>
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
                                    <label for="targetHairColourId" class="col-md-4 col-form-label text-md-right">{{ __('Hair Colour of Lover') }}</label>

                                    <div class="col-md-6">
                                        <select id="targetHairColourId" class="form-control{{ $errors->has('targetHairColourId') ? ' is-invalid' : '' }}" name="targetHairColourId" required>
                                            @if($userTargets->targetHairColourId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($hairColours as $hairColour)

                                                @if(old('targetHairColourId') == $hairColour->id)
                                                    <option selected value="{{ old('targetHairColourId') }}">{{$hairColour->hairColourName}}</option>
                                                @elseif($userTargets->targetHairColourId == $hairColour->id)
                                                    <option selected value="{{$userTargets->targetHairColourId}}">{{$hairColour->hairColourName}}</option>
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
