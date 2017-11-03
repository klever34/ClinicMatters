<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php
    user_confirm_logged_in();
?>
<?php
  $patient = find_patients_by_id($_GET["id"]);

  if (!$patient) {
    // admin ID was missing or invalid or
    // admin couldn't be found in database
    redirect_to("user_manage_patients.php");
  }
?>

<?php
if (isset($_POST['submit'])) {
  // Process the form

  // validations
  $required_fields = array("patient_firstname","patient_lastname","patient_age","date_admitted", "illness","bill");
  validate_presences($required_fields);

  if (empty($errors)) {

    // Perform Update

    $id                       = $patient["id"];
    $patient_firstname        = mysql_prep($_POST["patient_firstname"]);
    $patient_lastname         = mysql_prep($_POST["patient_lastname"]);
    $patient_age              = mysql_prep($_POST["patient_age"]);
    $date_admitted            = mysql_prep($_POST["date_admitted"]);
    $illness                  = mysql_prep($_POST["illness"]);
    $bill                     = mysql_prep($_POST["bill"]);

    $query  = "UPDATE patient SET ";
    $query .= "patient_firstname = '{$patient_firstname}', ";
    $query .= "patient_lastname = '{$patient_lastname}', ";
    $query .= "patient_age = {$patient_age}, ";
    $query .= "date_admitted = {$date_admitted}, ";
    $query .= "illness = '{$illness}', ";
    $query .= "bill = {$bill} ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Patient updated.";
      redirect_to("user_manage_patients.php");
    } else {
      // Failure
      $_SESSION["message"] = "Patient update failed.";
       redirect_to("user_manage_patients.php");

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
  <h1 class="page-header">Edit patient:<?php echo htmlentities($patient["patient_firstname"]); ?></h1>


  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>

  <form class="form" action="user_edit_patient.php?id=<?php echo urlencode($patient["id"]); ?>" method="post" id="registrationForm">
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input class="form-control" name="patient_firstname" id="patient_firstname" placeholder="first name" value="<?php echo htmlentities($patient["patient_firstname"]); ?>" title="enter your first name if any." type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input class="form-control" name="patient_lastname" id="patient_lastname" placeholder="last name" value="<?php echo htmlentities($patient["patient_lastname"]); ?>" title="enter your last name if any." type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="age"><h4>Age</h4></label>
                              <input class="form-control" name="patient_age" id="patient_age" placeholder="age" value="<?php echo htmlentities($patient["patient_age"]); ?>" title="" type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="date_admitted"><h4>Date Admitted</h4></label>
                              <input class="form-control" name="date_admitted" id="date_admitted" placeholder="date admitted" value="<?php echo htmlentities($patient["date_admitted"]); ?>" title="" type=date>
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="illness"><h4>Illness</h4></label>
                              <input class="form-control" name="illness" id="illness" placeholder="illness" value="<?php echo htmlentities($patient["illness"]); ?>" title="" type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="bill"><h4>Bill</h4></label>
                              <input class="form-control" name="bill" id="bill" placeholder="age" value="<?php echo htmlentities($patient["bill"]); ?>" title="" type="text">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary">Edit Patient</button>
                                <a href="manage_patients.php"><button type="submit" class="btn btn-primary"> Cancel </button></a>
                                <br><br>

                                <span class="glyphicon glyphicon-arrow-left"></span> <a href="user_manage_patients.php">Go back</a>
                           </div>
                      </div>
                </form>

</div>

</body>
</html>
