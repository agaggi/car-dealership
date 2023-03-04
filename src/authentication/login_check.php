<?php
    session_start();

	// Is the person accessing this page logged in or not?
	if (!isset($_SESSION['logged_in'])) {

		header('Location: login.php');
		exit();
	}
?>
