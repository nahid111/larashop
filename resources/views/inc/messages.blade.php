@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="container-fluid text-center">
            <div class="row">
                <div class="alert alert-danger col-sm-offset-4 col-sm-4">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{$error}}
                </div>
            </div>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="container-fluid text-center">
        <div class="row">
            <div class="alert alert-success col-sm-offset-4 col-sm-4">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{session('success')}}
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="container-fluid text-center">
        <div class="row">
            <div class="alert alert-danger col-sm-offset-4 col-sm-4">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{session('error')}}
            </div>
        </div>
    </div>
@endif



