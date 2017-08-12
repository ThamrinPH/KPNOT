@extends('layouts.admin')
@section('content')

<?php
    $sifats = [
        'sifat1','sifat2','sifat3','sifat4'
    ];
    $kabupatens = [
        'Awang-Awang','Bakalan','Balongmasin','Balongmojo','Balongsari','Balongwono','Bandarasri','Bandung','Bangeran','Bangsal','Bangun','Banjaragung','Banjarsari','Banjartanggul','Banyulegi','Batankrajan','Baureno','Begaganlimo','Bejijong','Belahantengah','Belik','Beloh','Bendung','Bendunganjati','Bening','Beratkulon','Beratwetan','Betro','Bicak','Bleberan','Blimbingsari','Brangkal','Brayublandong','Brayung','Candiharjo','Candiwatu','Canggu','Cembor','Cendoro','Centong','Cepokolimo','Cinanadang','Claket','Curahmojo','Dawarblandong','Dilem','Dinoyo','Dlanggu','Domas','Dukuhngarjo','Duyung','Gading','Gayam','Gayaman','Gebangmalang','Gebangsari','Gedangan','Gedeg','Gembongan','Gemekan','Gemolkerep','Gondang','Gumeng','Gunungan','Gunungasri','Jabon','Jabontegal','Jairowo','Jambuwok','Jampirogo','Japan','Japanan','Jasem','Jatidukuh','Jatijejer','Jatilangkung','Jatipasar','Jatirejo','Jembul','Jerukseger','Jetis','Jiyu','Jolotundo','Jotangan','Jrambe','Jumeneng','Kalen','Kaligoro','Kalikatir','Kalipuro','Karangasem','Karangdiyeng','Karangjeruk','Karangkedawang','Karangkuen','Kauman','Kebonagung','Kebondalem','Kebontunggul','Kedunggede','Kedunggempol','Kedunglengkong','Kedungmaling','Kedungmungal','Kedungsari','Kedungudi','Kedunguneng','Kejagan','Kemantren','Kemasantani','Kembangbelor','Kembangringgit','Kembangsri','Kemiri','Kemlagi','Kenanten','Kepuhanyar','Kepuharum','Kepuhpandak','Kertosari','Kesemen','Kesiman','Kesimantengah','Ketapanrame','Ketemasdungus','Kintelan','Klinterejo','Kumitir','Kunjorowesi','Kupang','Kuripansari','Kutogirang','Kutoporong','Kutorejo','Kwatu','Kwedenkembar','Lakardowo','Lebakjabung','Lebaksono','Leminggir','Lengkong','Lolawang','Madureso','Manduromanggunggajah','Manting','Medali','Mejoyo','Menanggal','Mlaten','Mlirip','Modongan','Modopuro','Mojoanyar','Mojodadi','Mojodowo','Mojogebang','Mojogeneng','Mojojajar','Mojokarang','Mojokembang','Mojokumpul','Mojokusumo','Mojolebak','Mojopilang','Mojoranu','Mojorejo','Mojorejo','Mojorejo','Mojosari','Mojosari-rejo','Mojosulur','Mojotamping','Mojowates-rejo','Mojowiryo','Mojowono','Ngabar','Ngareskidul','Ngarjo','Ngastemi','Ngembat','Ngembeh','Ngimbangan','Ngingasrembyong','Ngoro','Ngrame','Ngrowo','Nogosari','Pacet','Pacing','Padangasri','Padi','Padusan','Pagerjo','Pagerluyung','Pakis','Pandanarum','Pandankrajan','Panggih','Parengan','Payungrejo','Pekukuhan','Pekuwon','Penanggungan','Penompo','Perning','Pesanggrahan','Petak','Peterongan','Plososari','Pohjejer','Pohkecik','Pucuk','Pugeran','Puloniti','Pulorejo','Pungging','Punggul','Puri','Purwojati','Purworejo','Randegan','Randubango','Randudenenga','Randuharjo','Rejosari','Sadartengah','Sajen','Salen','Sambilawang','Sambiroto','Sampangagung','Sarirejo','Sawahan','Sawo','Sawo','Sedati','Segunung','Sekargadung','Seloliman','Selotapak','Sentonorejo','Sidoharjo','Sidomulyo','Sidorejo','Simbaringin','Simongagrok','Singowangi','Sooko','Srigading','Sugeng','Sukoanyar','Sukosari','Sumberagung','Sumbergirang','Sumberjati','Sumberjati','Sumberkarng','Sumberkembar','Sumbersono','Sumbertanggul','Sumbertebu','Sumberwono','Sumberwuluh','Sumengko','Sumolawang','Suru','Talok','Talunblanding','Tambakagung','Tambakrejo','Tamiajeng','Tampungrejo','Tangunan','Tanjangrono','Tanjungan','Tanjungkenongo','Tawangrejo','Tawangsari','Tawar','Temon','Tempuran','Tempuran','Temuireng','Terusan','Tinggarbuntut','Trawas','Trowulan','Tumapel','Tunggalpager','Warugunung','Watesnegoro','Watesprojo','Watesumpak','Watukenongo','Windurejo','Wiyu','Wonodadi','Wonokusumo','Wonoploso','Wonorejo','Wonosari','Wotanmasjedong','Wringinrejo','Wunut'
    ];
    $jnsasalhaks = ['Konversi','Pemberian Hak','Pemecahan Bidang','Pemisahan Bidang','Penggabungan Bidang'];
    $jenis_dps = ['Daftar Isian 202','Surat Keputusan','Permohonan Pemecahan Bidang','Permohonan Pemisahan Bidang','Permohonan Penggabungan Bidang'];
    $jenis_date_haks = ['Tanggal Lahir','Akta Pendirian'];
    $cities = ['Ambon', 'Balikpapan', 'Banda Aceh', 'Bandar Lampung', 'Bandung', 'Banjar', 'Banjarbaru', 'Banjarmasin', 'Batam', 'Batu', 'Bau-Bau', 'Bekasi', 'Bengkulu', 'Bima', 'Binjai', 'Bitung', 'Blitar', 'Bogor', 'Bontang', 'Bukittinggi', 'Cilegon', 'Cimahi', 'Cirebon', 'Denpasar', 'Depok', 'Dumai', 'Gorontalo', 'Jakarta', 'Jambi', 'Jayapura', 'Kediri', 'Kendari', 'Kotamobagu', 'Kupang', 'Langsa', 'Lhokseumawe', 'Lubuklinggau', 'Madiun', 'Magelang', 'Makassar', 'Malang', 'Manado', 'Mataram', 'Medan', 'Metro', 'Meulaboh', 'Mojokerto', 'Padang', 'Padang Sidempuan', 'Padangpanjang', 'Pagaralam', 'Palangkaraya', 'Palembang', 'Palopo', 'Palu', 'Pangkalpinang', 'Parepare', 'Pariaman', 'Pasuruan', 'Payakumbuh', 'Pekalongan', 'Pekanbaru', 'Pematangsiantar', 'Pontianak', 'Prabumulih', 'Probolinggo', 'Purwokerto', 'Sabang', 'Salatiga', 'Samarinda', 'Sawahlunto', 'Semarang', 'Serang', 'Sibolga', 'Singkawang', 'Solok', 'Sorong', 'Subulussalam', 'Sukabumi', 'Sungai Penuh', 'Surabaya', 'Surakarta', 'Tangerang', 'Tangerang Selatan', 'Tanjungbalai', 'Tanjungpinang', 'Tarakan', 'Tasikmalaya', 'Tebingtinggi', 'Tegal', 'Ternate', 'Tidore Kepulauan', 'Tomohon', 'Tual', 'Yogyakarta'];
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
        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data"  action="{{route('properti_save')}}">
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">PPAT</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="ppat_id">
                        @foreach($relations['ppats'] as $ppat)
                        <option value="{{$ppat->id}}" @if(!empty($object->ppat) && $ppat->id === $object->ppat->id) selected="" @endif>id PPAT : {{$ppat->id}} | Berita Acara : {{$ppat->berita_acara}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="ln_solid"></div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Jenis</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="autocomplete-custom-append" type="text" required="required" class="form-control col-md-7 col-xs-12" name="jenis_hak" value="{{$object->jenis_hak}}">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Nomor Hak</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="no_hak" value="{{$object->no_hak}}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Desa/Kelurahan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="desa">
                        @foreach($kabupatens as $kabupaten)
                        <option value="{{$kabupaten}}" @if(!empty($object->desa) && $kabupaten==$object->desa) selected="" @endif>{{$kabupaten}}</option>
                        @endforeach
                    </select>
                  <!--   <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="desa" value="{{$object->desa}}"> -->
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Akhir Tanggal Hak</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="control-group">
                        <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="datepicker_akhr_tgl_hak" name="akhr_tgl_hak">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                $('#datepicker_akhr_tgl_hak').daterangepicker({
                    singleDatePicker: true,
                    singleClasses: "picker_3",
                    @if(!empty($object->id))
                    startDate: "{{$object->akhr_tgl_hak->format('m/d/Y')}}"
                    @endif
                }, function(start, end, label) {

                });
                </script>
            </div>

            <div class="ln_solid"></div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">NIB</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="nib" value="{{$object->nib}}">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Letak Tanah</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="letak" value="{{$object->letak}}">
                </div>
            </div>

            <div class="x_title">
                <h2>Asal Hak</h2>
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Jenis Asal Hak</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="jenis_asal_hak">
                    @foreach($jnsasalhaks as $jnsasalhak)
                        <option value="{{$jnsasalhak}}" @if(!empty($object->jenis_asal_hak) && $jnsasalhak==$object->jenis_asal_hak) selected="" @endif>{{$jnsasalhak}}</option>
                    @endforeach
                </select>
                   <!--  <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="jenis_asal_hak" value="{{$object->jenis_asal_hak}}"> -->
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Asal Hak</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="asal_hak" value="{{$object->asal_hak}}">
                </div>
            </div>

            <div class="x_title">
                <h2>Dasar Pendafataran</h2>
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Jenis Dasar Pendaftaran</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="jenis_dp">
                        @foreach($jenis_dps as $jenis_dp)
                        <option value="{{$jenis_dp}}" @if(!empty($object->jenis_dp) && $jenis_dp==$object->jenis_dp) selected="" @endif>{{$jenis_dp}}</option>
                        @endforeach
                    </select>
                   <!--  <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="jenis_dp" value="{{$object->jenis_dp}}"> -->
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Dasar Pendaftaran</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="control-group">
                        <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="datepicker_tgl_dp" name="tgl_dp">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                $('#datepicker_tgl_dp').daterangepicker({
                    singleDatePicker: true,
                    singleClasses: "picker_3",
                    @if(!empty($object->id))
                    startDate: "{{$object->tgl_dp->format('m/d/Y')}}"
                    @endif
                }, function(start, end, label) {

                });
                </script>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Nomor Dasar Pendaftaran</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="no_dp" value="{{$object->no_dp}}">
                </div>
            </div>

            <div class="x_title">
                <h2>Surat Ukur</h2>
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Surat Ukur</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="control-group">
                        <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="datepicker_tgl_su" name="tgl_su">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                $('#datepicker_tgl_su').daterangepicker({
                    singleDatePicker: true,
                    singleClasses: "picker_3",
                    @if(!empty($object->id))
                    startDate: "{{$object->tgl_su->format('m/d/Y')}}"
                    @endif
                }, function(start, end, label) {

                });
                </script>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">No. Surat Ukur</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" step="" required="required" class="form-control col-md-7 col-xs-12" name="no_su" value="{{$object->no_su}}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Luas Tanah</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" step="0.01" required="required" class="form-control col-md-7 col-xs-12" name="luastanah" value="{{$object->luastanah}}">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Luas Bangunan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" step="0.01" required="required" class="form-control col-md-7 col-xs-12" name="luasbangunan" value="{{$object->luasbangunan}}">
                </div>
            </div>

            <div class="x_title">
                <h2>Nama Pemegang Hak</h2>
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Nama Pemegang Hak</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="nama_pemegang_hak" value="{{$object->nama_pemegang_hak}}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Jenis Tanggal Hak</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="jenis_date_hak">
                    @foreach($jenis_date_haks as $jenis_date_hak)
                        <option value="{{$jenis_dp}}" @if(!empty($object->jenis_date_hak) && $jenis_date_hak==$object->jenis_date_hak) selected="" @endif>{{$jenis_date_hak}}</option>
                    @endforeach
                </select>
                    <!-- <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="jenis_date_hak" value="{{$object->jenis_date_hak}}"> -->
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pemeganghak</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="control-group">
                        <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="datepicker_tgl_pemeganghak" name="tgl_pemeganghak">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                $('#datepicker_tgl_pemeganghak').daterangepicker({
                    singleDatePicker: true,
                    singleClasses: "picker_3",
                    @if(!empty($object->id))
                    startDate: "{{$object->tgl_pemeganghak->format('m/d/Y')}}"
                    @endif
                }, function(start, end, label) {

                });
                </script>
            </div>

            <div class="x_title">
                <h2>Pembukuan dan Penerbitan Sertifikat</h2>
                <div class="clearfix"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Tempat Pembukuan dan Penerbitan Sertifikat</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="tempat_pps">
                    @foreach($cities as $city)
                        <option value="{{$city}}" @if(!empty($object->tempat_pps) && $city==$object->tempat_pps) selected="" @endif>{{$city}}</option>
                    @endforeach
                    </select>
                    <!-- <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="tempat_pps" value="{{$object->tempat_pps}}"> -->
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pembukuan dan Penerbitan Sertifikat</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="control-group">
                        <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="datepicker_tgl_pps" name="tgl_pps">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                $('#datepicker_tgl_pps').daterangepicker({
                    singleDatePicker: true,
                    singleClasses: "picker_3",
                    @if(!empty($object->id))
                    startDate: "{{$object->tgl_pps->format('m/d/Y')}}"
                    @endif
                }, function(start, end, label) {

                });
                </script>
            </div>
          
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Disahkan Oleh</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="disahkanoleh" value="{{$object->disahkanoleh}}">
                </div>
            </div>

            <div class="ln_solid"></div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">NJOP</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="njop" value="{{$object->njop}}">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Pemegang Hak</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="pemeganghak" value="{{$object->pemeganghak}}">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">NOP</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="nop" value="{{$object->nop}}">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Nomor SSP</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" required="required" class="form-control col-md-7 col-xs-12" name="nomor_ssp" value="{{$object->nomor_ssp}}">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-6">Lampiran</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" class="control-label col-md-3 col-sm-3 col-xs-6" name="lampiran" value="{{$object->lampiran}}">
                </div>
                
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a class="btn btn-primary" href="{{route('ppat_list')}}">Cancel</a>
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