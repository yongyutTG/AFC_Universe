<!DOCTYPE html>
<html>
<?php  $_SESSION['base_url'] = base_url(); ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Holiday Data Center</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font  style="background-image: url(<?php echo base_url(); ?>/image/imgs/1543472074340.jpg);"
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
  <style>
  html, body {
  height: 100%;
  overflow: hidden;
  }
  @media (max-width: 768px) {
    html, body {
    }
  }
</style>

</head>
<body class="login-page" style="background-image: url('<?php echo base_url(); ?>assets/login/bg2.jpg');
background: url(<?php echo base_url(); ?>/assets/login/bg4.jpg)
  no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  "
>


<div class="login-box"  >
  <!-- /.login-logo -->
  <div class="login-box-body">
  <div class="login-logo">
    <a href="#"><b>Holiday Management System</b>
        <!--<br>by RA Team V 4.0 -->
    </a>
  </div>

    <?php if ($this->session->flashdata('error')) { ?>
                <div role="alert" class="alert alert-danger">
                   <strong>ERROR !!! </strong>
                   <?php echo $this->session->flashdata('error'); ?>
                </div>
     <?php }else{ ?>
        <p class="login-box-msg">Sign in to start your session</p>
     <?php } ?>

    <form action="login/login_check" method="post">
      <div class="form-group has-feedback">
        <input type="employeeID" name="user_name" class="form-control" placeholder="Employee ID">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
	  <!-- /.col -->
        <div class="col-xs-8">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
