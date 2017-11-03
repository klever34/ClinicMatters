<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php
    confirm_logged_in();
?>
<?php
  $admin = find_admin_by_id($_GET["id"]);

  if (!$admin) {
    // admin ID was missing or invalid or
    // admin couldn't be found in database
      redirect_to("admin.php");

  }
?>

<?php
if (isset($_POST['submit'])) {
  // Process the form

  if (empty($errors)) {

    // Perform Update

    $id               = $admin["id"];
    $firstname        = mysql_prep($_POST["firstname"]);
    $lastname         = mysql_prep($_POST["lastname"]);
    $phone            = mysql_prep($_POST["phone"]);
    $username         = mysql_prep($_POST["username"]);
    $hashed_password  = password_encrypt($_POST["hashed_password"]);

    $query  = "UPDATE admins SET ";
    $query .= "firstname = '{$firstname}', ";
    $query .= "lastname = '{$lastname}', ";
    $query .= "phone = '{$phone}', ";
    $query .= "username = '{$username}', ";
    $query .= "hashed_password = '{$hashed_password}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";

    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Admin updated.";
      redirect_to("admin.php");
    } else {
      // Failure
      $_SESSION["message"] = "Admin update failed.";
      // redirect_to("index.php");

    }

  }
} else {

}

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
  <h1 class="page-header">Edit Admin:<?php echo htmlentities($admin["username"]); ?></h1>


  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>

  <form class="form" action="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>" method="post" id="registrationForm">
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input class="form-control" name="firstname" id="firstname" placeholder="first name" value="<?php echo htmlentities($admin["firstname"]); ?>" title="enter your first name if any." type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input class="form-control" name="lastname" id="lastname" placeholder="last name" value="<?php echo htmlentities($admin["lastname"]); ?>" title="enter your last name if any." type="text">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input class="form-control" name="phone" id="phone" placeholder="23480xxxxxxxx" value="<?php echo htmlentities($admin["phone"]); ?>" title="enter your phone number if any." type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="username"><h4>Username</h4></label>
                              <input class="form-control" name="username" id="username" placeholder="user@example.com" value="<?php echo htmlentities($admin["username"]); ?>" title="user" type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input class="form-control" name="hashed_password" id="hashed_password" placeholder="password" title="enter your password." type="password">
                          </div>
                      </div>

                      <div class="form-group">
                           <div class="col-xs-12">
                              <br>
                                <button type="submit" name="submit" class="btn btn-primary">Edit Admin</button><br><br>
                                <a href="admin.php">Go back</a>
                           </div>
                      </div>
                </form>

</div>

</body>
</html>
