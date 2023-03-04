<?php
    // Checks whether the username and password hash match upon login
	function authenticate_user($conn, $username, $password) {

		// If username / password were not provided
		if (!isset($username) || !isset($password)) {

			return false;
        }

		$password_hash = md5($password);

		// Formulate the SQL statment to find the user
		$sql = "SELECT * FROM CUSTOMER WHERE Username = '$username' ";
        $sql .= "AND Password = '$password_hash'";

		$result = $conn->query($sql)
			or die("authentication.php - Cannot query CUSTOMER table");

		$nrows = $result->num_rows;

		$sql = "SELECT * FROM EMPLOYEE WHERE Username = '$username' ";
        $sql .= "AND Password = '$password_hash'";

		$result = $conn->query($sql)
			or die("authentication.php - Cannot query EMPLOYEE table");

		$nrows += $result->num_rows;

		// exactly one row? then we have found the user
		if ($nrows != 1) {

			return false;
        }

		return true;
	}
?>
