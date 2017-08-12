<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$page->html_title}}</title>

        <!-- Bootstrap -->
        <link href="{{asset('/')}}gen/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('/')}}gen/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('/')}}gen/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="{{asset('/')}}gen/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="{{asset('/')}}gen/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
        <!-- Select2 -->
        <link href="{{asset('/')}}gen/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <!-- Switchery -->
        <link href="{{asset('/')}}gen/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
        <!-- starrr -->
        <link href="{{asset('/')}}gen/vendors/starrr/dist/starrr.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="{{asset('/')}}gen/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{asset('/')}}gen/build/css/custom.min.css" rel="stylesheet">
        <link href="{{asset('/')}}custom.css" rel="stylesheet">
        
        <!-- jQuery -->
        <script src="{{asset('/')}}gen/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{asset('/')}}gen/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="{{asset('/')}}gen/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="{{asset('/')}}gen/vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{asset('/')}}gen/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="{{asset('/')}}gen/vendors/iCheck/icheck.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{asset('/')}}gen/vendors/moment/min/moment.min.js"></script>
        <script src="{{asset('/')}}gen/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="{{asset('/')}}gen/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="{{asset('/')}}gen/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="{{asset('/')}}gen/vendors/google-code-prettify/src/prettify.js"></script>
        <!-- jQuery Tags Input -->
        <script src="{{asset('/')}}gen/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <!-- Switchery -->
        <script src="{{asset('/')}}gen/vendors/switchery/dist/switchery.min.js"></script>
        <!-- Select2 -->
        <script src="{{asset('/')}}gen/vendors/select2/dist/js/select2.full.min.js"></script>
        <!-- Parsley -->
        <script src="{{asset('/')}}gen/vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Autosize -->
        <script src="{{asset('/')}}gen/vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="{{asset('/')}}gen/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="{{asset('/')}}gen/vendors/starrr/dist/starrr.js"></script>
        
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="{{route('index')}}" class="site_title"><img src="INI.png" alt="..." class="img-circle profile_img"><span>{{config('app.name')}}</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="{{asset('/')}}gen/production/images/user.png" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2>{{Auth::user()->name}}</h2>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            @if(Auth::user()->divisi==='Admin'||Auth::user()->divisi==='Notaris')
                            <div class="menu_section">
                                <h3>Penjadwalan</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-edit"></i> Jadwal <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('jadwal_createEdit','new')}}">Jadwal Baru</a></li>
                                            <li><a href="{{route('jadwal_list')}}">Lihat Jadwal</a></li>
                                            <li><a href="{{route('jadwal_calendar')}}">Kalendar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            
                            <div class="menu_section">
                                <h3>Transaksi</h3>
                                <ul class="nav side-menu">
                                    @if(Auth::user()->divisi==='Umum'||Auth::user()->divisi==='Developer'||Auth::user()->divisi==='Notaris')
                                    <li><a><i class="fa fa-edit"></i> PPAT <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('ppat_list')}}">Lihat PPAT</a></li>
                                            <li class="sub_menu"><a><i class="fa fa-home"></i> Properti <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('properti_createEdit','new')}}">Properti Baru</a></li>
                                                <li><a href="{{route('properti_list')}}">Lihat Properti</a></li>
                                            </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                    
                                    @if(Auth::user()->divisi==='Perseroan'||Auth::user()->divisi==='Notaris')
                                    <li><a><i class="fa fa-edit"></i> Legal <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu"><!-- 
                                            <li><a href="{{route('legal_createEdit','new')}}">Legal Baru</a></li> -->
                                            <li><a href="{{route('legal_list')}}">Lihat Legal</a></li>
                                        </ul>
                                    </li>
                                    @endif

                                    @if(Auth::user()->divisi==='Perseroan'||Auth::user()->divisi==='Notaris')
                                    <li><a><i class="fa fa-edit"></i> Notariil <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu"><!-- 
                                            <li><a href="{{route('notariil_createEdit','new')}}">Notariil Baru</a></li> -->
                                            <li><a href="{{route('notariil_list')}}">Lihat Notariil</a></li>
                                        </ul>
                                    </li>
                                    @endif

                                    @if(Auth::user()->divisi==='Umum'||Auth::user()->divisi==='Notaris')
                                    <li><a><i class="fa fa-edit"></i> Warmerken <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu"><!-- 
                                            <li><a href="{{route('warmerken_createEdit','new')}}">Warmerken Baru</a></li> -->
                                            <li><a href="{{route('warmerken_list')}}">Lihat Warmerken</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            

                            <div class="menu_section">
                                <h3>Dokumen</h3>
                                <ul class="nav side-menu">
                                    @if(Auth::user()->divisi==='Notaris')
                                    <li><a><i class="fa fa-edit"></i> SK <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('sk_createEdit','new')}}">SK Baru</a></li>
                                            <li><a href="{{route('sk_list')}}">Lihat SK</a></li>
                                        </ul>
                                    </li>
                                    @endif

                                    @if(Auth::user()->divisi==='Umum'||Auth::user()->divisi==='Admin'||Auth::user()->divisi==='Perseroan'||Auth::user()->divisi==='Developer'||Auth::user()->divisi==='Lapangan'||Auth::user()->divisi==='Notaris')
                                    <li><a><i class="fa fa-edit"></i>Klien<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('klien_createEdit','new')}}">Klien Baru</a></li>
                                            <li><a href="{{route('klien_list')}}">Lihat Klien</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            

                            <div class="menu_section">
                                <h3>Administrasi</h3>
                                <ul class="nav side-menu">
                                    @if(Auth::user()->divisi==='Umum'||Auth::user()->divisi==='Perseroan'||Auth::user()->divisi==='Developer'||Auth::user()->divisi==='Lapangan'||Auth::user()->divisi==='Admin'||Auth::user()->divisi==='Notaris')
                                    <li><a><i class="fa fa-edit"></i> Retribusi <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('retribusi_createEdit','new')}}">Retribusi Baru</a></li>
                                            <li><a href="{{route('retribusi_list')}}">Lihat List Retribusi</a></li>
                                            <li><a href="{{route('retribusi_detail')}}">Lihat Detil Retribusi</a></li>
                                        </ul>
                                    </li>
                                    @endif

                                    @if(Auth::user()->divisi==='Developer'||Auth::user()->divisi==='Admin'||Auth::user()->divisi==='Notaris')
                                    <li><a><i class="fa fa-edit"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('transaksi_createEdit','new')}}">Transaksi Baru</a></li>
                                            <li><a href="{{route('transaksi_detail')}}">Lihat Detil Transaksi</a></li>
                                            <li><a href="{{route('transaksi_list')}}">Lihat List Transaksi</a></li>
                                            <li><a href="{{route('revenue')}}">Lihat Revenue</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                    @if(Auth::user()->divisi==='Notaris')
                                    <li><a><i class="fa fa-edit"></i> User <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('user_createEdit','new')}}">User Baru</a></li>
                                            <li><a href="{{route('user_list')}}">Lihat User</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="images/img.jpg" alt="">{{Auth::user()->name}}
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;"> Profile</a></li>
                                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>{{$page->title}}</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        &copy; {{date("Y")}} | {{config('app.copyright')}},
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        <!-- Custom Theme Scripts -->
        <script src="{{asset('/')}}gen/build/js/custom.min.js"></script>
        @if(session()->has('success'))
        <script type="text/javascript">
            $(window).on('load',function(){
                $('#modal_success').modal('show');
            });
        </script>
        <div id="modal_success" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: block; padding-right: 17px;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content panel-success">

                    <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Sukses</h4>
                    </div>
                    <div class="modal-body">
                        <p>Data berhasil disimpan.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </body>
</html>