@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Preferences about {{$preferenceCategories->preferenceCategoryName}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form method="POST" action="{{ route('preferences.update', [Auth::user()->id]) }}" id="preferenceForm">
                                @csrf
                                @method('PUT')


                                <div class="form-group row">
                                    <label for="preferenceName" class="col-md-4 col-form-label text-md-right">{{ __('Question: ') }}</label>

                                    <div class="col-md-6">
                                        <input id="preferenceName" type="text" class="form-control{{ $errors->has('preferenceName') ? ' is-invalid' : '' }}" name="preferenceName" value="{{ old('preferenceName', $preferenceName) }}" required disabled>

                                        @if ($errors->has('preferenceName'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('preferenceName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="answer" class="col-md-4 col-form-label text-md-right">{{ __('My Answer') }}</label>

                                    <div class="col-md-6">
                                        <select id="answer" class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" name="answer" required>
                                            @if($userPreference->answer === null)
                                                <option selected value=""></option>
                                            @else
                                                <option selected value="{{ $userPreference->answer }}"></option>
                                            @endif
                                            @if(old('answer'))
                                                    <option selected value="{{ old('answer') }}"></option>
                                                @endif

                                                @if($preferenceTypes->preferenceTypeName=="Normal")
                                                    <option value="0">Not at all</option>
                                                    <option value="1">Ever so slightly</option>
                                                    <option value="2">Slightly</option>
                                                    <option value="3">Mostly</option>
                                                    <option value="4">Very much</option>
                                                    <option value="5">Absolutely</option>
                                                @endif
                                                @if ($preferenceTypes->preferenceTypeName=="Boolean")
                                                    <option value="5">Yes</option>
                                                    <option value="0">No</option>

                                                @endif





                                        </select>
                                        @if ($errors->has('answer'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('answer') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                    <div class="form-group row">
                                        <label for="answerWeight" class="col-md-4 col-form-label text-md-right">{{ __('Importance to me') }}</label>

                                        <div class="col-md-6">
                                            <select id="answerWeight" class="form-control{{ $errors->has('answerWeight') ? ' is-invalid' : '' }}" name="answerWeight" required>
                                                @if($userPreference->answerWeight === null)
                                                    <option selected value=""></option>
                                                    @else
                                                    <option selected value="{{ $userPreference->answerWeight }}"></option>

                                                @endif
                                                @if(old('answerWeight'))
                                                    <option selected value="{{ old('answerWeight') }}"></option>


                                                @endif
                                                @if($preferenceTypes->preferenceTypeName=="Normal")
                                                    <option value="0"> Not at all important to me</option>
                                                    <option value="1"> Ever so slightly important to me</option>
                                                    <option value="2"> Slightly important to me</option>
                                                    <option value="3"> Mostly important to me</option>
                                                    <option value="4"> Very much important to me</option>
                                                    <option value="5"> Absolutely important to me</option>
                                                @endif
                                                @if ($preferenceTypes->preferenceTypeName=="Boolean")
                                                        <option value="5"> Absolutely important to me</option>
                                                        <option value="0"> Not at all important to me</option>

                                                @endif


                                            </select>
                                            @if ($errors->has('answerWeight'))
                                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('answerWeight') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                <div hidden class="form-group row">
                                    <label for="preferenceId" class="col-md-4 col-form-label text-md-right">{{ __('Hidden') }}</label>

                                    <div class="col-md-6">
                                        <input id="preferenceId" type="text" class="form-control{{ $errors->has('preferenceId') ? ' is-invalid' : '' }}" name="preferenceId" value="{{ old('preferenceId', $userPreference->preferenceId) }}" required>

                                        @if ($errors->has('preferenceId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('preferenceId') }}</strong>
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
    </div>
@endsection
