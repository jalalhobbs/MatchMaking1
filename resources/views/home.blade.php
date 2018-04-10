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


                                <div class="col-sm-6 col-sm-4 col-lg-3">
                                    <div class="thumbnail">
                                        <h3>Title</h3>
                                            <img src="http://placehold.it/350x180">
                                            <div class="caption">

                                                <p class="flex-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur optio ipsa fuga vel repudiandae impedit illum delectus nihil error animi nobis quaerat quidem, amet, praesentium aspernatur inventore numquam! Totam, dolorem inventore reprehenderit,
                                                    culpa obcaecati!</p>
                                                <p><a class="btn btn-primary" href="#">Link</a></p>
                                            </div>
                                            <!-- /.caption -->
                                    </div>
                                    <!-- /.thumbnail -->
                                </div>


                                <div class="col-sm-6 col-sm-4 col-lg-3">
                                    <div class="thumbnail">
                                        <h3>Title</h3>
                                            <img src="http://placehold.it/350x180">
                                            <div class="caption">

                                                <p class="flex-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur optio ipsa fuga vel repudiandae impedit illum delectus nihil error animi nobis quaerat quidem, amet, praesentium aspernatur inventore numquam! Totam, dolorem inventore reprehenderit,
                                                    culpa obcaecati!</p>
                                                <p><a class="btn btn-primary" href="#">Link</a></p>
                                            </div>
                                            <!-- /.caption -->
                                    </div>
                                    <!-- /.thumbnail -->
                                </div>


                                <div class="col-sm-6 col-sm-4 col-lg-3">
                                    <div class="thumbnail">
                                        <h3>Title</h3>
                                            <img src="http://placehold.it/350x180">
                                            <div class="caption">

                                                <p class="flex-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur optio ipsa fuga vel repudiandae impedit illum delectus nihil error animi nobis quaerat quidem, amet, praesentium aspernatur inventore numquam! Totam, dolorem inventore reprehenderit,
                                                    culpa obcaecati!</p>
                                                <p><a class="btn btn-primary" href="#">Link</a></p>
                                            </div>
                                            <!-- /.caption -->
                                    </div>
                                    <!-- /.thumbnail -->
                                </div>


                                <div class="col-sm-6 col-sm-4 col-lg-3">
                                    <div class="thumbnail">
                                        <h3>Title</h3>
                                        <img src="http://placehold.it/350x180">
                                        <div class="caption">

                                                <p class="flex-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur optio ipsa fuga vel repudiandae impedit illum delectus nihil error animi nobis quaerat quidem, amet, praesentium aspernatur inventore numquam! Totam, dolorem inventore reprehenderit,
                                                    culpa obcaecati!</p>
                                                <p><a class="btn btn-primary" href="#">Link</a></p>
                                        </div>
                                        <!-- /.caption -->
                                    </div>
                                    <!-- /.thumbnail -->
                                </div>


                                <div class="col-sm-6 col-sm-4 col-lg-3">
                                    <div class="thumbnail">
                                        <h3>Title</h3>
                                            <img src="http://placehold.it/350x180">
                                            <div class="caption">

                                                <p class="flex-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur optio ipsa fuga vel repudiandae impedit illum delectus nihil error animi nobis quaerat quidem, amet, praesentium aspernatur inventore numquam! Totam, dolorem inventore reprehenderit,
                                                    culpa obcaecati!</p>
                                                <p><a class="btn btn-primary" href="#">Link</a></p>
                                            </div>
                                            <!-- /.caption -->
                                    </div>
                                    <!-- /.thumbnail -->
                                </div>


                                <div class="col-sm-6 col-sm-4 col-lg-3">
                                    <div class="thumbnail">
                                        <h3>Title</h3>
                                            <img src="http://placehold.it/350x180">
                                            <div class="caption">

                                                <p class="flex-text text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur optio ipsa fuga vel repudiandae impedit illum delectus nihil error animi nobis quaerat quidem, amet, praesentium aspernatur inventore numquam! Totam, dolorem inventore reprehenderit,
                                                    culpa obcaecati!</p>
                                                <p><a class="btn btn-primary" href="#">Link</a></p>
                                            </div>
                                            <!-- /.caption -->
                                    </div>
                                    <!-- /.thumbnail -->
                                </div>

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














































































