@extends('layouts.app')

@section('content')
<div class="jumbotron-fluid">
    <div class="container inputCard">
        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">{{ __('Welcome') }}</div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="My Gender">I am a...</label>
                                <br>
                                <select>
                                    <option value="#">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                {{--TODO: save choices in session--}}
                                <label for="Their Gender">I am looking for a...</label>
                                <br>
                                <select>
                                    <option value="#">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-5 justify-content-center">

                            <div class="col-lg-6">
                                <a class="btn btn-primary btn-md" href="{{ route('register') }}" role="button">Let's Get Matching &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection