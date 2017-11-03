<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>

<?php
   user_confirm_logged_in();
?>
<?php
       $found_user["user_name"] = $_SESSION["username"] ;
       $found_user["user_type"] = $_SESSION["usertype"];
       $found_user["user_email"] = $_SESSION["user_email"]  ;
       $found_user["id"]        = $_SESSION["user_id"];
?>
<?php
  $user = find_user_by_id($_GET["id"]);
  if (!$user) {
    // admin ID was missing or invalid or
    // admin couldn't be found in database
    redirect_to("otheruser.php");
  }
?>

<?php
if (isset($_POST['submit'])) {

  if (empty($errors)) {

    // Perform Update

    $id               = $found_user["id"];
    $name             = mysql_prep($_POST["user_name"]);
    $email            = mysql_prep($_POST["user_email"]);
    $dob              = mysql_prep($_POST["user_dob"]);
    $gender           = mysql_prep($_POST["user_gender"]);
    $user_password    = mysql_prep($_POST["user_password"]);
    $type             = mysql_prep($_POST["user_type"]);
    $address          = mysql_prep($_POST["user_address"]);
    $state            = mysql_prep($_POST["user_state"]);
    $phone            = mysql_prep($_POST["user_phone"]);

    $query  = "UPDATE user SET ";
    $query .= "user_name = '{$name}', ";
    $query .= "user_email = '{$email}', ";
    $query .= "user_dob = '{$dob}', ";
    $query .= "user_gender = '{$gender}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_type = '{$type}', ";
    $query .= "user_address = '{$address}', ";
    $query .= "user_state = '{$state}', ";
    $query .= "user_phone = '{$phone}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "User updated.";
      redirect_to("otheruser.php");
    } else {
      // Failure
      $_SESSION["message"] = "User update failed.";
       redirect_to("otheruser.php");

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
  <h1 class="page-header">Edit User:<?php echo htmlentities($found_user["user_name"]); ?></h1>


  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>

  <form class="form" action="edit_account.php?id=<?php echo urlencode($found_user["id"]); ?>" method="post" id="registrationForm">
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="first_name"><h4>Full name</h4></label>
                              <input class="form-control" name="user_name" id="user_name" placeholder="first name" value="<?php echo htmlentities($found_user["user_name"]); ?>" title="enter your first name if any." type="text">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="last_name"><h4>Email</h4></label>
                              <input class="form-control" name="user_email" id="user_email" placeholder="last name" value="<?php echo htmlentities($found_user["user_email"]); ?>" title="enter your last name if any." type="text">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input class="form-control" name="user_password" id="user_password" placeholder="password" title="enter your password." type="password">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="password"><h4>Type</h4></label>
                              <input class="form-control" name="user_type" id="user_type" placeholder="" value="<?php echo htmlentities($user["user_type"]); ?>" title="" type="text">
                          </div>
                      </div>
                      <div class="form-group">


                      <div class="form-group">
                           <div class="col-xs-12">
                              <br>
                                <button type="submit" id="submit" name="submit" class="btn btn-primary">Edit User</button><br><br>
                                <a href="otheruser.php">Go back</a>
                           </div>
                      </div>
                </form>

</div>

</body>
</html>
