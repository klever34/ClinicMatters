<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php

		 $username = "";

		 if ($_SERVER["REQUEST_METHOD"] == "POST") {


			 $username	= test_input($_POST['username']);
			 $password	= test_input($_POST['password']);
			 $found_admin = attempt_login($username,$password);

			 if($found_admin){
			 $_SESSION["admin_id"] = $found_admin["id"];
			 $_SESSION["username"] = $found_admin["username"];

			 redirect_to("admin.php");
		 }
		 else {
			$found_doctor = find_doctor_by_usernameNpassword($connection,$username,$password);
		  if ($found_doctor) {
			$_SESSION["doctor_id"] = $found_doctor["id"];
			$_SESSION["username"] = $found_doctor["username"];
			$_SESSION["doctor_firstname"] = $found_doctor["doctor_firstname"];
			$_SESSION["doctor_lastname"] = $found_doctor["doctor_lastname"];

			redirect_to("doctor.php");
		}else{
			$found_user = find_user_by_usernameNpassword($connection,$username,$password);
			if($found_user){
				$_SESSION["user_id"] = $found_user["id"];
				$_SESSION["username"] = $found_user["user_name"];
				$_SESSION["usertype"] = $found_user["user_type"];
				$_SESSION["user_email"] = $found_user["user_email"];

				redirect_to("otheruser.php");
			}

			else{
				$_SESSION["message"] = "Login Failed";
			}
		}

	 }

 }
?>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="_/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="_/css/free.css" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Bree+Serif|Merriweather:400,300,300italic,700,700italic,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="_/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="_/css/screen.css">
</head>
<body>
	<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">

          <a class="navbar-brand" href="#"><h1 style="color:#337ab7">Clinic <span class="subhead">Matters</span></h1></a>
        </div><!-- navbar-header -->
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="login.php">Login</a></li>

                </ul>
        </div><!-- collapse navbar-collapse -->
      </div><!-- container -->
    </nav>
  </header>
<div class="container-fluid" style="padding-top:10;">

	<div class="row">
						<?php echo message(); ?>
	 					<?php echo form_errors($errors); ?>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">

					<form class="form-horizontal" role="form" method="post" action="login.php">
			            						<!-- <input type="hidden" name="_token" value=""> -->

			            						<div class="form-group">
			            							<label class="col-md-4 control-label">Username</label>
			            							<div class="col-md-6">
			            								<input type="email" class="form-control" id = "username" name="username" value="<?php echo htmlentities($username);?>">
			            							</div>
			            						</div>

			            						<div class="form-group">
			            							<label class="col-md-4 control-label">Password</label>
			            							<div class="col-md-6">
			            								<input type="password" class="form-control" id="password" name="password" value="">
			            							</div>
			            						</div>

			            						<div class="form-group">
			            							<div class="col-md-6 col-md-offset-4">
			            								<div class="checkbox">
			            									<label>
			            										<input type="checkbox" name="remember"> Remember Me
			            									</label>
			            								</div>
			            							</div>
			            						</div>

			            						<div class="form-group">
			            							<div class="col-md-6 col-md-offset-4">
			            								<button type="submit" class="btn btn-primary">Login</button>

			            							</div>
			            						</div>
						</form>

				</div>
			</div>
		</div>
	</div>
</div>


</body>
</html>
