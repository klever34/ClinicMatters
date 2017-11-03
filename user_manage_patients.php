
 <?php require_once("includes/session.php"); ?>
 <?php require_once("includes/db_connection.php"); ?>
 <?php require_once("includes/functions.php"); ?>
 <?php require_once("includes/validation_functions.php"); ?>
 <?php
     user_confirm_logged_in();
 ?>

 <?php
  $patient_set = find_all_patients();
?>
<!DOCTYPE>
<html>
<head>
  <title>User Account</title>
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
<div class="container" style="padding-top: 0px;">

  <h1 class="page-header">Manage Patient</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="_/images/logo.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm">
        <h4>Welcome <?php echo htmlentities($_SESSION["usertype"]); ?> <?php echo htmlentities($_SESSION["username"]); ?></h4>
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
    <a style="text-decoration:none;"href="user_report.php"><button><li class="list-group-item">Reports <span class="glyphicon glyphicon-collapse-down"></span></li></button></a>
    <a style="text-decoration:none;"href="user_manage_patients.php"><button><li class="list-group-item">Manage Patients <span class="glyphicon glyphicon-collapse-down"></span></li></button></a>
  </ul>
</div>
    <!-- edit form column -->
    </div>

    <div class="form-group pull-right">
         <div class="col-xs-12">
              <br>
              <a href="patient.php"><button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-"></i> Create Patient</button></a>
          </div>
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

                  <!-- <td><a href="user_delete_patient.php?id=<?php //echo urlencode($patient["id"]); ?>" onclick="return confirm('Are you sure You want to delete?');"><button class="btn btn-primary" ><span class="glyphicon glyphicon-trash"></span> Delete</button></a></td> -->
                  <td><a href="user_edit_patient.php?id=<?php echo urlencode($patient["id"]); ?>"><button class="btn btn-primary" ><span class="glyphicon glyphicon-pencil"></span> Edit</button></a></td>
                  <td><a href="generate_copy_patient.php?id=<?php echo urlencode($patient["id"]); ?>"><button class="btn btn-primary" ><span class="glyphicon glyphicon-file"></span> Generate Copy</button></a></td>

                </tr>

                </tbody>
                <?php } ?>
                </table>
                </div>



</div>

</body>
</html>
