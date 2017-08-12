@extends('layouts.admin')
@section('content')

@include('partials.datatable_src')
<?php

$Tahuns = range(1945, date('Y'));
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
                <table class="table table-striped table-bordered">  
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>revenue</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sum as $sumpah)
                        <tr>
                            @foreach($sumpah as $sumpahkon)
                            <td>{{$sumpahkon->bulan}}</td>
                            @if(empty($sumpahkon->revenue))
                            <td>Rp. 0,-</td>
                            @else
                            <td>Rp. {{number_format($sumpahkon->revenue)}},-</td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'transaksi'])
            </div>
        </div>
    </div>
</div>
@stop