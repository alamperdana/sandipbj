<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Museum - Premium HTML5 Template</title>
<meta name="keywords" content="HTML5,CSS3,HTML,Template,Multi-Purpose,M_Adnan,Corporate Theme,Museum HTML5 Template Purpose,Museum - Premium HTML5 Template,Museum - Premium HTML5 Template">
<meta name="description" content="Museum - Premium HTML5 Template">
<meta name="author" content="M_Adnan">

<!-- FONTS ONLINE -->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800,700italic' rel='stylesheet' type='text/css'>

<!--MAIN STYLE-->
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../../assets/css/main.css" rel="stylesheet" type="text/css">
<link href="../../assets/css/style.css" rel="stylesheet" type="text/css">
<link href="../../assets/css/responsive.css" rel="stylesheet" type="text/css">
<link href="../../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="../../assets/rs-plugin/css/settings.css" media="screen" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<!-- Page Wrap -->
<div id="wrap"> 
  
  <!-- Header -->
  <header> 
    <!-- Top Bar -->
    <div class="container">
      <div class="top-bar">
        <div class="open-time">
          <p><i class="ion-ios-clock-outline"></i> Museum opening hours: 8AM to 7PM. Open all days</p>
        </div>
        <div class="call">
          <p><i class="ion-headphone"></i> 1800 123  4659</p>
        </div>
      </div>
    </div>
    
    <!-- Logo -->
    <div class="container">
      <div class="logo"> <a href="#."><img src="../../assets/img/logo.png" alt=""></a> </div>
      
      <!-- Nav -->
      <nav>
        <ul id="ownmenu" class="ownmenu">
          <li><a href="contact.html"> Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- Header End --> 
  
  <!--======= HOME MAIN SLIDER =========-->
  <section class="sub-bnr sub-sponser" data-stellar-background-ratio="0.3">
    <div class="overlay-gr">
      <div class="container">
        <h2>Pengajuan Akun</h2>
        <p>FORMULIR PERMINTAAN PEMBUATAN AKUN USER PELAKU PENGADAAN</p>
      </div>
    </div>
  </section>
  
  <!-- Breadcrumb -->
  <ol class="breadcrumb">
    <li><a href="#.">Home</a></li>
    <li class="active">Pengajuan Akun</li>
  </ol>
  
  <!-- CONTENT START -->
  <div class="content">
    <div class="container"> 
      <!--======= sponsors =========-->
      <div class="sponser-page">

        <!-- tampilan lama siapes -->
        <div class="row">
        @if(session()->has('alert'))
            <div class="col-md-12">
                @include('includes.alert', ['type' => json_decode(session()->get('alert'))->type,
                'message' => json_decode(session()->get('alert'))->message])
            </div>
        @endif
        <div class="col-md-6">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title"></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('home/pengajuan/submit')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Nama Pegawai</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIP</label>
                                    <input type="text" class="form-control" name="nip" required>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="pangkat_pegawai_id" id="" class="form-control" required>
                                        <option value="" selected="true" disabled="disabled">-- Pilih Jabatan & Golongan --</option>
                                        @foreach($data as $row)
                                            <option value="{{$row['id']}}">{{$row['pangkat']}} - {{$row['golongan']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="number" name="telepon" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control textarea" name="alamat"></textarea>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>SKPD</label>
                                    <input type="text" class="form-control" name="skpd" required>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Jenis Pengajuan</label>
                                    <select name="type_pengajuan" id="jenis_pengajuan" class="form-control">
                                        <option value="PPKom">PPKom</option>
                                        <option value="Pejabat Pengadaan">Pejabat Pengadaan</option>
                                        <option value="Pejabat Pemesan (apabila personil bukan PPKom dan Pejabat Pengadaan)">Pejabat Pemesan (apabila personil bukan PPKom dan Pejabat Pengadaan)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Mulai Masa Berlaku SK</label>
                                    <input type="date" class="form-control datepick" name="masa_berlaku" required data-date-format="DD MMMM YYYY">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Akhir Masa Berlaku SK</label>
                                    <input type="date" class="form-control datepick" name="akhir_masa_berlaku" required data-date-format="DD MMMM YYYY">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Nomor SK / Surat Tugas</label>
                                    <input type="text" class="form-control" name="nomor_sk" required>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <label>Lampiran SK / Surat Tugas</label> <br>
                                <input type="file" name="file" class="form-control-file" id="file_picker" accept="image/jpeg,image/png,application/pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('home.page_info.pengajuan')
    </div>
      </div>
    </div>
  </div>
  
  <!--======= Footer =========-->
  <footer>
    <div class="container"> 
      
      <!-- Footer Link -->
      <!--
      <ul class="foot-link">
        <li><a href="#."> Home </a></li>
        <li><a href="#."> HISTORY </a></li>
        <li><a href="#."> Gallery </a></li>
        <li><a href="#."> Events </a></li>
        <li><a href="#."> news </a></li>
        <li><a href="#."> Contact</a></li>
      </ul>
    -->
    
      <!-- Footer Logo -->
      <!--
      <div class="foot-logo"> <img src="../../assets/img/logo-footer.png" alt=""> </div>
      -->

           <!-- Footer Logo -->
           <div class="under-footer">
            <ul class="con-info">
              <li>
                <p> <img src="../../assets/img/logo-footer.png">
                  <i class="fa fa-map-marker"></i>PBJAP Kota Jambi, Jambi 36129</p>
              </li>
              <li>
                <p> <i class="fa fa-phone"></i>(0741) 444914</p>
              </li>
              <li>
                <p> <i class="fa fa-envelope"></i>ulpjambikota@gmail.com</p>
              </li>
            </ul>
            <ul class="social-link">
              <li><a href="#.">Facebook </a></li>
              <li><a href="#."> Twitter </a></li>
              <li><a href="#."> Linkedin </a></li>
              <li><a href="#."> instagram </a></li>
            </ul>
          </div>
        </div>
      </footer>
</div>
<!-- Wrap End --> 

<script src="../../assets/js/jquery-1.11.0.min.js"></script> 
<script src="../../assets/js/bootstrap.min.js"></script> 
<script src="../../assets/js/own-menu.js"></script> 
<script src="../../assets/js/owl.carousel.min.js"></script> 
<script src="../../assets/js/jquery.stellar.min.js"></script> 
<script src="../../assets/js/smooth-scroll.js"></script> 
<script src="../../assets/js/jquery.prettyPhoto.js"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="../../assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="../../assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="../../assets/js/main.js"></script>
</body>
</html>