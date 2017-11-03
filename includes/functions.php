<?php

													$error = array();

													function redirect_to($new_location) {
													  header("Location: " . $new_location);
													  exit;
													}

													function mysql_prep($string) {
														global $connection;

														$escaped_string = mysqli_real_escape_string($connection, $string);
														return $escaped_string;
													}

													function confirm_query($result_set) {
														if (!$result_set) {
															die("Database query failed.");
														}
													}

													function form_errors($errors=array()) {
														$output = "";
														if (!empty($errors)) {
														  $output .= "<div class=\"error\">";
														  $output .= "Please fix the following errors:";
														  $output .= "<ul>";
														  foreach ($errors as $key => $error) {
														    $output .= "<li>";
																$output .= htmlentities($error);
																$output .= "</li>";
														  }
														  $output .= "</ul>";
														  $output .= "</div>";
														}
														return $output;
													}

													function find_all_admins() {
														global $connection;

														$query  = "SELECT * ";
														$query .= "FROM admins ";
														$query .= "ORDER BY username ASC";
														$admin_set = mysqli_query($connection, $query);
														confirm_query($admin_set);
														return $admin_set;
													}

													function find_all_doctors() {
														global $connection;

														$query  = "SELECT * ";
														$query .= "FROM doctor ";
														$query .= "ORDER BY doctor_firstname ASC";
														$admin_set = mysqli_query($connection, $query);
														confirm_query($admin_set);
														return $admin_set;
													}

													function find_all_users() {
														global $connection;

														$query  = "SELECT * ";
														$query .= "FROM user ";
														$query .= "ORDER BY user_name ASC";
														$user_set = mysqli_query($connection, $query);
														confirm_query($user_set);
														return $user_set;
													}

													function find_all_patients() {
														global $connection;

														$query  = "SELECT * ";
														$query .= "FROM patient ";
														$query .= "ORDER BY patient_firstname ASC";
														$patient_set = mysqli_query($connection, $query);
														confirm_query($patient_set);
														return $patient_set;
													}

													function test_input($data) {
														$data = trim($data);
														$data = stripslashes($data);
														$data = htmlspecialchars($data);
														return $data;
													}


													function find_admin_by_id($admin_id) {
														global $connection;

														$safe_admin_id = mysqli_real_escape_string($connection, $admin_id);

														$query  = "SELECT * ";
														$query .= "FROM admins ";
														$query .= "WHERE id = {$safe_admin_id} ";
														$query .= "LIMIT 1";
														$admin_set = mysqli_query($connection, $query);
														confirm_query($admin_set);
														if($admin = mysqli_fetch_assoc($admin_set)) {
															return $admin;
														} else {
															return null;
														}
													}

													function find_user_by_id($user_id) {
														global $connection;

														$safe_user_id = mysqli_real_escape_string($connection, $user_id);

														$query  = "SELECT * ";
														$query .= "FROM user ";
														$query .= "WHERE id = {$safe_user_id} ";
														$query .= "LIMIT 1";
														$user_set = mysqli_query($connection, $query);
														confirm_query($user_set);
														if($user = mysqli_fetch_assoc($user_set)) {
															return $user;
														} else {
															return null;
														}
													}

													function find_admin_by_username($username) {
														global $connection;

														$safe_username = mysqli_real_escape_string($connection, $username);

														$query  = "SELECT * ";
														$query .= "FROM admins ";
														$query .= "WHERE username = '{$safe_username}' ";
														$query .= "LIMIT 1";
														$admin_set = mysqli_query($connection, $query);
														confirm_query($admin_set);
														if($admin = mysqli_fetch_assoc($admin_set)) {
															return $admin;
														} else {
															return null;
														}
													}

													function find_user_by_username($user_name) {
														global $connection;

														$safe_username = mysqli_real_escape_string($connection, $user_name);

														$query  = "SELECT * ";
														$query .= "FROM user ";
														$query .= "WHERE user_name = '{$safe_username}' ";
														$query .= "LIMIT 1";
														$user_set = mysqli_query($connection, $query);
														confirm_query($user_set);
														if($user = mysqli_fetch_assoc($user_set)) {
															return $user;
														} else {
															return null;
														}
													}

													function password_encrypt($password) {
												  	$hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
													  $salt_length = 22; 					// Blowfish salts should be 22-characters or more
													  $salt = generate_salt($salt_length);
													  $format_and_salt = $hash_format . $salt;
													  $hash = crypt($password, $format_and_salt);
														return $hash;
													}

													function generate_salt($length) {
													  // Not 100% unique, not 100% random, but good enough for a salt
													  // MD5 returns 32 characters
													  $unique_random_string = md5(uniqid(mt_rand(), true));

														// Valid characters for a salt are [a-zA-Z0-9./]
													  $base64_string = base64_encode($unique_random_string);

														// But not '+' which is valid in base64 encoding
													  $modified_base64_string = str_replace('+', '.', $base64_string);

														// Truncate string to the correct length
													  $salt = substr($modified_base64_string, 0, $length);

														return $salt;
													}

													function password_check($password, $existing_hash) {
														// existing hash contains format and salt at start
													  $hash = crypt($password, $existing_hash);
													  if ($hash === $existing_hash) {
													    return true;
													  } else {
													    return false;
													  }
													}

													function attempt_login($username, $password) {
														$admin = find_admin_by_username($username);
														if ($admin) {
															// found admin, now check password
															if (password_check($password, $admin["hashed_password"])) {
																// password matches
																return $admin;
															} else {
																// password does not match
																return false;
															}
														} else {
															// admin not found
															return false;
														}
													}


													function find_patients_by_id($patient_id) {
														global $connection;

														$safe_patient_id = mysqli_real_escape_string($connection, $patient_id);

														$query  = "SELECT * ";
														$query .= "FROM patient ";
														$query .= "WHERE id = {$safe_patient_id} ";
														$query .= "LIMIT 1";
														$patient_set = mysqli_query($connection, $query);
														confirm_query($patient_set);
														if($patient = mysqli_fetch_assoc($patient_set)) {
															return $patient;
														} else {
															return null;
														}
													}


													function find_users_by_id($user_id) {
														global $connection;

														$safe_user_id = mysqli_real_escape_string($connection, $user_id);

														$query  = "SELECT * ";
														$query .= "FROM user ";
														$query .= "WHERE id = {$safe_user_id} ";
														$query .= "LIMIT 1";
														$user_set = mysqli_query($connection, $query);
														confirm_query($user_set);
														if($user = mysqli_fetch_assoc($user_set)) {
															return $user;
														} else {
															return null;
														}
													}



													function logged_in(){
															return isset($_SESSION['admin_id']);
													}
													function confirm_logged_in(){
														if(!logged_in()){
																redirect_to("login.php");
														}
													}

														function doctor_logged_in(){
																return isset($_SESSION['doctor_id']);
														}

														function doctor_confirm_logged_in(){
															if(!doctor_logged_in()){
																	redirect_to("login.php");
															}
														}
														function user_logged_in(){
																return isset($_SESSION['user_id']);
														}

														function user_confirm_logged_in(){
															if(!user_logged_in()){
																	redirect_to("login.php");
															}
														}


													function find_doctor_by_id($doctor_id){
														global $connection;

														$safe_doctor_id = mysqli_real_escape_string($connection, $doctor_id);

														$query  = "SELECT * ";
														$query .= "FROM doctor ";
														$query .= "WHERE id = {$safe_doctor_id} ";
														$query .= "LIMIT 1";
														$doctor_set = mysqli_query($connection, $query);
														confirm_query($doctor_set);
														if($doctor = mysqli_fetch_assoc($doctor_set)) {
															return $doctor;
														} else {
															return null;
														}
													}
	// function find_doctor_by_username($username){
	// 	global $connection;
	//
	// 	$safe_username = mysqli_real_escape_string($connection, $username);
	//
	// 	$query  = "SELECT * ";
	// 	$query .= "FROM doctor ";
	// 	$query .= "WHERE username = '{$safe_username}' ";
	// 	$query .= "LIMIT 1";
	// 	$doctor_set = mysqli_query($connection, $query);
	// 	confirm_query($doctor_set);
	// 	if($doctor = mysqli_fetch_assoc($doctor_set)) {
	// 		return $doctor;
	// 	} else {
	// 		return null;
	// 	}
	// }

								  				function find_doctor_by_usernameNpassword($connection,$username,$password){
															$query = "SElECT * FROM doctor Where username = '".$username."' and hashed_password = '".$password."'";
																$result = mysqli_query($connection, $query);
																if(mysqli_num_rows($result)== 1){
																$row = mysqli_fetch_assoc($result);
																return $row;
															}
														return false;
														}

														function find_doctor_by_firstname($connection,$firstname){
																				$query = "SElECT * FROM doctor Where doctor_firstname = '".$firstname."'";
																					$result = mysqli_query($connection, $query);
																					if(mysqli_num_rows($result)== 1){
																					$row = mysqli_fetch_assoc($result);
																					return $row;
																				}
																			return false;
																			}


														function find_user_by_usernameNpassword($connection,$username,$password){
																				$query = "SElECT * FROM user Where user_email = '".$username."' and user_password = '".$password."'";
																					$result = mysqli_query($connection, $query);
																					if(mysqli_num_rows($result)== 1){
																					$row = mysqli_fetch_assoc($result);
																					return $row;
																				}
																			return false;
																			}


														function doctor_attempt_login($username,$password){
															$doctor = find_doctor_by_username($username);
															if ($doctor) {
																// found doctor, now check password
																if (password_check($password, $doctor["hashed_password"])) {
																	// password matches
																	return $doctor;
																} else {
																	// password does not match
																	return false;
																}
															} else {
																// doctor not found
																return false;
															}
														}

														function find_admin_by_firstname($firstname) {
															global $connection;

															$safe_firstname = mysqli_real_escape_string($connection, $firstname);

															$query  = "SELECT * ";
															$query .= "FROM admins ";
															$query .= "WHERE firstname = '{$safe_firstname}' ";
															$query .= "LIMIT 1";
															$admin_set = mysqli_query($connection, $query);
															confirm_query($admin_set);
															if($admin = mysqli_fetch_assoc($admin_set)) {
																return $admin;
															} else {
																return null;
															}
														}

														function find_all_report() {
															global $connection;

															$query  = "SELECT * ";
															$query .= "FROM report ";
															$query .= "ORDER BY report_date";
															$report_set = mysqli_query($connection, $query);
															confirm_query($report_set);
															return $report_set;
														}

														function find_patient_reg() {
															global $connection;

															$query  = "SELECT reg_no ";
															$query .= "FROM patient ";
															$query .= "ORDER BY id";
															$report_reg = mysqli_query($connection, $query);
															confirm_query($report_reg);
															return $report_reg;
														}
?>
