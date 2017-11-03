<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>

<?php
   doctor_confirm_logged_in();
?>
<?php $found_doctor["id"] = $_SESSION["doctor_id"]; ?>
<?php ?>
<?php
 $report_set = find_all_report();
 $patient_set = find_all_patients();
 $report_no = find_patient_reg();
?>
<?php
if (isset($_POST['submit'])) {
  // Process the form

  // // validations
  // $required_fields = array("report_date","reported_by","reg_no","statement");
  // validate_presences($required_fields);
  //
  // if (empty($errors)) {

    // Perform Update
    $pat_report          = mysql_prep($_POST['pat_report']);
    $report_date         = mysql_prep($_POST["report_date"]);
    $reported_by         = mysql_prep($_POST["reported_by"]);
    $reg_no              = mysql_prep($_POST["reg_no"]);
    $statement           = mysql_prep($_POST["statement"]);

    $query = "INSERT INTO report (patient,report_date,reported_by,reg_no,statement)".
    "VALUES ('$pat_report','$report_date','$reported_by','$reg_no','$statement')";

    $result = mysqli_query($connection, $query);

    if(isset($connection)){
     mysqli_close($connection);
    }

  //}
} else {
  // This is probably a GET request

} // end: if (isset($_POST['submit']))

?>
<!DOCTYPE>
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

  <h1 class="page-header">Create Report</h1>
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

      <?php echo message(); ?>
      <?php echo form_errors($errors); ?>
      <form  action="doctor_create_report.php" method="post" id="registrationForm">

                      <fieldset class="form-group">
                            <label for="exampleInputEmail1">File</label>
                            <small class="text-muted">A REPORT.</small>
                      </fieldset>

                          <fieldset class="form-group">
                              <div class="col-xs-6">
                                <label for="patient"><h4>Patient</h4></label>
                                  <select class="form-control" name="pat_report" id="" >
                                      <?php while( $patient = mysqli_fetch_assoc($patient_set)){
                                          $pat = $patient['patient_firstname'] ;
                                          $patt = $patient['patient_lastname'] ;
                                            echo "<option>$pat  $patt</option>";
                                          ?>
                                      <?php } ?>
                                  </select>

                              </div>

                          </fieldset>
                          <fieldset class="form-group">

                              <div class="col-xs-6">
                                  <label for="first_name"><h4>Report Date</h4></label>
                                  <input class="form-control" name="report_date" id="report_date" placeholder="" type=date>
                              </div>
                          </fieldset>
                          <fieldset   >
                          <div class="form-group col-xs-6">
                            <label for="disabledTextInput">Reported By</label>
                            <input type="text" id="disabledTextInput" name="reported_by" class="form-control" value="Doctor <?php echo htmlentities($_SESSION["doctor_firstname"]); ?>">
                          </div>
                        </fieldset>
                          <fieldset class="form-group">
                              <div class="col-xs-6">
                                <label for="reg_no"><h4>Registration Number</h4></label>
                                  <select class="form-control" name="reg_no" id="reg_no" >
                                      <?php while( $rep = mysqli_fetch_assoc($report_no)){
                                          $report = $rep['reg_no'] ;
                                            echo "<option>$report</option>";
                                          ?>
                                      <?php } ?>
                                  </select>
                              </div>
                          </fieldset>

                          <fieldset class="form-group">

                              <div class="col-xs-6">
                                  <label for="username"><h4>Statement</h4></label>
                                  <textarea class="form-control" name="statement" id="statement" placeholder="" title="" type="text" rows="15"></textarea>
                              </div>
                          </fieldset>
                          <fieldset class="form-group">
                               <div class="col-xs-12">
                                  <br>
                                    <button type="submit" name="submit" class="btn btn-primary">Create Report</button>
                                    <span class="glyphicon glyphicon arrow-left"></span><a href="doctor_report.php">Go back</a>
                               </div>
                          </fieldset>

                          <div class="form-group">
                               <div class="col-xs-12">
                                  <br>

                               </div>
                          </div>
                    </form>

  </div>
</div>

</body>
</html>
