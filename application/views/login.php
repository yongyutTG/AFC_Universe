<!DOCTYPE>
<html>
    <head>
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=UTF-8"/>
        <META name="viewport" content="width=device-width, initial-scale=1.0" />
        <META http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
        <META http-equiv=Cache-Control content=no-Cache/>
        <META NAME="Generator" CONTENT=""/>
        <META NAME="Author" CONTENT="สิบเอกจักรพันธ์ สัตยธรรมกุล"/>
        <META NAME="Description" CONTENT=" "/>
        <title>AFC MGMT</title>
                <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/login/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/login/admin.css" rel="stylesheet" type="text/css" />

        <!-- All Icon  CSS -->
        <link href="<?php echo base_url(); ?>assets/login/font-icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/font-icons/entypo/css/entypo.css" >
        <!-- Data Table  CSS -->
        <link href="<?php echo base_url(); ?>assets/login/plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>asset/js/html5shiv.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>asset/js/respond.min.js" type="text/javascript"></script>
        <![endif]-->
<script src="<?php echo base_url(); ?>assets/login/jquery-1.10.2.min.js"  charset="UTF-8"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.8.0.min.js"  charset="UTF-8"></script>-->

<script src="<?php echo base_url();?>assets/login/jquery.autocomplete.js"  charset="UTF-8"></script>
<link href="<?php echo base_url(); ?>assets/login/jquery.autocomplete.css" rel="stylesheet" type="text/css" />


        <!-- ALl Custom Scripts
        <script src="<?php echo base_url(); ?>assets/login/admin.js"></script>-->

<link href="<?php echo base_url(); ?>assets/login/animation.css" rel="stylesheet">
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
  " >
<?php
    $error = $this->session->flashdata('error');
    //echo $error;
?>


<div class="login-box">
    <div class="login-box-body  animated fadeInUp" data-animation="fadeInUp">
        <p class="login-box-msg">AFC Management System</p>
        <form role="form" action="<?php echo base_url() ?>login/login_check" method="post">
        <!-- <form role="form" action="<?php echo base_url() ?>Auth/login" method="post"> --><!--   AD Login -->
       <?php if (!empty($error)) { ?>
        <div class="alert alert-danger" style="text-align:center;">
            <?php
                echo validation_errors();
                echo $error;
            ?>
       </div>
       <?php } ?>

            <div class="form-group has-feedback">
                <input type="text" name="user_name" class="form-control" placeholder="Username" required="required" value="<?php echo @$user?>"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required="required" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <button type="submit" class="btn bg-orange btn-block btn-flat">Login</button>
            </div>
            <div class="row">

                <div class="col-xs-12">

                </div><!-- /.col -->
            </div>
        </form>



        <a href="<?php echo base_url()?>forget_password">I forgot my password</a><br>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</div>
</div>

</body>
</html>
