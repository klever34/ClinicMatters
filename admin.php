 <?php require_once("includes/session.php"); ?>
 <?php require_once("includes/db_connection.php"); ?>
 <?php require_once("includes/functions.php"); ?>
 <?php require_once("includes/validation_functions.php"); ?>

<?php
    confirm_logged_in();
?>

 <?php
  $admin_set = find_all_admins();
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
  <h1 class="page-header"><span class="glyphicon glyphicon-user"></span> Administrator</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
       <img src="_/images/logo.JPG" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm">
        <h4><span class="glyphicon glyphicon-user"></span> Welcome Admin </h4>
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
    <a style="text-decoration:none;"href="manage_patients.php"><button><li class="list-group-item">Manage Patients <span class="glyphicon glyphicon-collapse-down"></span></li></button></a>
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
                  <th>Username</th>
                  <th>Phone</th>

                </tr>
                </thead>
                <tbody>
                <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
                <tr>
                  <td><?php echo htmlentities($admin["firstname"]); ?></td>
                  <td><?php echo htmlentities($admin["lastname"]); ?></td>
                  <td><?php echo htmlentities($admin["username"]); ?></td>
                  <td><?php echo htmlentities($admin["phone"]); ?></td>

                  <td><a href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure?');"><button class="btn btn-primary" ><span class="glyphicon glyphicon-trash"></span> Delete</button></a></td>
                  <td><a href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>"><button class="btn btn-primary" ><span class="glyphicon glyphicon-pencil"></span> Edit</button></a></td>

                </tr>

                </tbody>
                <?php } ?>
                </table>
                </div>



</div>

</body>
</html>
