<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/vendor/bootstrap/css/bootstrap.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/vendor/animate/animate.css');?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/vendor/css-hamburgers/hamburgers.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/vendor/animsition/css/animsition.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/vendor/select2/select2.min.css');?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/vendor/daterangepicker/daterangepicker.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/css/util.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/css/main.css');?>">
<!--===============================================================================================-->

<!--	<script type="text/javascript">
		function cekform(){
			if (!$("#username").val()) {
				alert('Please Insert Username');
				$("#username").focus();
				return false;
			}
			if (!$("#pass").val()) {
				alert('Please Insert Password');
				$("#pass").focus();
				return false;
			}
			
		}

	</script>-->

</head>
<body>
	
	<!-- <div class="limiter"> -->
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/frontend/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Login
					</span>
				</div>

				<form method="post" class="login100-form validate-form" action="<?php echo base_url();?>index.php/Login/ceklogin">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="nip" id="nip" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" id="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button name="btLogin" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="<?=base_url('assets/frontend/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets/frontend/vendor/animsition/js/animsition.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets/frontend/vendor/bootstrap/js/popper.js');?>"></script>
	<script src="<?=base_url('assets/frontend/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<!-- =============================================================================================== -->
	<script src="<?=base_url('assets/frontend/vendor/select2/select2.min.js');?>"></script>
<!-- =============================================================================================== -->
	<script src="<?=base_url('assets/frontend/vendor/daterangepicker/moment.min.js');?>"></script>
	<script src="<?=base_url('assets/frontend/vendor/daterangepicker/daterangepicker.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets/frontend/vendor/countdowntime/countdowntime.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets/frontend/js/main.js');?>"></script>

</body>
</html>