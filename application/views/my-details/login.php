<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
        <title>Login</title>
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/modernizr/modernizr.js"></script>

	</head>

	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">


				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none" style="background-color: #cccccc;"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body" style="background-color: #272a3d; border-top-color: #cccccc;">
                            <div class="col-md-12" style="text-align: center; padding-bottom: 10px;">

					          <img src="<?php echo base_url(); ?>/catalogs/assets/images/logo.png" width="100" alt="Porto Admin" />

                           </div>
						    <?php echo @$message; ?>
							<form action="" method="post">
							<div class="form-group mb-lg">
								<!--<label>Username</label> -->
								<div class="input-group input-group-icon">
									<input id="email" name="email" type="text" class="form-control input-lg" placeholder="User Name"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<!--<div class="clearfix">
									<label class="pull-left">Password</label>
									<a href="pages-recover-password.html" class="pull-right">Lost Password?</a>
								</div>-->
								<div class="input-group input-group-icon">
									<input id="password" name="password" type="password" class="form-control input-lg" placeholder="Password"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">

								</div>
								<div class="col-sm-4 text-right">
								   <button type="submit" id="btn-form-submit" class="btn btn-primary">Login</button>
                    <input id="form-submit" style="visibility:hidden;"  name="submit" value="submit" />


								</div>
							</div>
                            <br>

						 </form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2020. All rights reserved. </p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/theme.init.js"></script>

	<script type="text/javascript">

    $(document).ready(function(){

      $("#btn-form-submit").click(function(){
        validate_Form();
      });
      function validate_Form(){
        var nameReg = /^([A-Za-z]{3,})+$/;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var numbReg = /^([789][0-9]{9,9})+$/;
        var valid_email = $("#valid_email input").val();
        var valid_pass = $("#valid_pass input").val();
        var valid_type = $("#valid_type select").val();
        if(valid_email == ''){
          $("#valid_email span").text('Field required.');
          $("#valid_email span").css('display', 'block');
        } else if(!emailReg.test(valid_email)) {
          $("#valid_email span").text('Please enter valid Email.');
          $("#valid_email span").css('display', 'block');
        } else {
          $("#valid_email span").css('display', 'none');
          svalid_email = "OK";
        }
        if(valid_pass == ''){
          $("#valid_pass span").css('display', 'block');
        } else {
          $("#valid_pass span").css('display', 'none');
          svalid_pass = "OK";
        }
        if(valid_type == ''){
          $("#valid_type span").css('display', 'block');
        } else {
          $("#valid_type span").css('display', 'none');
          svalid_type = "OK";
        }
        if(svalid_email == 'OK' && svalid_pass == 'OK' && svalid_type == 'OK'){
          $("#form-submit").click();
        }
      }
      $("#notification").delay(3000);
      $("#notification").fadeOut('slow');
    });

  </script>
	</body>
</html>
