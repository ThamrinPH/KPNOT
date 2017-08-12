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
                            <th>Waktu</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                            <th>Jenis</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objects as $retribusi)
                        <tr>
                            <td>{{$retribusi->waktu}}</td>
                            <td>{{$retribusi->keterangan}}</td>
                            <td>{{$retribusi->nominal}}</td>
                            <td>{{$retribusi->jenis}}</td>
                            <td>
                                <a href="{{route('retribusi_createEdit',$retribusi->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'retribusi'])
            </div>
        </div>
    </div>
</div>
@stop