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
                        <div class="text-center .ml-1">
                            <h3>Welcome {{ Auth::user()->firstName }}!</h3>
                        </div>
                        <div class="container">
                            <div class="flex-row row">
                                <ul><li></ul><p><strong>How do I get someone's email address? </strong> </p>
                                <p>&nbsp;&nbsp;&nbsp;If you both like eachother, their email address will be listed under the Matches link</p>
                                </li>
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