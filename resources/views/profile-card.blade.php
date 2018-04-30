<div class="col-sm-6 col-sm-4 col-lg-3">
    <div class="thumbnail">
        <h5>Name: {{ $firstName }}</h5>
        <img src={{$profilePic}}>
        <div class="caption">

            <p class="flex-text text-muted">Gender: {{$gender}}</p>
            <p class="flex-text text-muted">Age: {{$age}}</p>
            @if($bodyType)
                <p class="flex-text text-muted">Body Type: {{$bodyType}}</p>
            @endif
            @if($email)
                <p class="flex-text text-muted">Email: {{$email}}</p>
            @endif
            <form action="updateLikeStatus" method="post" data-userid="{{$userId}}">
                {{ csrf_field() }}

                <input type="hidden" name="targetId" value="{{$userId}}">
                <div class="btn-group btn-group-toggle text-center col-12" data-toggle="buttons">

                    <label class="btn btn-dislike @if ($likeStatus == 0) active @endif col-5">
                        <input type="radio" autocomplete="off" checked> Dislike
                    </label>

                    <label class="btn btn-no-like-status @if ($likeStatus == 1) active @endif col-2">
                        <input type="radio" autocomplete="off">
                    </label>

                    <label class="btn btn-like @if ($likeStatus == 2) active @endif col-5">
                        <input type="radio" autocomplete="off"> Like
                    </label>

                </div>

                <button type="button" class="btn btn-info btn-md mt-4 ml-3 col-md-10" data-toggle="modal" data-target="#myModal{{$userId}}">More Info</button>

                <!-- Modal -->
                <div id="myModal{{$userId}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Name: {{ $firstName }}</h4>
                                <button type="button"  data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-12">
                                    <div class="thumbnail">
                                            <img src="{{$profilePic}}" alt="{{ $firstName }}" class="center" style="width:40%; margin:0 auto">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-body">

                                <div class="col-lg-12">

                                        <div class="form-group row">
                                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                            <div class="col-md-6">
                                                <input id="gender" type="text" class="form-control" name="gender" value="{{$gender}}" required disabled>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                                            <div class="col-md-6">
                                                <input id="age" type="text" class="form-control" name="age" value="{{ $age }}" required disabled>
                                            </div>
                                        </div>

                                        @if($bodyType)
                                        <div class="form-group row">
                                            <label for="bodyType" class="col-md-4 col-form-label text-md-right">{{ __('BodyType') }}</label>

                                            <div class="col-md-6">
                                                <input id="bodyType" type="text" class="form-control" name="BodyType" value="{{ $bodyType }}" required disabled>
                                            </div>
                                        </div>
                                        @endif
                                        @if($email)
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                            <div class="col-md-6">
                                                <input id="bodyType" type="text" class="form-control" name="Email" value="{{ $email }}" required disabled>
                                            </div>
                                        </div>
                                        @endif
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

            </form>
            </p>

        </div>
        <!-- /.caption -->
    </div>
    <!-- /.thumbnail -->
</div>
{{--<script>--}}
{{--$('input[name=likeStatus{{$userId}}]').change(function() {--}}
{{--$('form').submit();--}}
{{--return false;--}}
{{--});--}}
{{--</script>--}}