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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Handphone</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objects as $klien)
                        <tr>
                            <td>{{$klien->nama}}</td>
                            <td>{{$klien->alamat}}, {{$klien->kecamatan}}, {{$klien->kabupaten}}</td>
                            <td>{{$klien->telpon}}</td>
                            <td>{{$klien->handphone}}</td>
                            <td>
                                <a href="{{route('klien_createEdit',$klien->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a data-toggle="modal" data-target="#modal_delete" onclick="
                                    $('#form_delete input[name=id]').val('{{$klien->id}}');
                                   ">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'klien'])
            </div>
        </div>
    </div>
</div>
@stop