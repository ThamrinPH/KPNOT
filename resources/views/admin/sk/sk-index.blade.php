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
                            <th>id</th>
                            <th>Klien</th>
                            <th>Person In Charge</th>
                            <th>Keterangan</th>
                            <th>Details</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objects as $sk)
                        <tr>
                            <td>{{$sk->id}}</td>
                            <td>{{$sk->klien->nama}}</td>
                            <td>{{$sk->user->name}}</td>
                            <td>{{$sk->keterangan}}</td>
                            <td><a href="{{route('sk_details',$sk->id)}}">
                                    Details
                                </a></td>
                            <td>
                                <a href="{{route('sk_createEdit',$sk->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'sk'])
            </div>
        </div>
    </div>
</div>
@stop