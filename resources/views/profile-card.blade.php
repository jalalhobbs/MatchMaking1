<div class="col-sm-6 col-sm-4 col-lg-3">
    <div class="thumbnail">
        <h5>Name: {{ $firstName }}</h5>
        <img src={{$profilePic}}>
        <div class="caption">

            <p class="flex-text text-muted">Gender: {{$gender}}</p>
            <p class="flex-text text-muted">DOB: {{$dob}}</p>
            <p><a class="btn btn-primary" href="#">Like</a> <a class="btn btn-primary" href="#">Dislike</a></p>
            </p>

        </div>
        <!-- /.caption -->
    </div>
    <!-- /.thumbnail -->
</div>