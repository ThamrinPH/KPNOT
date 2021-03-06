@extends('layouts.admin')
@section('content')

@include('partials.datatable_src')
<?php

$Tahuns = range(1945, date('Y'));
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <table class="table table-striped table-bordered">  
                 <form class="form-horizontal form-label-left" method="get" action="{{route('retribusi_detail')}}">
                <label>Bulan : </label>
                <select name="month" id="month">
                </select>
                <label>
                    Tahun : 
                </label>   

                <select name="year" id="year">
                    <option value="">Select Year</option>
                </select>
                    <button type="submit">go</button>

            </div>
                 @if(!empty($object->id))
                <input type="hidden" name="id" value="{{$object->id}}">
                @endif
                {{csrf_field()}}
                </form>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Waktu Pengeluaran</th>
                            <th>Keterangan</th>
                            <th>Jenis Pengeluaran</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objects as $retribusi)
                        <tr>
                            <td>{{$retribusi->id}}</td>
                            <td>{{Carbon\Carbon::parse($retribusi->waktu)->formatLocalized('%d %B %Y')}}</td>
                            <td>{{$retribusi->keterangan}}</td>
                            <td>{{$retribusi->jenis}}</td>
                            <td>Rp. {{number_format($retribusi->nominal)}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">Jumlah Pengeluaran Bulan ini : </td>
                            <td>Rp. {{number_format($sum)}}</td>
                        </tr>
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'retribusi'])
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1);
var monthArray = new Array();
monthArray[1] = "Januari";
monthArray[2] = "Februari";
monthArray[3] = "March";
monthArray[4] = "April";
monthArray[5] = "Mei";
monthArray[6] = "Juni";
monthArray[7] = "Juli";
monthArray[8] = "Agustus";
monthArray[9] = "September";
monthArray[10] = "October";
monthArray[11] = "November";
monthArray[12] = "December";
var monthstring = new Array();
monthstring[1] = "01";
monthstring[2] = "02";
monthstring[3] = "03";
monthstring[4] = "04";
monthstring[5] = "05";
monthstring[6] = "06";
monthstring[7] = "07";
monthstring[8] = "08";
monthstring[9] = "09";
monthstring[10] = "10";
monthstring[11] = "11";
monthstring[12] = "12";
for(m = 0; m <= 11; m++) {
    var optn = document.createElement("OPTION");
    optn.text = monthArray[m];
    // server side month start from one
    optn.value = monthstring[m];
 
    // if june selected
    if ( m == (today.getMonth()+1)) {
        optn.selected = true;
    }
 
    document.getElementById('month').options.add(optn);
}
for(y = 1945; y <= today.getFullYear(); y++) {
        var optn = document.createElement("OPTION");
        optn.text = y;
        optn.value = y;
        
        // if year is 2015 selected
     
   if (y == today.getFullYear()) {
            optn.selected = true;
        }
        
        document.getElementById('year').options.add(optn);
}
</script>
@stop