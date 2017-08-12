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
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objects as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('user_createEdit',$user->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a data-toggle="modal" data-target="#modal_delete" onclick="
                                    $('#form_delete input[name=id]').val('{{$user->id}}');
                                   ">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'user'])
            </div>
        </div>
    </div>
</div>
@stop