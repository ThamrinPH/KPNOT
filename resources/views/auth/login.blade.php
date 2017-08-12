@extends('layouts.plain')
@section('content')  

<div class="middle_panel">
    <div class="x_panel">
        <div class="x_title">
            <h2>Login</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            @foreach($errors->all() as $error)
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Error!</strong> {{$error}}
            </div>
            @endforeach
            <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ route('login_post') }}">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="email" class="form-control" name="email" data-parsley-trigger="change" required="" type="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input class="form-control" type="password" name="password" required="">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </div>
</div>
@endsection
