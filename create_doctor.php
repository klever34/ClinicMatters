 <?php require_once("includes/session.php"); ?>
 <?php require_once("includes/db_connection.php"); ?>
 <?php require_once("includes/functions.php"); ?>
 <?php require_once("includes/validation_functions.php"); ?>
 <?php
     confirm_logged_in();
 ?>
 <?php
  $admin_set = find_all_doctors();
?>
<?php

//It is good to declare all ur variables as empty before using them...
$doctor_firstname = $doctor_lastname = $doctor_email = $doctor_password = $doctor_dob = $doctor_address  = $doctor_phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $doctor_firstname       = test_input($_POST['doctor_firstname']);
      $doctor_lastname 	      = test_input($_POST['doctor_lastname']);
      $doctor_email			      =	test_input($_POST['doctor_email']);
      $doctor_password	      = test_input($_POST['doctor_password']);
      $doctor_dob	            = test_input($_POST['doctor_dob']);
      $doctor_address         = test_input($_POST['doctor_address']);
      $doctor_phone           = test_input($_POST['doctor_phone']);



      $query = "INSERT INTO doctor (doctor_firstname,doctor_lastname,username,hashed_password,doctor_dob,doctor_address,doctor_phone)".
      "VALUES ('$doctor_firstname','$doctor_lastname','$doctor_email','$doctor_password','$doctor_dob','$doctor_address','$doctor_phone')";

      $result = mysqli_query($connection,$query)
      or die('Error connecting to database');

      if(isset($connection)){
       mysqli_close($connection);
      }

  }
?>
<!DOCTYPE>
<html>
<head>
  <title>Administrator's Account</title>
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
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
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
<div class="container" style="padding-top: 60px;">
  <h1 class="page-header"><span class="glyphicon glyphicon-user"></span> Administrator</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="_/images/logo.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm">
        <h4>Create Doctor </h4>
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
    <a style="text-decoration:none;"href="report.php"><button><li class="list-group-item">Reports <span class="glyphicon glyphicon-collapse-down"></span></li></button></a>
    <a style="text-decoration:none;"href="manage_patients.php"><button><li class="list-group-item">Manage Patients <span class="glyphicon glyphicon-collapse-down"></span></li></button></a>

  </ul>
</div>
    <!-- edit form column -->
    </div>

      <?php echo message(); ?>
      <form class="form" action="create_doctor.php" method="post" id="registrationForm">
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input class="form-control" name="doctor_firstname" id="doctor_firstname" placeholder="first name" title="enter your first name if any." type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input class="form-control" name="doctor_lastname" id="doctor_lastname" placeholder="last name" title="enter your last name if any." type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="username"><h4>Username</h4></label>
                              <input class="form-control" name="doctor_email" id="doctor_email" placeholder="user@example.com" title="user" type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input class="form-control" name="doctor_password" id="doctor_password" placeholder="password" title="enter your password." type="password">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="password"><h4>Date Of Birth</h4></label>
                              <input class="form-control" name="doctor_dob" id="doctor_dob" placeholder="dob" title="enter your date of birth." type=date>
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="address"><h4>Address</h4></label>
                              <input class="form-control" name="doctor_address" id="doctor_address" placeholder="address" title="enter your password." type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input class="form-control" name="doctor_phone" id="doctor_phone" placeholder="23480xxxxxxxx" title="enter your phone number if any." type="text">
                          </div>
                      </div>

                        <!-- <div class="form-group">
                        <div class="col-xs-6">
                        <label for="role"><h4>Select role</h4></label>

                          <select  name = "role" class="form-control" id="role">
                              <option value ="1">Administrator</option>
                              <option value ="2">Doctor</option>
                              <option value= "3" >Nurses & Secetaries</option>

                          </select>
                       </div>
                      </div> -->
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                <br><br>
                                <span class="glyphicon glyphicon-arrow-left" ></span><a href="admin.php"> Go back</a>
                            </div>
                      </div>
                </form>





</div>

</body>
</html>
