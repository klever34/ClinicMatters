<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>

<?php


?>

<?php

//It is good to declare all ur variables as empty before using them...
$patient_firstname = $patient_lastname = $patient_age  = $marital_status = $reg_no = $gender = $address = $city = $state = $postal_code = $date_admitted = $email = $illness = $bill ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $required_fields = array("patient_firstname","patient_lastname","patient_age","reg_no", "illness");
      validate_presences($required_fields);

  if(empty($errors)){

      $patient_firstname    = test_input($_POST['patient_firstname']);
      $patient_lastname 	  = test_input($_POST['patient_lastname']);
      $patient_age			    =	test_input($_POST['patient_age']);
      $marital_status	      = test_input($_POST['marital_status']);
      $reg_no       	      = test_input($_POST['reg_no']);
      $gender	              = test_input($_POST['gender']);
      $address              = test_input($_POST['address']);
      $city                 = test_input($_POST['city']);
      $state                = test_input($_POST['state']);
      $postal_code          = test_input($_POST['postal_code']);
      $date_admitted        = test_input($_POST['date_admitted']);
      $email                = test_input($_POST['email']);
      $illness              = test_input($_POST['illness']);
      $bill                 = test_input($_POST['bill']);


      $query = "INSERT INTO patient (patient_firstname,patient_lastname,patient_age,marital_status,reg_no,gender,address,city,state,postal_code,date_admitted,email,illness,bill)".
      "VALUES ('$patient_firstname','$patient_lastname','$patient_age','$marital_status','$reg_no','$gender','$address','$city','$state','$postal_code','$date_admitted','$email','$illness','$bill')";

      $result = mysqli_query($connection,$query)
      or die('Error connecting to database');

      if(isset($connection)){
       mysqli_close($connection);
      }

    if($_SESSION["admin_id"]){

      redirect_to("admin.php");
    }
       elseif ($_SESSION["doctor_id"]) {
         redirect_to("doctor_manage_patient.php");
}

   else{
     redirect_to("otheruser.php");
   }
  }
}


?>
<html>
<head><title>Patient</title>
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

  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <!-- <div class="text-center">
        <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm">
      </div> -->
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

      <h3>Personal info</h3>
      <?php echo message(); ?>
      <?php echo form_errors($errors); ?>
      <form class="form-horizontal" action="patient.php" method="post" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input name="patient_firstname" id="patient_firstname" class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input name="patient_lastname" id="patient_lastname" class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Age</label>
          <div class="col-lg-8">
            <input name="patient_age" id="patient_age" class="form-control"  type=number>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Marital Status:</label>
          <div class="col-lg-8">
            <select class="form-control" name="marital_status">
                <option>Single</option>
                <option>Married</option>
                <option>Other</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Registration Number</label>
          <div class="col-lg-8">
            <input name="reg_no" id="reg_no" class="form-control"  type=number>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Gender:</label>
          <div class="col-lg-8">
            <select class="form-control" name="gender">
                <option>Male</option>
                <option>Female</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Address</label>
          <div class="col-lg-8">
            <input name="address" id="address" class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">City</label>
          <div class="col-lg-8">
            <input name="city" id="city" class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">State</label>
          <div class="col-lg-8">
            <input name="state" id="state" class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Postal Code</label>
          <div class="col-lg-8">
            <input name="postal_code" id="postal_code" class="form-control"  type=number>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Date Of Admittance</label>
          <div class="col-lg-8">
            <input name="date_admitted" id="date_admitted" class="form-control"  type=date>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input name="email" id="email" class="form-control" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Illness:</label>
          <div class="col-lg-8">
            <input name="illness" id="illness" class="form-control" type="text">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Bill:</label>
          <div class="col-lg-8">
            <input name="bill" id="bill" class="form-control"  type = number >
          </div>
        </div>

        </div>

        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
            <span></span>
            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
