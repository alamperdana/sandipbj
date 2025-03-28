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
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('assets/img/apple-icon.png')); ?>">
    <!<link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?php echo e($data['title']); ?>

    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/paper-home.css?v=2.0.1')); ?>" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo e(asset('assets/demo/demo.css')); ?>" rel="stylesheet" />
    <script src="<?php echo e(asset('assets/js/core/jquery.min.js')); ?>"></script>
</head>
<body class="">
<div class="wrapper">
    <div>
        <div class="content">
            <?php echo $__env->make($data['page'], ['data' => $data['data']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="<?php echo e(asset('assets/js/core/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/core/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')); ?>"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="<?php echo e(asset('assets/js/plugins/chartjs.min.js')); ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo e(asset('assets/js/plugins/bootstrap-notify.js')); ?>"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo e(asset('assets/js/paper-dashboard.min.js?v=2.0.1')); ?>" type="text/javascript"></script>
</body>
</html>
<?php /**PATH /home/sandipbj/public_html/resources/views/home/layout.blade.php ENDPATH**/ ?>