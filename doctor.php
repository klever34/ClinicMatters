<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>

<?php
   doctor_confirm_logged_in();
?>
<?php $found_doctor["id"] = $_SESSION["doctor_id"]; ?>
<?php $patient_set = find_all_patients();?>
<!DOCTYPE>
<html>
<head><title>Doctor's Account</title>
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
<div class="container" style="padding-top: 60px;">
  <h1 class="page-header"><span class="glyphicon glyphicon-user"></span> Doctor</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="_/images/logo.JPG" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm">
        <h4><span class="glyphicon glyphicon-user"></span> Welcome Dr <?php echo htmlentities($_SESSION["doctor_firstname"]); ?></h4>
      </div>
    </div>
    <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"></div>
  <div class="panel-body">
    <p>Signed in as <?php echo htmlentities($_SESSION["username"]); ?> </p>
  </div>

  <!-- List group -->
  <ul class="list-group">
    <button id="ptr"><li class="list-group-item"><a style="text-decoration:none;"href="doctor_report.php">Manage Reports <span class="glyphicon glyphicon-collapse-down"></span></a></li></button>
    <button id="ptr"><li class="list-group-item"><a style="text-decoration:none;"href="doctor_manage_patient.php">Patient Records <span class="glyphicon glyphicon-collapse-down"></span></a></li></button>
    <button id="genq"><li class="list-group-item"><a style="text-decoration:none;"href="#">Generate Questionnaire <span class="glyphicon glyphicon-collapse-down"></span></a></li></button>
    <button><li class="list-group-item"><a style="text-decoration:none;"href="edit_doctor_account.php?id=<?php echo urlencode($found_doctor["id"]); ?>">Edit Account <span class="glyphicon glyphicon-pencil"></span></a></li></button>

  </ul>
</div>
    <!-- edit form column -->
    </div>
      <?php echo message(); ?>
                      <div class="w3-padding w3-white notranslate">

                      <table class="table">
                      <thead>
                      <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Age</th>
                        <th>Date Admitted</th>
                        <th>Illness</th>
                        <th>Bill</th>

                      </tr>
                      </thead>
                      <tbody>
                      <?php while($patient = mysqli_fetch_assoc($patient_set)) { ?>
                      <tr>
                        <td><?php echo htmlentities($patient["patient_firstname"]); ?></td>
                        <td><?php echo htmlentities($patient["patient_lastname"]); ?></td>
                        <td><?php echo htmlentities($patient["patient_age"]); ?></td>
                        <td><?php echo htmlentities($patient["date_admitted"]); ?></td>
                        <td><?php echo htmlentities($patient["illness"]); ?></td>
                        <td><?php echo htmlentities($patient["bill"]); ?></td>

                        <!-- <td><a href="doctor_delete_patient.php?id=<?php //echo urlencode($patient["id"]); ?>" onclick="return confirm('Are you sure You want to delete?');"><button class="btn btn-primary" ><span class="glyphicon glyphicon-trash"></span> Delete</button></a></td> -->
                        <td><a href="doctor_edit_patient.php?id=<?php echo urlencode($patient["id"]); ?>"><button class="btn btn-primary" ><span class="glyphicon glyphicon-pencil"></span> Edit</button></a></td>
                        <td><a href="generate_copy_patient.php?id=<?php echo urlencode($patient["id"]); ?>"><button class="btn btn-primary" ><span class="glyphicon glyphicon-file"></span> Generate Copy</button></a></td>

                      </tr>

                      </tbody>
                      <?php } ?>
                      </table>
                      </div>


</div>

</body>
</html>
