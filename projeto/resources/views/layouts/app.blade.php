<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Projeto</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/plugins/blueimp/css/blueimp-gallery.min.css')}}" rel="stylesheet">

    <!-- DATA Table -->
    <link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{asset('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">

    <!-- SUMMERNOTE -->
    <link href="{{asset('assets/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <script src="{{asset('tinymce5/tinymce.min.js')}}"></script>
    <!--<script src="{{asset('tinymce542/tinymce.min.js')}}"></script>!-->
    <!--<script src="{{asset('tinymce4/tinymce.min.js')}}"></script>!-->
    <!-- <script src="https://cdn.tiny.cloud/1/o62d8ne69x69dzy8eikoo6jcnu83gruv09n9s3m2qzpuuitg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>!-->

</head>

<body class="">

    <div id="wrapper">

        @include('layouts.menu')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <!--
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                        !-->
                    </div>
                    <ul class="nav navbar-top-links navbar-right">

                        @include('layouts.alertas')

                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                {{ Auth::user()->email }}<i class="fa caret"></i>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="#">Meu dados</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    </ul>

                </nav>
            </div>

            @yield('content')




            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Toastr -->
    <script src="{{asset('assets/js/plugins/toastr/toastr.min.js')}}"></script>

    <!-- Sweet alert -->
    <script src="{{asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Input Mask-->
    <script src="{{asset('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>

    <!-- DATA Table -->
    <script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- SUMMERNOTE -->
    <script src="{{asset('assets/js/plugins/summernote/summernote-bs4.js')}}"></script>

    <!-- blueimp gallery -->
    <script src="{{asset('assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('assets/js/inspinia.js')}}"></script>
    <script src="{{asset('assets/js/plugins/pace/pace.min.js')}}"></script>

    <!-- iCheck -->
    <script src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>



    @yield('scriptsfinais')

    <script>
        $(document).ready(function() {
            @include('layouts._toasters')
        });
    </script>


</body>

</html>