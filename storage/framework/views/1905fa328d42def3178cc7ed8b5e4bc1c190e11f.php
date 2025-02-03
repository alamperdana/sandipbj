<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pengajuan Akun | SANDI PBJ</title>
<meta name="keywords" content="HTML5,CSS3,HTML,Template,Multi-Purpose,M_Adnan,Corporate Theme,Museum HTML5 Template Purpose,Museum - Premium HTML5 Template,Museum - Premium HTML5 Template">
<meta name="description" content="Museum - Premium HTML5 Template">
<meta name="author" content="M_Adnan">

<!-- FONTS ONLINE -->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,800,700italic' rel='stylesheet' type='text/css'>

<!--MAIN STYLE-->
<link href="/public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/public/assets/css/main.css" rel="stylesheet" type="text/css">
<!-- ini yang css dipake 1-->
<link href="/public/assets/css/style.css" rel="stylesheet" type="text/css">
<link href="/public/assets/css/responsive.css" rel="stylesheet" type="text/css">
<link href="/public/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="/public/assets/rs-plugin/css/settings.css" media="screen" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
s
<!-- Page Wrap -->
<div id="wrap">

  <!-- Header -->
  <header>
    <!-- Top Bar -->
    <div class="container">
      <div class="top-bar">
        <div class="open-time">
          <p><i class="ion-ios-clock-outline"></i> Work Hours : Monday (07.15 AM - 16.15 PM)- Friday (07.15 AM- 11.00 AM) </p>
        </div>
        <!--
        <div class="call">
          <p><i class="ion-headphone"></i> (0741) 444914</p>
        </div>
        -->
      </div>
    </div>

    <!-- Logo -->
    <div class="container">
      <div class="logo"> <a href="http://sandipbj.jambikota.go.id/public/"><img src="/public/assets/img/logo.png" alt=""></a> </div>

      <!-- Nav -->
      <nav>
        <ul id="ownmenu" class="ownmenu">
          <!--<li><a href="contact.html"> Contact</a></li>-->
        </ul>
      </nav>
    </div>
  </header>
  <!-- Header End -->

  <!--======= HOME MAIN SLIDER =========-->
  <section class="sub-bnr sub-sponse" data-stellar-background-ratio="0.10">
    <div class="overlay-gr">
      <div class="container">
        <h2>Pengajuan Akun</h2>
        <p>FORMULIR LAYANAN PEMBUATAN AKUN NON PENYEDIA PBJ KOTA JAMBI</p>
      </div>
    </div>
  </section>

  <!-- Breadcrumb -->
  <ol class="breadcrumb">
    <li><a href="http://sandipbj.jambikota.go.id/public/">Home</a></li>
    <li class="active">Pengajuan Akun</li>
  </ol>

  <!-- CONTENT START -->
  <div class="content">
    <div class="container">
      <!--======= sponsors =========-->
      <div class="sponser-page">

        <!-- tampilan lama siapes -->
        <div class="row">
        <?php if(session()->has('alert')): ?>
            <div class="col-md-12">
                <?php echo $__env->make('includes.alert', ['type' => json_decode(session()->get('alert'))->type,
                'message' => json_decode(session()->get('alert'))->message], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title"></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(url('home/pengajuan/submit')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label><h6>Nama Pegawai</h6></label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><h6>NIP</h6></label>
                                    <input type="text" class="form-control"name="nip" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label><h6>NIK</h6></label>
                                  <input type="text" class="form-control"name="nik" required>
                              </div>
                          </div>
                      </div>
                      
                      <!--bagian ditambah-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h6>OPD</h6></label>
                                    <select name="skpd" id="skpd" class="form-control" required>
                                        <option value="" selected="true" disabled="disabled">-- OPD --</option>
                                        <?php $__currentLoopData = $data['skpd']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row['id']); ?>"><?php echo e($row['nama_skpd']); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                                                
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h6>BAGIAN/KELURAHAN OPD *(KHUSUS DINKES, SETDA, DAN KECAMATAN)</h6></label>
                                    <select name="cabang_skpd" id="cabang_skpd" class="form-control" required>
                                        <option value="" selected="true" disabled="disabled">-- BAGIAN/KELURAHAN OPD --</option>
                                    </select>
                                </div>
                            </div>
                        </div> 
                        
                        
                                                <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h6>GOLONGAN DAN RUANG</h6></label>
                                    <select name="pangkat_pegawai_id" id="" class="form-control" required>
                                        <option value="" selected="true" disabled="disabled">-- Pilih Golongan & Ruang --</option>
                                        <?php $__currentLoopData = $data['jabatan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row['id']); ?>"><?php echo e($row['pangkat']); ?> - <?php echo e($row['golongan']); ?>/<?php echo e($row['ruang']); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <!-- <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label><h6>OPD</h6></label>
                                    <input type="text" class="form-control" name="opd" required>
                                </div>
                            </div> -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h6>Jenis Pengajuan</h6></label>
                                    <select name="type_pengajuan" id="jenis_pengajuan" class="form-control">
                                        <option value="Pa">PA</option>
                                        <option value="PPKom">PPKom</option>
                                        <option value="Pejabat Pengadaan">Pejabat Pengadaan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label><h6>Nomor Telepon PA/PPKom/PPBJ </h6></label>
                                    <input type="number" name="telepon" class="form-control" required>
                                </div>
                            </div>
                        

                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label><h6>Email PA/PPKom/PPBJ</h6></label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-grou">
                                    <label><h6>Alamat PA/PPKom/PPBJ</h6></label>
                                    <textarea class="form-control textarea" name="alamat"></textarea>
                                </div>
                            </div>
                        </div>

                    </br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><h6>Sertifikat Pengadaan Barang/Jasa</h6></label>
                                <input type="text" class="form-control"name="sertifikat">
                            </div>
                        </div>
                    </div>

                        <div class="row">
                          <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label><h6>Nomor SK / Surat Tugas</h6></label>
                                <input type="text" class="form-control" name="nomor_sk" required>
                            </div>
                        </div>

                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label><h6>Masa Berlaku SK</h6></label>
                                    <input type="date" class="form-control datepick" name="masa_berlaku" required data-date-format="DD MMMM YYYY">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label><h6> keterangan</h6></label>
                                  <textarea class="form-control textarea" name="keterangan" placeholder=" Tahun : 2022
Jabatan dalam OPD : "></textarea>
                              </div>
                          </div>
                        </div>

                            <div class="col-md-6 pl-1">
                                <label><h6>Lampiran SK / Surat Tugas (PDF dan Maks 2 MB)</h6> </label><br>
                                <input type="file" name="file" class="form-control-file" id="file_picker" accept="image/jpeg,image/png,application/pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            </div>

                            </br>
                            <div class="col-md-6 pl-1">
                                <label><h6>Lampiran Tanda Tangan Yang Mengajukan(JPG dan Maks 2 MB)</h6> </label><br>
                                <input type="file" name="file2" class="form-control-file" id="file_picker" accept="image/jpeg,image/png,application/pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                            </div>

                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <!--</div>
                  <?php echo $__env->make('home.page_info.pengajuan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>-->
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
                <p> <img src="/public/assets/img/logo-footer.png">
                  <i class="fa fa-map-marker"></i>PBJAP, Jl. Jend. Basuki Rahmat Kota Baru Kota Jambi, Jambi 36129</p>
              </li>
              
              <!--
              <li>
                <p> <i class="fa fa-phone"></i>(0741) 444914</p>
              </li>
              -->
              
              <li>
                <p> <i class="fa fa-envelope"></i>ulpjambikota@gmail.com</p>
              </li>
            </ul>
            <ul class="social-link">
              
              <!--
              <li><a href="#.">Facebook </a></li>
              <li><a href="#."> Twitter </a></li>
              <li><a href="#."> Linkedin </a></li>
              -->
              
              <li><a href="https://www.instagram.com/bagianpbjap_jambikota/"> instagram </a></li>
            </ul>
          </div>
        </div>
      </footer>
</div>
<!-- Wrap End -->

<script src="/public/assets/js/jquery-1.11.0.min.js"></script>
<script src="/public/assets/js/bootstrap.min.js"></script>
<script src="/public/assets/js/own-menu.js"></script>
<script src="/public/assets/js/owl.carousel.min.js"></script>
<script src="/public/assets/js/jquery.stellar.min.js"></script>
<script src="/public/assets/js/smooth-scroll.js"></script>
<script src="/public/assets/js/jquery.prettyPhoto.js"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="/public/assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/public/assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="/public/assets/js/main.js"></script>

<script>
  $('#skpd').change(function(){
    $.ajax({
        type : 'GET',
        url  : "/public/skpd/getdata/" + this.value,
        success :  function(response){
          $('#cabang_skpd').empty();
          response.forEach(item => {
                $('#cabang_skpd').append('<option value="'+ item.id +'">' + item.nama_cabang + '</option>');
            });
        },
        error: function(xhr){
          alert("error");
        }
    });
  });
</script>

</body>
</html>
<?php /**PATH /home/sandipbj/public_html/resources/views/home/pages/pengajuan.blade.php ENDPATH**/ ?>