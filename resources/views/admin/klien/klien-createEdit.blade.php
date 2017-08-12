@extends('layouts.admin')
@section('content')

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
        <form class="form-horizontal form-label-left" method="post" action="{{route('klien_save')}}">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="{{$object->nama}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-2">Nomor KTP</label>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <input class="form-control" data-inputmask="'mask': '9999999999999999'" type="text" name="no_ktp" value="{{$object->no_ktp}}">
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-2">Tanggal Lahir</label>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="control-group">
                        <div class="controls">
                            <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="datepicker" name="tgl_lahir">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                $('#datepicker').daterangepicker({
                    singleDatePicker: true,
                    singleClasses: "picker_3",
                    @if (!empty($object->id))
                    startDate: "{{$object->tgl_lahir->format('m/d/Y')}}"
                    @endif
                }, function(start, end, label) {

                });
                </script>
                <label class="control-label col-md-1 col-sm-1 col-xs-3">Tempat Lahir</label>
                <div class="col-md-2 col-sm-2 col-xs-3">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="tempat_lahir" value="{{$object->tempat_lahir}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Alamat</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control" name="alamat">{{$object->alamat}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-3">RT</label>
                <div class="col-md-1 col-sm-1 col-xs-3">
                    <input type="number" min="0" max="999" required="required" class="form-control col-md-7 col-xs-12" name="rt" value="{{$object->rt}}">
                </div>
                <label class="control-label col-md-1 col-sm-1 col-xs-3">RW</label>
                <div class="col-md-1 col-sm-1 col-xs-3">
                    <input type="number" min="0" max="999" required="required" class="form-control col-md-7 col-xs-12" name="rw" value="{{$object->rw}}">
                </div>
                <label class="control-label col-md-1 col-sm-1 col-xs-3">Desa</label>
                <div class="col-md-2 col-sm-2 col-xs-3">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="desa" value="{{$object->desa}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-3">Kecamatan</label>
                <div class="col-md-2 col-sm-2 col-xs-3">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="kecamatan" value="{{$object->kecamatan}}">
                </div>
                <label class="control-label col-md-2 col-sm-2 col-xs-3">Kabupaten</label>
                <div class="col-md-2 col-sm-2 col-xs-3">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="kabupaten" value="{{$object->kabupaten}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-3">Provinsi</label>
                <div class="col-md-2 col-sm-2 col-xs-3">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="provinsi" value="{{$object->provinsi}}">
                </div>
                <label class="control-label col-md-2 col-sm-2 col-xs-3">Kode Pos</label>
                <div class="col-md-2 col-sm-2 col-xs-3">
                    <input type="text" required="required" data-inputmask="'mask': '99999'" class="form-control col-md-7 col-xs-12" name="kodepos" value="{{$object->kodepos}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-6">Warga Negara</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="warga_negara" value="{{$object->warga_negara}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-6">Status Pernikahan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" name="status_pernikahan">
                        <option value="Belum Menikah" @if($object->status_pernikahan === "Belum Menikah") selected="" @endif>Belum Menikah</option>
                        <option value="Menikah" @if($object->status_pernikahan === "Menikah") selected="" @endif>Menikah</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-6">Pekerjaan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="pekerjaan" value="{{$object->pekerjaan}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-6">Agama</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="agama" value="{{$object->agama}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-6">Telepon</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="telpon" value="{{$object->telpon}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-6">Handphone</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="handphone" value="{{$object->handphone}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-6">NPWP</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" data-inputmask="'mask': '99.999.999.9-999.999'" name="npwp" value="{{$object->npwp}}">
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
@stop