@extends('layouts.admin')
@section('content')

@include('partials.datatable_src')
<?php 
    $tpengeluaran=0;
    $tpemasukan=0;

?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <table class="table">
                    <tbody>
                        @foreach($objects as $sk)
                        <tr>
                            <td class="col-md-3 text-right">Nomor Surat Kerja :</td>
                            <td>{{$sk->id}}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Jenis Transaksi :</td>
                            <td>{{$sk->jenis_transaksi}}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Nama Klien :</td>
                            <td>{{$sk->klien->nama}}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Status Pengerjaan :</td>
                            <td>{{$sk->status_pengerjaan}}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Nilai Transaksi :</td>
                            <td>Rp. {{number_format($sk->nilai_transaksi)}}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Status Pembayaran :</td>
                            <td>{{$sk->status_pembayaran}}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Keterangan :</td>
                            <td>{{$sk->keterangan}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                            <a href="{{route('sk_createEdit',$sk->id)}}"><button type="button" class="btn-info">Edit</button></a>
                            </td>  
                        </tr>
                         @endforeach
                    </tbody>
                </table>

                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pengeluaran <small>Bordered table subtitle</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Jenis Pengeluaran</th>
                          <th>Nominal</th>
                          <th>Waktu</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($retribusis as $retribusi)
                       <?php
                        $tpengeluaran=$tpengeluaran+$retribusi->nominal;
                       ?>
                       
                        <tr>

                          <td>{{$retribusi->jenis}}</td>
                          <td>Rp. {{number_format($retribusi->nominal)}}</td>
                          <td>{{ Carbon\Carbon::parse($retribusi->waktu)->format('l d-m-Y') }}</td>
                        </tr>
                         @endforeach
                         <tr>
                             <td colspan="2">Total Pengeluaran :</td>
                             <td>Rp. {{number_format($tpengeluaran)}}</td>
                         </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pemasukan <small>Bordered table subtitle</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Jenis Pemasukan</th>
                          <th>Nominal</th>
                          <th>Waktu</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($transaksis as $transaksi)
                         <?php
                            $tpemasukan=$tpemasukan+$transaksi->nominal;
                         ?>
                        <tr>
                          <td>{{$transaksi->jenis}}</td>
                          <td>Rp. {{number_format($transaksi->nominal)}}</td>
                          <td>{{ Carbon\Carbon::parse($transaksi->waktu)->format('l d-m-Y') }}</td>
                        </tr>
                         @endforeach
                         <tr>
                             <td colspan="2">Total Pemasukan :</td>
                             <td>Rp. {{number_format($tpemasukan)}}</td>
                         </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

                @include('partials.datatable_delete_modal',['route'=>'sk'])
            </div>
        </div>
    </div>
</div>
@stop