@extends('layouts.admin')
@section('content')

<!-- Ion.RangeSlider -->
<link href="{{asset('/')}}gen/vendors/normalize-css/normalize.css" rel="stylesheet">
<link href="{{asset('/')}}gen/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
<link href="{{asset('/')}}gen/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">

<!-- Ion.RangeSlider -->
<script src="{{asset('/')}}gen/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>

<div class="x_panel">
    <div class="x_title">
        <h2></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" method="post" action="{{route('jadwal_save')}}">

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="control-group">
                        <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="datepicker_tanggal" name="tanggal">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                $('#datepicker_tanggal').daterangepicker({
                    singleDatePicker: true,
                    singleClasses: "picker_3",
                    @if(!empty($object->id))
                    startDate: "{{$object->tanggal->format('m/d/Y')}}"
                    @endif
                }, function(start, end, label) {

                });
                </script>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Waktu</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="timerangepicker" name="range"/>
                </div>
            </div>
            <?php //format time to slider
                function timeStringToSliderTime($string) {
                    return intval(substr($string, 0, 2)) * 100 + (substr(($string), 3, 2) == '30' ? 50 : 0);
                }   
            ?>
            <script>
            $("#timerangepicker").ionRangeSlider({
                type: "double",
                min: 0,
                max: 2400,
                from: {{timeStringToSliderTime($object->mulai)}},
                to: {{timeStringToSliderTime($object->selesai)}},
                step: 50,
                grid: true,
                grid_snap: true,
                prettify: function (num) {
                    return (parseInt(num / 100)) + ':' + (num % 100 === 0 ? '00' : '30');
                }
            });
            </script>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Klien</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="klien_id">
                        @foreach($relations['kliens'] as $klien)
                        <option value="{{$klien->id}}" @if($klien->id === $object->klien_id) selected="" @endif>{{$klien->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control" name="keterangan">{{$object->keterangan}}</textarea>
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{route('jadwal_list')}}">Cancel</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            @if(!empty($object->id))
            <input type="hidden" name="id" value="{{$object->id}}">
            @endif
            {{csrf_field()}}
        </form>
    </div>
</div>
@stop