<?php
include('login.php'); // Includes Login Script
if ( isset( $_SESSION[ 'login_user' ] ) ) {
	header( "location: profile.php" );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMS : Library Management System</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/styleCommon.css" rel="stylesheet" type="text/css">
	<link href="style1.css" rel="stylesheet" type="text/css">
</head>

<body style="background-size:100%" background="images/library.jpg">
	<div id="mainWrap">
		<div class="container">
			<div class="row" style="margin-top: 2em">
				<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 loginForm">
					<img src="images/logo.png" class="img-responsive" alt="logo">
					<h2>&nbsp &nbsp Library Management System <h2>
					<form role="form" method="post">
						<fieldset>
							<hr class="colorgraph">
							<div class="form-group">
								<input type="text" name="user" id="email" class="form-control input-lg" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" name="pass" id="password" class="form-control input-lg" placeholder="Password">
							</div>
							<hr class="colorgraph">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<input type="submit" class="btn btn-lg btn-success btn-block" name="submit" value="Sign In">
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<a href="register.php" class="btn btn-lg btn-primary btn-block">Register</a>
								</div>
							</div>
						</fieldset>
					</form>
					<span><?php echo $error; ?></span>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/customscript.js"></script>
</body>
</html>