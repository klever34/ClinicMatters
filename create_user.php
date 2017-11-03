<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php
    confirm_logged_in();
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $user_name           = test_input($_POST['user_name']);
     $user_email 	        = test_input($_POST['user_email']);
     $user_dob			      =	test_input($_POST['user_dob']);
     $user_gender	        = test_input($_POST['user_gender']);
     $user_password	      = test_input($_POST['user_password']);
     $user_type           =	test_input($_POST['user_type']);
     $user_address        =	test_input($_POST['user_address']);
     $user_state          =	test_input($_POST['user_state']);
     $user_phone          =	test_input($_POST['user_phone']);


     $query = "INSERT INTO user (user_name,user_email,user_dob,user_gender,user_password,user_type,user_address,user_state,user_phone)".
     "VALUES ('$user_name','$user_email','$user_dob','$user_gender','$user_password','$user_type','$user_address','$user_state','$user_phone')";

     $result = mysqli_query($connection,$query)
     or die('Error connecting to database');

     if(isset($connection)){
      mysqli_close($connection);
     }

     redirect_to("manage_users.php");

 }
?>
<html>
<head>
  <title>User Accounts</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
  <link rel="stylesheet" href="_/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="_/css/free.css" type="text/css" />
  <link href='https://fonts.googleapis.com/css?family=Bree+Serif|Merriweather:400,300,300italic,700,700italic,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/css/font-awesome.min.css">
</head>
<body>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">

          <a class="navbar-brand" href="#featured"><h1 style="color:#337ab7">Clinic <span class="subhead">Matters</span></h1></a>
        </div><!-- navbar-header -->
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="logout.php">Logout</a></li>
                </ul>
        </div><!-- collapse navbar-collapse -->
      </div><!-- container -->
    </nav>
  </header>
<div class="container" style="padding-top: 10px;">
  <h1 class="page-header">Create User</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="_/images/logo.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm">
        <h2>New User</h2>
      </div>
    </div>
    <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"></div>
  <div class="panel-body">
    <p>Signed in as <?php echo htmlentities($_SESSION["username"]); ?></p>
  </div>

  <!-- List group -->
  <ul class="list-group">
    <a style="text-decoration:none;"href="manage_users.php"><button id="ptr"><li class="list-group-item">Manage Users<span class="glyphicon glyphicon-collapse-down"></span></li></button></a>
    <a style="text-decoration:none;"href=""><button><li class="list-group-item">Questionnaires <span class="glyphicon glyphicon-collapse-down"></span></li></button></a>
    <a style="text-decoration:none;"href="manage_doctors.php"><button><li class="list-group-item">Manage Doctors <span class="glyphicon glyphicon-collapse-down"></span></li></button></a>
    <a style="text-decoration:none;"href="manage_patients.php"><button><li class="list-group-item">Manage Patients <span class="glyphicon glyphicon-collapse-down"></span></li></button></a>

  </ul>
</div>
    <!-- edit form column -->
    </div>

<form class="form-horizontal" action="create_user.php" method="post" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">User name:</label>
          <div class="col-lg-8">
            <input class="form-control" name="user_name" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" name="user_email" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">DOB</label>
          <div class="col-lg-8">
            <input class="form-control" name="user_dob" type=date>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Gender:</label>
          <div class="col-lg-8">
            <select class="form-control" name="user_gender">
                <option>Male</option>
                <option>Female</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Password</label>
          <div class="col-lg-8">
            <input class="form-control" name="user_password" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">User Type:</label>
          <div class="col-lg-8">
            <select class="form-control" name="user_type">
                <option>Nurse</option>
                <option>Secetary</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Address</label>
          <div class="col-lg-8">
            <input class="form-control" name="user_address" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">State</label>
          <div class="col-lg-8">
            <input class="form-control" name="user_state" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Phone</label>
          <div class="col-lg-8">
            <input class="form-control" name="user_phone" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" type="submit" value="Submit" type="button">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>

</div>

</body>
</html>
