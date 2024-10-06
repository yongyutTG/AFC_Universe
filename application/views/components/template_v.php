<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Revenue Administater</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->

  <link rel="stylesheet" href="<?php echo base_url();?>plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">


  <link rel="stylesheet" media="screen" href="<?php echo base_url();?>css/highcharts.css" type="text/css"/>
<!-- --> <link rel="stylesheet" media="screen" href="<?php echo base_url();?>css/bootstrap-cerulean_competency.css" type="text/css"/>
    <!-- jQuery -->
<script src="<?php echo base_url() ?>plugins/jquery/jquery.min.js"></script>
  <!-- DataTables -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>


  <script src="<?php echo base_url();?>js/highcharts.js"></script>
  <script src="<?php echo base_url();?>js/exporting.js"></script>
  <script src="<?php echo base_url();?>js/export-data.js"></script>
  <script src="<?php echo base_url();?>js/accessibility.js"></script>

  <script src="<?php echo base_url();?>plugins/Chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url();?>plugins/Chart.js/utils.js"></script>

  <!-- date-range-picker -->
<script src="<?php echo base_url();?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/sweetalert2/sweetalert2.min.css"/>

  <?php

    $year = date('Y');
    if (isset($extraHeadContent)) {
      echo $extraHeadContent;
    }
  ?>

</head>
<!-- <body class="hold-transition sidebar-mini sidebar-collapse"> -->
<body class="hold-transition layout-top-nav">
<!-- Site wrapper -->
<div class="wrapper">
<?php //$this->view('components/sidebar'); ?>
<?php $this->view('components/sidebar0'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <?php $this->view(@$content); ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; <?php echo $year-2; ?>-<?php echo $year; ?>  <a href="https://KornDesign.io">KornDesign Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>



<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>dist/js/demo.js"></script>
 <?php $this->view('ajax_loading_v');?>

 <div class="modal modal-backdrop" id="modal_overlay" style=" background: rgb(255,255,255,1) ">
         <div class="preloader" style=" position: fixed;
                       width: 100%;
                       height: 100%;
                       top: 0;
                       left: 0;
                       z-index: 100000;
                       backface-visibility: hidden;
                       background: #ffffff;
                       ">
             <div class="preloader_img" style="width: 200px;
                   height: 200px;
                   position: absolute;
                   left: 48%;
                   top: 48%;
                   background-position: center;
                 z-index: 999999
            ">
                 <img src="img/loader.gif" style=" width: 40px;" alt="loading...">
             </div>
         </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->

</body>
</html>
