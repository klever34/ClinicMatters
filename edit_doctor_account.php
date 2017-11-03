<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php
    doctor_confirm_logged_in();
?>
<?php
      $found_doctor["id"]                     = $_SESSION["doctor_id"] ;
      $found_doctor["username"]               = $_SESSION["username"];
      $found_doctor["doctor_firstname"]       = $_SESSION["doctor_firstname"]  ;
      $found_doctor["doctor_lastname"]        = $_SESSION["doctor_lastname"];
 ?>
<?php
  $doctor = find_doctor_by_id($_GET["id"]);

  if (!$doctor) {
    // admin ID was missing or invalid or
    // admin couldn't be found in database
      redirect_to("doctor.php");

  }
?>

<?php
if (isset($_POST['submit'])) {



  if (empty($errors)) {

    // Perform Update
    $id                     = $found_doctor["id"];
    $doctor_firstname       = mysql_prep($_POST['doctor_firstname']);
    $doctor_lastname 	      = mysql_prep($_POST['doctor_lastname']);
    $username   			      =	mysql_prep($_POST['doctor_email']);
    $hashed_password	      = mysql_prep($_POST['doctor_password']);
    $doctor_dob	            = mysql_prep($_POST['doctor_dob']);
    $doctor_address         = mysql_prep($_POST['doctor_address']);
    $doctor_phone           = mysql_prep($_POST['doctor_phone']);


    $query  = "UPDATE doctor SET ";
    $query .= "doctor_firstname = '{$doctor_firstname}', ";
    $query .= "doctor_lastname = '{$doctor_lastname}', ";
    $query .= "username = '{$username}', ";
    $query .= "hashed_password = '{$hashed_password}', ";
    $query .= "doctor_dob = '{$doctor_dob}', ";
    $query .= "doctor_address = '{$doctor_address}', ";
    $query .= "doctor_phone = '{$doctor_phone}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Doctor updated.";
      redirect_to("doctor.php");
    } else {
      // Failure
      $_SESSION["message"] = "Doctor update failed.";
      redirect_to("doctor.php");

    }

  }
} else {
  // This is probably a GET request

} // end: if (isset($_POST['submit']))

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
                  <li ><a href="logout.php">Logout</a></li>
              </ul>
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>
</header>
  <h1 class="page-header">Edit Doctor:<?php echo htmlentities($doctor["username"]); ?></h1>


  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>

  <form class="form" action="edit_doctor_account.php?id=<?php echo urlencode($found_doctor["id"]); ?>" method="post" id="registrationForm">
                      <div class="form-group">

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name"><h4>First name</h4></label>
                                <input class="form-control" name="doctor_firstname" id="doctor_firstname" value="<?php echo htmlentities($found_doctor["doctor_firstname"]); ?>" placeholder="first name" title="enter your first name if any." type="text">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                              <label for="last_name"><h4>Last name</h4></label>
                                <input class="form-control" name="doctor_lastname" id="doctor_lastname" value="<?php echo htmlentities($found_doctor["doctor_lastname"]); ?>" placeholder="last name" title="enter your last name if any." type="text">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="username"><h4>Username</h4></label>
                                <input class="form-control" name="doctor_email" id="doctor_email" value="<?php echo htmlentities($found_doctor["username"]); ?>" placeholder="user@example.com" title="user" type="text">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password"><h4>Password</h4></label>
                                <input class="form-control" name="doctor_password" id="doctor_password" placeholder="password" title="enter your password." type="password">
                            </div>
                        </div>

                        <div class="form-group">
                             <div class="col-xs-12">
                                  <br>
                                  <button class="btn btn-lg btn-success" name="submit" id="submit" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
                                  <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                  <br><br>
                                  <a href="doctor.php">Go back</a>
                              </div>
                        </div>



                </form>

</div>

</body>
</html>
