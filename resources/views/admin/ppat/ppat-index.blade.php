@extends('layouts.admin')
@section('content')

@include('partials.datatable_src')
<?php
use Illuminate\Support\Facades\Storage;
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No. SK</th>
                            <th>Berita Acara</th>
                            <th>Status Pengerjaan</th>
                            <th>Status Pembayaran</th>
                            <th>Keterangan</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objects as $ppat)
                        <tr>
                            <td>{{$ppat->id}}</td>
                            <td>{{$ppat->berita_acara}}</td>
                            <td>{{$ppat->sk->status_pengerjaan}}</td>
                            <td>{{$ppat->sk->status_pembayaran}}</td>
                            <td>{{$ppat->keterangan}}</td>
                            <td>
                                <a href="{{route('ppat_createEdit',$ppat->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <!-- <a data-toggle="modal" data-target="#modal_delete" onclick="
                                    $('#form_delete input[name=id]').val('{{$ppat->id}}');
                                   ">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'ppat'])
            </div>
        </div>
    </div>
</div>
@stop