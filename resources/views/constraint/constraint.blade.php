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
                                            @if($user->targetGenderId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($genders as $gender)
                                                @if(old('targetGenderId') == $gender->id)
                                                    <option selected value="{{ old('targetGenderId') }}">{{$gender->genderName}}</option>
                                                @elseif($user->targetGenderId == $gender->id)
                                                    <option selected value="{{$user->targetGenderId}}">{{$gender->genderName}}</option>
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
                                        <input id="targetMinAge" type="text" class="form-control{{ $errors->has('targetMinAge') ? ' is-invalid' : '' }}" name="targetMinAge" value="{{ old('targetMinAge', $user->targetMinAge) }}" required>

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
                                        <input id="targetMaxAge" type="text" class="form-control{{ $errors->has('targetMaxAge') ? ' is-invalid' : '' }}" name="targetMaxAge" value="{{ old('targetMaxAge', $user->targetMaxAge) }}" required>

                                        @if ($errors->has('targetMaxAge'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetMaxAge') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="targetMinHeight" class="col-md-4 col-form-label text-md-right">{{ __('Minimum Height (cm)') }}</label>

                                    <div class="col-md-6">
                                        <input id="targetMinHeight" type="text" class="form-control{{ $errors->has('targetMinHeight') ? ' is-invalid' : '' }}" name="targetMinHeight" value="{{ old('targetMinHeight', $user->targetMinHeight) }}" required>

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
                                        <input id="targetMaxHeight" type="text" class="form-control{{ $errors->has('targetMaxHeight') ? ' is-invalid' : '' }}" name="targetMaxHeight" value="{{ old('targetMaxHeight', $user->targetMaxHeight) }}" required>

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
                                            @if($user->targetBodyTypeId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($bodyTypes as $bodyType)
                                                    @if(old('targetBodyTypeId') == $bodyType->id)
                                                        <option selected value="{{ old('targetBodyTypeId') }}">{{$bodyType->bodyTypeName}}</option>
                                                    @elseif($user->targetBodyTypeId == $bodyType->id)
                                                        <option selected value="{{$user->targetBodyTypeId}}">{{$bodyType->bodyTypeName}}</option>
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
                                            @if($user->targetReligionId === null)
                                                <option selected value=""></option>
                                            @endif
                                            @foreach($religions as $religion)

                                                @if(old('targetReligionId') == $religion->id)
                                                    <option selected value="{{ old('targetReligionId') }}">{{$religion->religionName}}</option>
                                                @elseif($user->targetReligionId == $religion->id)
                                                    <option selected value="{{$user->targetReligionId}}">{{$religion->religionName}}</option>
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
