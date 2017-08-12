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
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                <!-- page content -->
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @yield('content')
                    </div>
                </div>
                <!-- /page content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="gen/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="gen/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="gen/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="gen/vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="gen/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="gen/vendors/iCheck/icheck.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="gen/vendors/moment/min/moment.min.js"></script>
        <script src="gen/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="gen/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="gen/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="gen/vendors/google-code-prettify/src/prettify.js"></script>
        <!-- jQuery Tags Input -->
        <script src="gen/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <!-- Switchery -->
        <script src="gen/vendors/switchery/dist/switchery.min.js"></script>
        <!-- Select2 -->
        <script src="gen/vendors/select2/dist/js/select2.full.min.js"></script>
        <!-- Parsley -->
        <script src="gen/vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Autosize -->
        <script src="gen/vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="gen/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="gen/vendors/starrr/dist/starrr.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="gen/build/js/custom.min.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="gen/build/js/custom.min.js"></script>

    </body>
</html>
