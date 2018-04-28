
<div class="col-sm-6 col-sm-4 col-lg-3">
    <div class="thumbnail">
        <h5>Name: {{ $firstName }}</h5>
        <img src={{$profilePic}}>
        <div class="caption">

            <p class="flex-text text-muted">Gender: {{$gender}}</p>
            <p class="flex-text text-muted">Age: {{$age}}</p>
            @if($email)
                <p class="flex-text text-muted">Email: {{$email}}</p>
            @endif
            <form action="updateLikeStatus" method="post">
                {{ csrf_field() }}
                {{$userId}}
                {{Auth::user()->matches()->where('targetId', $userId)->first()}}
                <input type="hidden" name="targetId" value="{{$userId}}">
                <div class="btn-group btn-group-toggle text-center col-12" data-toggle="buttons">

                    <label class="btn btn-dislike @if ($likeStatus == 0) active @endif col-5">
                        <input type="radio" name="likeStatus" value="0" autocomplete="off" checked> Dislike
                    </label>

                    <label class="btn btn-no-like-status @if ($likeStatus == 1) active @endif col-2">
                        <input type="radio" name="likeStatus" value="1" autocomplete="off">
                    </label>

                    <label class="btn btn-like @if ($likeStatus == 2) active @endif col-5">
                        <input type="radio" name="likeStatus" value="2" autocomplete="off"> Like
                    </label>

                    <a href ="#" class ="like">{{  Auth::user()->matches()->where('targetId', $userId)->first() ? Auth::user()->matches()->where('targetId', $userId)->first()->likeStatus == 1 ? 'Your like this post' : 'Like1' : 'Like2' }}</a>
                    <a href ="#" class ="like">{{  Auth::user()->matches()->where('targetId', $userId)->first() ? Auth::user()->matches()->where('targetId', $userId)->first()->likeStatus == 0 ? 'Your dont like this post' : 'Dislike1' : 'Dislike2' }}</a>


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