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

<body class="login-page"  style="background-image: url('<?php echo base_url(); ?>assets/login/bg2.jpg');
background: url(<?php echo base_url(); ?>/assets/login/bg4.jpg)
  no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  ">


<div class="login-box retrive-password">
    <div class="login-box-body  animated fadeInUp" data-animation="fadeInUp">
        <p class="login-box-msg">AFC Management System</p>
        <div class="panel panel-default">
            <div class="panel-heading">Forget Password</div>
            <div class="panel-body">

                <form method="post" action="<?php echo base_url() ?>forget_password/retrieve_password">
                    <?php echo $this->session->flashdata('error'); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                    </div>

                    <button type="submit" class="btn bg-navy btn-block">Retrieve Password</button>
                </form>
                <br/>
                <a href="<?php echo base_url() ?>">Back to Login Page</a>

            </div>
        </div>



    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

</body>
</html>
