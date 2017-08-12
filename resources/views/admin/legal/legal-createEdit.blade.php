@extends('layouts.admin')
@section('content')

<?php
$beritaacaras = ['Berita Acara Rapat Umum Menonaktifkan Perusahaan','Berita Acara Rapat Umum Pemegang Saham Luar Biasa','Berita Acara Serah Terima','Pemberian Jaminan Cessie','Penegasan Pengoperan Hak Cessie','Akta Pendirian CV','Perserikatan Komanditer','Akta Jaminan Fidusia','Jaminan Perusahaan','Jaminan Pribadi','Jaminan Untuk membeli Kembali','Pemberian Jaminan dan Kuasa','Pemberian Jaminan Gadai Deposito','Pemberian Jaminan Perusahaan','Pengahlian Hak Atas Piutang','Perjanjian Jaminan Borg','Perjanjian Penjamin Aval','Pernyataan Jaminan membeli kembali','Jual Beli Kapal','Jual Beli Mesin','Jual Beli Rumah Dan Pemindahan Hak','Pelepasan Hak Atas Tanah','Pengikatan Jual Beli','Perjanjian Jual Beli Dan Pelepasan Hak','Perjanjian Pengikatan Jual Beli','Jual Beli Saham','Pemindahan dan Penyerahan Hak Atas Saham','Pengikatan untuk Jual Beli Saham','Akta Pendirian Koperasi','Berita Acara Rapat Anggota Tenttang Perubahan AD','Kuasa','Kuasa Jual','Kuasa Menjual','Kuasa Saham','Persetujuan dan Kuasa Komisaris','Akta Pendirian LSM','Pendirian LSM','Pendirian Perusahaan Dagang','Pemberian Pembelian Surat dan Pengakuan Hutang','Pengakuan Hutang','Persetujuan Membuka Kredit','Pengakuan Hutang dengan Jaminan','Pengakuan Hutang Penyerahan Hak Milik Secara Fidusia','Perjanjian Agen Pembayaran','Perjanjian Anjak Piutang','Perjanjian Fasilitas Surat Berharga','Perjanjian Jual Beli Promes Nasabah','Perjanjian Jual Beli Valuta Asing','Perjanjian Kawin','PerjanjianKawin Diluar Persek Harta Benda','Perjanjian Keagenan Jaminan','Perjanjian Kesanggupan Pembelian Sisa Saham','Perjanjian Kredit','Perjanjian Kredit Bank Garansi','Perjanjian Kredit Dengan Jaminan Term Loan','Perjanjian Kredit Dengan Pemberian Jaminan','Perjanjian Kredit Dengan Pemberiat Letter of Credit','Perjanjian Kredit dengan Pemberian SKBDN','Perjanjian Kredit KPR','Perjanjian Kredit Term Loan','Perjanjian kredit untuk Fixed Loan','Perjanjian kredit Untuk kredit PRK','Perjanjian kredit untuk Term Loan','Perjanjian Oper Alih Wartel','Perjanjian Pembelian Surat Berharga','Perjanjian Pengadaan Barang cetekan','Perjanjian Pengelolaan Administrasi','Perjanjian Pengelolaan Administrasi Saham','Perjanjian Pengelolaan Administrasi Waran','Perjanjian Pengosongan','Perjanjian Pengosongan tanah dan bangunan','Perjanjian Penjaminan Emisi Efek','Perjanjian Penjaminan Emisi Obligasi','Perjanjian Perpanjngan Kredit','Perjanjian Pertanggungan ','Perjanjian Perwaliamanatan Obligasi','Perjanjian Pinjam Meminjam','Perjanjian Pinjaman Revolving','Perjanjian Pinjaman Dengan Surat Berharga','Perjanjian Standby LOC','Perjanjian Usahawan Visa','Perubahan Addendum Perjanjian Penjaminan','Perubahan Perjanjian','Perubahan Perjanjian Perwaliamanatan Obligasi','Surat Perjanjian Penyelesaian Sewa Guna','Perjanjian Build Operate Trasfer','Perjanjian Kerja Sama','Perjanjian Kerjasama Apotik','Perjanjian Kerjasama dan Penganggungan','Perjanjian Kerjasama Waralaba','PKS Pembangunan Mall','PKS Pemberian Kredit KUK','PKS Pemberian KUK','Pemasukan dan Pengeluaran Serta AD','Perubahan Perjanjian Agen Pembayaran','Perubahan Perjanjian Kredit','Perubahan Perjanjian Kredit dengan Jaminan','Perubahan Perjanjian Penjaminan Emisi Efek','Anggaran Dasar PT','Draft PT Baru','Kumpulan Maksud dan Tujuan PT','Pembubaran PT','Pendirian PT Umum','Pendirian PT','Perjanjian Pengikatan untuk Pemasukan PT','Permohonan Pengesahan Pendirian PT dan Perubahan PT','Pernyataan Keputusan Rapat Tentang Perubahan AD','Persetujuan dan Kuasa Komisaris','PT Campuran','Risalah Rapat PT','RUPS Mengenai Pembatalan Akta','RUPS Mengenai Pembatalan Akta JBS','RUPS Mengenai Pembatalan Perjanjian','RUPS Mengenai Pengeluaran Saham dalam Simpanan','RUPS Mengenai Peningkatan Modal Dsar','RUPS Mengenai Penjualan Saham','RUPS Mengenai Pernyataan Keputusan Rapat','RUPS Mengenai Perubahan AD PT','RUPS Mengenai Perubahan Nama PT','RUPS Mengenai Perubahan Pada PT','RUPS Mengenai Perubahan Susunan Direksi','RUPS Peningkatan Modal Dasar','RUPS Perubahan Nama PT dan Maksud Tujuan','RUPS Perubahan Seluruh AD PT','RUPS Persetujuan Jual Saham dan Perubahan Pengurus Berita Acara Rapat','Perjanjian Sewa Menyewa','Sewa Bangunan Pabrik','Sewa Ruko','Kontra Garansi Bank','Pemberitahuan Persetujuan Penggabungan','Permohonan untuk Garansi Bank','Surat Izin Pengambilan Barang','Surat Keterangan Pembelian Blankgko PPAT','Surat Keterangan Pendirian Sedang dalam Proses Pengsahan','Surat Keterangan SIUP & TDP','Surat Kuasa untuk Menjual Kendaraan Bermotor','Surat Pernyataan Pinjam Meminjam','Surat Pernyataan Bersama','Surat Pernyataan Dalam Proses','Surat Pernyataan Susnan dan AD','Surat Persetujuan PT','Surat Persutujuan Yayasan','Akad Pembiayaan Al-Murabahah','Akad Pembiayaan Al-Musyarakah','Akad Pembiayaan As-Salam','Akad Pembiayaan Mudharabah','Legalisasi','Waarmerking Syariah','Keterangan Mengenai Hak Mewaris','Keterangan Waris','Surat Pernyataan Ahli Waris','Wasiat','Akta Pendirian Yayasan','Anggaran Dasar Yayasan','Yayasan Pendidikan','Akta Penyerahan','Akta Penyimpanan','Garansi ','Garansi Bank','Hibah Saham','Hibah Uang','Pelepasan Hak Atas Tanah','Pemberian Pelunasan','Pendirian Cabang dan Kuasa','Pengikatan Tukar Menukar','Penitipan Uang','Perdamaian','Pernyataan Kesanggupan','Pernyataan Optie','Pernyataan Penerbitan Waran','Pernyataan Profesi Penunjang Pasar Modal','Pesanan Pembelian','Pengikatan Pemindahan dan Penyerahan Hak Atas Tanah','Recipis','Skala Pelunasan'];
    $listk = [];
if(!empty($object->lklien)){
    foreach ($object->lklien as $list) {
        array_push($listk, $list);
    }
}
?>

<!-- Ion.RangeSlider -->
<link href="{{asset('/')}}gen/vendors/normalize-css/normalize.css" rel="stylesheet">
<link href="{{asset('/')}}gen/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
<link href="{{asset('/')}}gen/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">

<!-- Ion.RangeSlider -->
<script src="{{asset('/')}}gen/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>

<!-- jquery.inputmask -->
<script src="{{asset('/')}}gen/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

<div class="x_panel">
    <div class="x_title">
        <h2></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br>
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="{{route('legal_save')}}">

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">SK</label>
                <label class="control-label col-md-6 col-sm-6 col-xs-12">Nomor: {{$object->sk->id}} | Klien: {{$object->sk->klien->nama}} | PIC: {{$object->sk->user->name}}
                    </label>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Waktu teken</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="control-group">
                        <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="datepicker_tanggal" name="waktu">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                $('#datepicker_tanggal').daterangepicker({
                    singleDatePicker: true,
                    singleClasses: "picker_3",
                    @if(!empty($object->id))
                    startDate: "{{$object->waktu->format('m/d/Y')}}"
                    @endif
                }, function(start, end, label) {

                });
                </script>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Nomor Akta</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="autocomplete-custom-append"  type="text" required="required" class="form-control col-md-7 col-xs-12" name="no_akta" value="{{$object->no_akta}}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Berita Acara</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                     <select class="select2_single form-control" tabindex="-1" name="berita_acara"  >
                    @foreach($beritaacaras as $ba)
                         <option value="{{$ba}}" @if($ba === $object->berita_acara) selected="" @endif >{{$ba}}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class="form-control" name="keterangan">{{$object->keterangan}}</textarea>
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">List Klien</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="select2_single_klien form-control" tabindex="-1" name="lklien[]" multiple="true">
                        @foreach($relations['kliens'] as $klien)
                        <option value="{{$klien->no_ktp}}" @foreach($listk as $list)
                        @if($klien->no_ktp === $list) selected="" @endif
                        @endforeach
                        >[{{$klien->no_ktp}}]{{$klien->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{route('klien_createEdit','new')}}"><i class="fa fa-user"></i>Tambah Klien</a>
            </div>

            @if(!empty($object->lampiran))
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Download File</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="{{route('legal_download',$object->lampiran)}}">
                    <i class="glyphicon glyphicon-download-alt">
                        {{$object->lampiran}}
                    </i>
                </a>
                </div>
            </div>
            @endif

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Lampiran</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" name="lampiran" value="{{$object->lampiran}}">
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{route('legal_list')}}">Cancel</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            @if(!empty($object->id))
            <input type="hidden" name="id" value="{{$object->id}}">
            @endif
            {{csrf_field()}}
        </form>
    </div>
</div>
 <script type="text/javascript">
                  $('select').select2();
                </script>
@stop