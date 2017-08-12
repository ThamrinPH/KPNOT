@extends('layouts.admin')
@section('content')

<div class="x_panel">
    <div class="x_title">
       
        
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="{{route('transaksi_save')}}">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">SK</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="sk_id">
                        @foreach($relations['sks'] as $sk)
                        <option value="{{$sk->id}}" @if(!empty($object->sk) && $sk->id === $object->sk->id) selected="" @endif>Nomor: {{$sk->id}} | Klien: {{$sk->klien->nama}} | PIC: {{$sk->pic}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Jenis</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="jenis" value="{{$object->jenis}}">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Waktu </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="control-group">
                        <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="datepicker_waktu" name="waktu">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                $('#datepicker_waktu').daterangepicker({
                    singleDatePicker: true,
                    singleClasses: "picker_3",
                    @if(!empty($object->id))
                    startDate: "{{$object->waktu->format('m/d/Y')}}"
                    @endif
                }, function(start, end, label) {

                });
                </script>
            </div>
           
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Nominal</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" required="required" class="form-control col-md-7 col-xs-12" name="nominal" value="{{$object->nominal}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control" name="keterangan">{{$object->keterangan}}</textarea>
                </div>
            </div>
            
            @if(!empty($object->lampiran))
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Download File</label>
                <a href="{{route('transaksi_download',$object->lampiran)}}">
                    <i class="glyphicon glyphicon-download-alt">
                        {{$object->lampiran}}
                    </i>
                </a>
            </div>         
            @endif

           <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Lampiran</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" required="required" name="lampiran" value="{{$object->lampiran}}">
                </div>
                
            </div>
            
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{route('ppat_list')}}">Cancel</a>
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