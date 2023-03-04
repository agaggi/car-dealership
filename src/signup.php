<?php
	session_start();
	$error_message = '';

	// Is a username and password provided?
	if (isset($_POST['username']) && isset($_POST['password']) &&
		isset($_POST['confirm_pass'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirm_pass = $_POST['confirm_pass'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		$conn = new mysqli("database", "root", "password", "dealership");

		$sql = "SELECT * FROM CUSTOMER WHERE Username = '$username'";
		$result = $conn->query($sql) or die("signup.php - Cannot query CUSTOMER table.");

		if (mysqli_num_rows($result) === 1) {

			$error_message = "Username already exists";
		}

		else if ($password === $confirm_pass) {

			$password_hash = md5($password);

			$sql = "INSERT INTO CUSTOMER VALUES (NULL, '$firstname', '$lastname',";
			$sql .= " '$phone', '$email', '$username', '$password_hash', NOW())";

            $result = $conn->query($sql) or die("signup.php - User can not be created.");

			header('Location: login.php');
			exit();
		}

		else {

			$error_message = "Passwords do not match";
		}

		$conn->close();
	}
?>

<!DOCTYPE HTML>

<html>

<head>
	<title>Car Dealership - Signup</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="./styles.css" />
</head>

<body>
	<div class="small-container">
		<strong style="color: red"><?php echo $error_message ?></strong>

        <h2>Create a user account</h2>

		<p>
			If you already have an account, please <a href="login.php">login here</a>.
		</p>

        <form action="" method="post">
		 	<table width="320" style="border: 0; margin: auto; text-align: left">
		  		<tr>
		   			<td>Username *</td>
		   			<td><input name="username" type="text" required></td>
		  		</tr>

		  		<tr>
		   			<td>Password *</td>
		   			<td><input name="password" type="password" required></td>
		  		</tr>

				<tr>
					<td>Confirm Password *</td>
					<td><input name="confirm_pass" type="password" required></td>
				</tr>

				<tr>
					<td>First Name *</td>
					<td><input name="firstname" type="text" required></td>
				</tr>

				<tr>
					<td>Last Name *</td>
					<td><input name="lastname" type="text" required></td>
				</tr>

				<tr>
					<td>Email Address</td>
					<td><input name="email" type="text"></td>
				</tr>

				<tr>
					<td>Phone</td>
					<td><input name="phone" type="text"></td>
				</tr>
		 	</table>

		 	<button name="signup">Sign Up</button>
		</form>
    </div>
</body>
</html>
