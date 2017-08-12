@extends('layouts.admin')
@section('content')  
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               

<div class="x_panel">
    <div class="x_title">
        <h2></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br>
               
                <div class="col-md-6 col-sm-6 col-xs-12">
                     <a href="{{ url('laporan/pengeluaran') }}" class="btn btn-primary pull-right btn-sm">Laporan Pengeluaran</a>

                    <a href="{{ url('laporan/pemasukan') }}" class="btn btn-primary pull-right btn-sm">Laporan Pemasukan</a>
                </div>
    </div>
                    
   
                       


            </div>
        </div>
    </div>
</div>
@endsection
