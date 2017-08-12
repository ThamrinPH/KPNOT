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
                            <th>Nomor SK</th>
                            <th>Berita Acara</th>
                            <th>Keterangan</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objects as $notariil)
                        <tr>
                            <td>{{$notariil->sk_id}}</td>
                            <td>{{$notariil->berita_acara}}</td>

                            <td>{{$notariil->keterangan}}</td>
                            <td>
                                <a href="{{route('notariil_createEdit',$notariil->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <!-- <a data-toggle="modal" data-target="#modal_delete" onclick="
                                    $('#form_delete input[name=id]').val('{{$notariil->id}}');
                                   ">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'notariil'])
            </div>
        </div>
    </div>
</div>
@stop