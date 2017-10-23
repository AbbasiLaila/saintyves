<!DOCTYPE html>

<html>

  <head>

    <!-- Meta Tags--> 

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Page Title--> 

   <title>St. Yves Admin Panel</title>

    <!-- css files-->    
  	<link rel="shortcut icon" href="<?php echo base_url('assets/images/styves-logo.png')?>">

    <!-- Bootstrap 3.3.5 -->

    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>



    <link rel="stylesheet" href="<?php echo base_url('assets/adminPanel/css/bootstrap.min.css')?>">

    <!-- Font Awesome -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="<?php echo base_url('assets/adminPanel/css/AdminLTE.min.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets')?>/adminPanel/css/_all-skins.min.css">



    <link rel="stylesheet" href="<?php echo base_url('assets')?>/adminPanel/css/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="<?php echo base_url('assets')?>/adminPanel/css/dataTables.bootstrap.css">



    <link rel="stylesheet" href="<?php echo base_url('assets')?>/adminPanel/css/style.css">



<!-- Script Files--> 

  <!-- jQuery 2.1.4 -->

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> 

   <!-- jQuery UI 1.11.4 -->

    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <!-- Bootstrap 3.3.5 -->

    <script src="<?php echo base_url('assets/adminPanel/scripts/bootstrap.min.js')?>"></script>

    <!-- Morris.js charts -->

    <!-- AdminLTE App -->

    <script src="<?php echo base_url('assets/adminPanel/scripts/app.min.js')?>"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->



    <script src="<?php echo base_url('assets/adminPanel/scripts/bootstrap3-wysihtml5.all.min.js')?>"></script>

    <script src="<?php echo base_url('assets/adminPanel/scripts/jquery.dataTables.min.js')?>"></script>

    <script src="<?php echo base_url('assets/adminPanel/scripts/dataTables.bootstrap.min.js')?>"></script>

<script src="<?php echo base_url('assets/adminPanel/ckeditor/ckeditor.js')?>"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets')?>/adminPanel/css/bootstrap-editable.css">



    <script src="<?php echo base_url('assets/adminPanel/scripts/bootstrap-editable.js')?>"></script>
 <script>

      $(function () {

        $('#data-table').DataTable({

          "paging": true,

          "lengthChange": true,

          "searching": true,

          "ordering": true,

          "info": true,

          "autoWidth": false

        });

      });
     $(document).on('submit','form',function(){
  $('.loader').show();
});
    </script>

 </head>



   <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">



      <header class="main-header">

        <!-- Logo -->

        <a href="<?php echo base_url('admin')?>" class="logo">

          <!-- mini logo for sidebar mini 50x50 pixels -->

          <span class="logo-mini">St. Yves</span>

          <!-- logo for regular state and mobile devices -->

          <span class="logo-lg"><b>The Society of</b> St. Yves</span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top" role="navigation">

          <!-- Sidebar toggle button-->

          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

            <span class="sr-only">Toggle navigation</span>

          </a>

          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

         

            

              <!-- User Account: style can be found in dropdown.less -->

              <li class="dropdown user user-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                  <span class="hidden-xs"><i class="fa fa-cog"></i> Account</span>

                </a>

                <ul class="dropdown-menu">

                

                

                  <!-- Menu Footer-->

                  <li class="user-footer">

                    <div class="pull-left">

                      <a href="<?php echo base_url('auth/change_password')?>" class="btn btn-default btn-flat">Change Password</a>

                    </div>

                    <div class="pull-right">

                      <a href="<?php echo base_url('auth/logout')?>" class="btn btn-default btn-flat">Sign out</a>

                    </div>

                  </li>

                </ul>

              </li>

              

            </ul>

          </div>

        </nav>

      </header>

      <!-- Left side column. contains the logo and sidebar -->

      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar">

          <!-- Sidebar user panel -->
	<div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/images/styves-logo.jpg')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>The Society of St. Yves</p>
        </div>
      </div>
         

          <!-- sidebar menu: : style can be found in sidebar.less -->

          <ul class="sidebar-menu">

            <?php $this->load->view('admin/include/sidebar');?>  

          </ul>


<div class="developedby">
      <a href="http://media-clouds.com" target="_blank"><img width="180" src="<?php echo base_url('assets/adminPanel/images/mc2.png')?>" alt="Media Clouds"></a>
      <br>
      Content Management System

    </div>        </section>

        <!-- /.sidebar -->


      </aside>

      <div class="content-wrapper">

      
