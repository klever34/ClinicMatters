<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>

<?php
  $patient = find_patients_by_id($_GET["id"]);

  if (!$patient) {
    //  ID was missing or invalid or
    // ID couldn't be found in database
    redirect_to("manage_patients.php");
  }
?>

<?php


?>

<!DOCTYPE>
<html>
<head>
  <title>Edit Account</title>
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
<br>
<div class="container">
  <h1 class="page-header">Copy of Patient:<?php echo htmlentities($patient["patient_firstname"]); ?></h1>


  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>

  <form class="form" action="edit_patient.php?id=<?php echo urlencode($patient["id"]); ?>" method="post" id="registrationForm">
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <p><h3><?php echo htmlentities($patient["patient_firstname"]); ?></h3></p>
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                            <p><h3><?php echo htmlentities($patient["patient_lastname"]); ?></h3></p>
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="age"><h4>Age</h4></label>
                            <p><h3><?php echo htmlentities($patient["patient_age"]); ?></h3></p>
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="date_admitted"><h4>Date Admitted</h4></label>
                            <p><h3><?php echo htmlentities($patient["date_admitted"]); ?></h3></p>
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="illness"><h4>Illness</h4></label>
                            <p><h3><?php echo htmlentities($patient["illness"]); ?></h3></p>
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="bill"><h4>Bill</h4></label>
                            <p><h3><?php echo htmlentities($patient["bill"]); ?></h3></p>
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <!-- <button type="submit" name="submit" class="btn btn-primary">Edit Patient</button>
                                <a href="manage_patients.php"><button type="submit" class="btn btn-primary"> Cancel </button></a> -->
                                <br><br>

                                <!-- <a href="manage_doctors.php">Go back</a> -->
                           </div>
                      </div>

                </form>
</div>
</div>

</body>
</html>
