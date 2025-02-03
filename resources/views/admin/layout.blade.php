<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        {{$data['title']}}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="{{url()->current()}}" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="{{url('assets/img/logo-small.png')}}">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a href="{{url()->current()}}" class="simple-text logo-normal">
                SANDI PBJ
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li id="dashboard_menu">
                    <a href="{{url('/admin')}}">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li id="jabatan_menu">
                    <a href="{{url('/admin/jabatan')}}">
                        <i class="nc-icon nc-badge"></i>
                        <p>Jabatan</p>
                    </a>
                </li>
                <li id="pegawai_menu">
                    <a href="{{url('/admin/pegawai')}}">
                        <i class="nc-icon nc-tie-bow"></i>
                        <p>Info Pengaju</p>
                    </a>
                </li>
                <li id="pengajuan_menu">
                    <a href="{{url('/admin/pengajuan')}}">
                        <i class="nc-icon nc-paper"></i>
                        <p>Pengajuan</p>
                    </a>
                </li>

                <li id="buatbaru_menu">
                    <a href="{{url('/admin/buatakun')}}">
                        <i class="nc-icon nc-paper"></i>
                        <p>Buat Akun</p>
                    </a>
                </li>

                <li>
                    <a href="{{url('/logout')}}">
                        <i class="nc-icon nc-settings"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-panel" style="height: 100vh;">


        <!-- Navbar -->
    @include('includes.navbar', ['data' => $data])
    <!-- End Navbar -->
        <div class="content">
            @include($data['page'], ['data' => $data['data']])
        </div>


        @include('includes.footer')
    </div>
</div>

<script>
    $("#{{$data['menu']}}_menu").addClass("active");
</script>

<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script>


</body>

</html>
