<!DOCTYPE html>
<html ng-app="app" id="MainApp" ng-controller="MainController">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $__env->yieldContent('page_title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/bower_components/ngselect2/select2.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/dist/css/AdminLTE.css')); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/dist/css/skins/_all-skins.min.css')); ?>">
  
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')); ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo e(asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('libraries/jquery-confirm/jquery-confirm.min.css')); ?>">

  <link href="<?php echo e(asset('libraries/icheck-1.x/skins/square/blue.css')); ?>" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  
</head>
<body class="hold-transition skin-blue sidebar-mini" ng-cloak>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Shop</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="">
            <a href="<?php echo e(url('admin/logout')); ?>" class="btn btn-warning btn-flat">Thoát</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php echo $__env->make('admin/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>&nbsp;</h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <?php echo $__env->yieldContent('breadcrumb'); ?>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if(Session::has('flash_message')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo e(Session::get('flash_message')); ?>

            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.1
    </div>
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script type="text/javascript" src="asset('ckeditor/ckeditor.js')"></script>
<script src="<?php echo e(asset('AdminLTE/bower_components/jquery/dist/jquery.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/angular.min.js')); ?>"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="<?php echo e(asset('libraries/jquery-confirm/jquery-confirm.min.js')); ?>"></script>
<script src="<?php echo e(asset('libraries/icheck-1.x/icheck.min.js')); ?>"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('AdminLTE/bower_components/ngselect2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('AdminLTE/bower_components/ngselect2/angular-ui-select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('AdminLTE/bower_components/moment/min/moment.min.js')); ?>"></script>
	
<!-- datepicker -->
<script src="<?php echo e(asset('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo e(asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('AdminLTE/dist/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(asset('AdminLTE/common.js')); ?>"></script>
<script src="<?php echo e(asset('AdminLTE/app.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
