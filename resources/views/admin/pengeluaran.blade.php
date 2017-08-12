@extends('layouts.admin')
@section('content')  

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    pengeluaran

                     <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a class="btn btn-primary" href="{{route('laporan')}}">back</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
