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
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Klien</th>
                            <th>Keterangan</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objects as $jadwal)
                        <tr>
                            <td>{{$jadwal->tanggal->format('d M Y')}}</td>
                            <td>{{$jadwal->mulai}} - {{$jadwal->selesai}}</td>
                            <td>{{$jadwal->klien->nama}}</td>
                            <td>{{$jadwal->keterangan}}</td>
                            <td>
                                <a href="{{route('jadwal_createEdit',$jadwal->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a href="{{route('jadwal_del',$jadwal->id)}}">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'jadwal'])
            </div>
        </div>
    </div>
</div>
@stop