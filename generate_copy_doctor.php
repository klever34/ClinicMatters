<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>

<?php
  $doctor = find_doctor_by_id($_GET["id"]);

  if (!$doctor) {
    // admin ID was missing or invalid or
    // admin couldn't be found in database
      redirect_to("manage_doctors.php");

  }
?>

<?php
?>

<!DOCTYPE>
<html>
<head>
  <title>Generate Copy</title>
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
                  <li ><a href="logout.php">Logout</a></li>
              </ul>
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>
</header>
<div class="container">
  <h1 class="page-header">Doctor:<?php echo htmlentities($doctor["username"]); ?></h1>


  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>

  <form class="form" action="edit_doctor.php?id=<?php echo urlencode($doctor["id"]); ?>" method="post" id="registrationForm">
                      <div class="form-group">

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>First name</h4></label>
                                <p><h3><?php echo htmlentities($doctor["doctor_firstname"]); ?></h3></p>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                              <label for="last_name"><h4>Last name</h4></label>
                              <p><h3><?php echo htmlentities($doctor["doctor_lastname"]); ?></h3></p>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="username"><h4>Username</h4></label>
                                <p><h3><?php echo htmlentities($doctor["username"]); ?></h3></p>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="dob"><h4>Date Of Birth</h4></label>
                                <p><h3><?php echo htmlentities($doctor["doctor_dob"]); ?></h3></p>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="address"><h4>Address</h4></label>
                                <p><h3><?php echo htmlentities($doctor["doctor_address"]); ?></h3></p>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone"><h4>Phone</h4></label>
                                <p><h3><?php echo htmlentities($doctor["doctor_phone"]); ?></h3></p>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>




                </form>
                <br>
                <br>
                <span class="glyphicon glyphicon-arrow-left"></span><a href="manage_doctors.php"> Go back</a>
</div>
</div>

</body>
</html>
