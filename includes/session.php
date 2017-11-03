<?php

	session_start();

	function message() {
		if (isset($_SESSION["message"])) {
			$output = "<div class=\"alert\">";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "</div>";

			// clear message after use
			$_SESSION["message"] = null;

			return $output;
		}
	}

	function errors() {
		if (isset($_SESSION["errors"])) {
			$errors = $_SESSION["errors"];

			// clear message after use
			$_SESSION["errors"] = null;

			return $errors;
		}
	}
// 	function destroy_session_and_data() {
// 			$_SESSION = array();
// 			setcookie(session_name(), '', time() - 2592000, '/');
// 			session_destroy();
// }

?>
