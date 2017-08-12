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
                            <th>Nomor HM</th>
                            <th>NIB</th>
                            <th>SSP</th>
                            <th>Pemegang Hak</th>
                            <th>Keterangan</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objects as $properti)
                        <tr>
                            <td>{{$properti->no_hak}}</td>
                            <td>{{$properti->nib}}</td>
                            <td>{{$properti->nomor_ssp}}</td>
                            <td>{{$properti->pemeganghak}}</td>
                            <td>LT: {{$properti->luastanah}}m<sup>2</sup>, LB: {{$properti->luasbangunan}}m<sup>2</sup> <br>Letak: {{$properti->letak}} </td>
                            <td>
                                <a href="{{route('properti_createEdit',$properti->id)}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.datatable_delete_modal',['route'=>'properti'])
            </div>
        </div>
    </div>
</div>
@stop