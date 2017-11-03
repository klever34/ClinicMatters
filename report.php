
 <?php require_once("includes/session.php"); ?>
 <?php require_once("includes/db_connection.php"); ?>
 <?php require_once("includes/functions.php"); ?>
 <?php require_once("includes/validation_functions.php"); ?>

 <?php
  $report_set = find_all_report();
?>
<?php $patient_set = find_all_patients();?>

<!DOCTYPE>
<html>
<head>
  <title>Reports</title>
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

  <h1 class="page-header">Users</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="_/images/logo.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm">
          <h4>Welcome Admin</h4>
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
    <a style="text-decoration:none;"href=""><button><li class="list-group-item">Questionnaires <span class="glyphicon glyphicon-collapse-down"></span></li></button></a>
    <a style="text-decoration:none;"href="report.php"><button><li class="list-group-item">Reports <span class="glyphicon glyphicon-collapse-down"></span></li></button></a>
    <a style="text-decoration:none;"href="doctor_manage_patient.php"><button><li class="list-group-item">Manage Patients <span class="glyphicon glyphicon-collapse-down"></span></li></button></a>

  </ul>
</div>
    <!-- edit form column -->
    </div>
    <div class="form-group pull-right">
         <div class="col-xs-12">
              <br>
              <a href="create_report.php"><button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-"></i> Create Report</button></a>
          </div>
    </div>
      <?php echo message(); ?>


                <div class="w3-padding w3-white notranslate">

                <table class="table">
                <thead>
                <tr>
                  <th>Patient</th>
                  <th>Report Date</th>
                  <th>Reported By</th>
                  <th>Reg No</th>
                  <th>Statement</th>

                </tr>
                </thead>
                <tbody>
                <?php while($report = mysqli_fetch_assoc($report_set)) { ?>
                <tr>
                  <td><a href="generate_copy_patient.php?id=<?php echo urlencode($patient_set["id"]); ?>"><?php echo htmlentities($report["pat_report"]); ?></a></td>
                  <td><?php echo htmlentities($report["report_date"]); ?></td>
                  <td><?php echo htmlentities($report["reported_by"]); ?></td>
                  <td><?php echo htmlentities($report["reg_no"]); ?></td>
                  <td><?php echo htmlentities($report["statement"]); ?></td>
                </tr>
                </tbody>
                <?php } ?>
                </table>
                </div>



</div>

</body>
</html>
