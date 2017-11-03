
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

  $id = $patient["id"];
  $query = "DELETE FROM patient WHERE id = {$id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Patient deleted.";
    redirect_to("user_manage_patients.php");
  } else {
    // Failure
    $_SESSION["message"] = "Patient deletion failed.";
    redirect_to("user_manage_patients.php");
  }

?>
