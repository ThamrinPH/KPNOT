@extends('layouts.admin')
@section('content')

@include('partials.datatable_src')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor Sk</th>
                            <th>Berita Acara</th>
                            <th>Keterangan</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objects as $legal)
                        <tr>
                            <td>{{$legal->sk_id}}</td>
                            <td>{{$legal->berita_acara}}</td>
                            <td>{{$legal->keterangan}}</td>
                            <td>
                                <a href="{{route('legal_createEdit',$legal->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <!-- <a data-toggle="modal" data-target="#modal_delete" onclick="
                                    $('#form_delete input[name=id]').val('{{$legal->id}}');
                                   ">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'legal'])
            </div>
        </div>
    </div>
</div>
@stop