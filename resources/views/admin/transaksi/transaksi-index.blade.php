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
                        @foreach($objects as $transaksi)
                        <tr>
                            <td>{{$transaksi->waktu}}</td>
                            <td>{{$transaksi->keterangan}}</td>
                            <td>{{$transaksi->nominal}}</td>
                            <td>{{$transaksi->jenis}}</td>
                            <td>
                                <a href="{{route('transaksi_createEdit',$transaksi->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                            </td>
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