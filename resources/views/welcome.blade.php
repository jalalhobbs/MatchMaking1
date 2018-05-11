@extends('layouts.app')

@section('content')
<div class="jumbotron-fluid">
    <div class="container inputCard">
        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">{{ __('Welcome') }}</div>
                    <div class="card-body">

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('welcomeGender') }}" id="welcomeForm">
                                @csrf
                                @method('POST')



                                <div class="form-group row">
                                    <label for="genderId" class="col-md-6 col-form-label text-md-left">{{ __('I am a...') }}</label>
                                    <label for="targetGenderId" class="col-md-6 col-form-label text-md-left">{{ __('I am looking for a...') }}</label>

                                </div>


                                <div class="form-group row">



                                    <div class="col-md-6">



                                        <select id="genderId" class="form-control{{ $errors->has('genderId') ? ' is-invalid' : '' }}" name="genderId">

                                            <option value=""> Select </option>


                                            @foreach($genders as $gender)

                                                <option value="{{$gender->id}}">{{$gender->genderName}}</option>

                                            @endforeach
                                        </select>
                                        @if ($errors->has('genderId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('genderId') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">


                                        <select id="targetGenderId" class="form-control{{ $errors->has('targetGenderId') ? ' is-invalid' : '' }}" name="targetGenderId">

                                            <option value=""> Select </option>


                                            @foreach($genders as $gender)

                                                <option value="{{$gender->id}}">{{$gender->genderName}}</option>

                                            @endforeach
                                        </select>
                                        @if ($errors->has('targetGenderId'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('targetGenderId') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-3 text-md-center">
                                        <button type="submit" class="btn btn-primary">
                                            Let's Get Matching &raquo;
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