@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="container-fluid text-center">
            <div class="alert alert-danger col-sm-4" style="margin-left: 33.33%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{$error}}
            </div>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="container-fluid text-center">
        <div class="alert alert-success col-sm-4" style="margin-left: 33.33%;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{session('success')}}
        </div>
    </div>
@endif

@if(session('error'))
    <div class="container-fluid text-center">
        <div class="alert alert-danger col-sm-4" style="margin-left: 33.33%;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{session('error')}}
        </div>
    </div>
@endif