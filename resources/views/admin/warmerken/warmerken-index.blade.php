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
                            <th>Berita Acara</th>
                            <th>Nomor SK</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objects as $warmerken)
                        <tr>
                            <td>{{$warmerken->berita_acara}}</td>
                            <td>{{$warmerken->sk_id}}</td>
                            
                            <td>
                                <a href="{{route('warmerken_createEdit',$warmerken->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'warmerken'])
            </div>
        </div>
    </div>
</div>
@stop