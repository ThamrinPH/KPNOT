@extends('layouts.plain')
@section('content')  
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">this is index page</div>

                <div class="panel-body">
                    <a href="{{route('login')}}">admin page here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
