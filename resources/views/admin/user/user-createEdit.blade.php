@extends('layouts.admin')
@section('content')
<?php
$divisis = ['Umum','Lapangan','Perseroan','Developer','Admin'];
?>
<!-- Ion.RangeSlider -->
<link href="{{asset('/')}}gen/vendors/normalize-css/normalize.css" rel="stylesheet">
<link href="{{asset('/')}}gen/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
<link href="{{asset('/')}}gen/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">

<!-- Ion.RangeSlider -->
<script src="{{asset('/')}}gen/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>

<!-- jquery.inputmask -->
<script src="{{asset('/')}}gen/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

<div class="x_panel">
    <div class="x_title">
        <h2></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="{{route('user_save')}}">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="name" value="{{$object->name}}">
                </div>
            </div>
           
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Divisi</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="berita_acara"  >
                    @foreach($divisis as $ba)
                         <option value="{{$ba}}" @if($ba === $object->berita_acara) selected="" @endif >{{$ba}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
           
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-3">Email</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="email" value="{{$object->email}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-3">Password</label>
                <div class="col-md-2 col-sm-2 col-xs-3">
                    <input type="password" class="form-control col-md-7 col-xs-12" name="password" value="{{$object->provinsi}}">
                </div>
                <label class="control-label col-md-2 col-sm-2 col-xs-3">Confirm Password</label>
                <div class="col-md-2 col-sm-2 col-xs-3">
                    <input type="password" class="form-control col-md-7 col-xs-12" name="confirmpassword" value="{{$object->provinsi}}">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Foto</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" name="lampiran" value="{{$object->lampiran}}">
                </div>
                
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{route('klien_list')}}">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
            </div>
            @if(!empty($object->id))
            <input type="hidden" name="id" value="{{$object->id}}">
            @endif
            {{csrf_field()}}
        </form>
    </div>
</div>
 <script type="text/javascript">
                  $('select').select2();
                </script>
@stop