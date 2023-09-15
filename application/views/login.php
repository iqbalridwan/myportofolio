<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BSISG - Login</title>
  <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/datepicker3.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <style>
    body > div:nth-child(1) > div > img{
    margin:20px 40%;
    width: 20%;
}
@media (max-width: 768px){
  body > div:nth-child(1) > div > img{
    margin:20px 25%;
    width: 50%;
}
}
  </style>
</head>
  <div class="row">
        <div class="col-12">
          <img src="<?php echo base_url()?>assets/gambar/logo.jpg"" alt="bsi">
        </div>
  </div>
<body>
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4 col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          Log in

        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
        <div class="panel-body">
          <form role="form" action="<?=site_url('auth/process')?>" method="post">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              </div>
              <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="Remember Me">Remember Me
                </label>
              </div>
              <button class="btn btn-primary" name='login'>Login</button></fieldset>
          </form>
        </div></div>
        </div>
      </div>
    </div><!-- /.col-->

  </div><!-- /.row -->


<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script>
		$(document).ready(function(){
      localStorage.setItem('visited', false);
		})
	</script>
</body>
</html>
