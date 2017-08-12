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
                            <th>Keterangan</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($objects as $transaksi)
                        <tr>
                            <td>{{$transaksi->keterangan}}</td>
                            <td>{{$transaksi->nominal}}</td>
                        </tr>
                        
                    @endforeach

                        <tr>
                            <td style="font-weight: bold">Pemasukan</td>
                            <td style="font-weight: bold">0</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
