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

                                <!-- remove this with foreach once db is ready -->
                                @for ($x = 0; $x <= 7; $x++)

                                    <div class="col-sm-6 col-sm-4 col-lg-3">
                                        <div class="thumbnail">
                                            <h3>Title</h3>
                                                <img src="http://placehold.it/350x180">
                                                <div class="caption">

                                                    <p class="flex-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur op!</p>
                                                    <p><a class="btn btn-primary" href="#">Link</a></p>
                                                </div>
                                                <!-- /.caption -->
                                        </div>
                                        <!-- /.thumbnail -->
                                    </div>
                                @endfor

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














































































