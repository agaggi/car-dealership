<?php
	require("authentication/login_check.php");

	$conn = new mysqli("database", "root", "password", "dealership");

	$username = $_SESSION['username'];
	$table = strcmp($_SESSION['role'], "Customer") === 0 ? "CUSTOMER"
														 : "EMPLOYEE";

	if (isset($_POST['update_email'])) {

		$new_email = $_POST['update_email'];

		$sql = "UPDATE $table SET EmailAddress='$new_email' WHERE Username = '$username'";
		$result = $conn->query($sql) or die ("profile.php - Cannot update email.");
	}

	if (isset($_POST['update_password'])) {

		$new_password = $_POST['update_password'];
		$new_hash = md5($new_password);

		$sql = "UPDATE $table SET Password = '$new_hash' WHERE Username ='$username'";
		$result = $conn->query($sql) or die ("profile.php - Cannot update password.");
	}

	// Employees will not have a phone #
	if(strcmp($table, "CUSTOMER") === 0) {

		$sql = "SELECT FirstName, LastName, EmailAddress, Phone
				FROM $table where Username = '$username'";
		$result = $conn->query($sql) or die ("profile.php - Cannot get customer info.");

		while ($row = $result->fetch_assoc()) {

			$firstname = $row['FirstName'];
			$lastname = $row['LastName'];
			$email = $row['EmailAddress'];
			$phone = $row['Phone'];
		}
	}

	else {

		$sql = "SELECT FirstName, LastName, EmailAddress
				FROM $table where Username = '$username'";
		$result = $conn->query($sql) or die ("profile.php - Cannot get employee info.");

		while ($row = $result->fetch_assoc()) {

			$firstname = $row['FirstName'];
			$lastname = $row['LastName'];
			$email = $row['EmailAddress'];
			$phone = "";
		}
	}

	$conn->close();
?>

<!DOCTYPE html>

<html>

<head>
	<title>Car Dealership - Profile</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="./styles.css" />
</head>

<body>
	<?php include("components/header.php"); ?>

	<div class="small-container" style="text-align: left">
		<h2 style="text-align: center">Welcome,  <?php echo "$firstname $lastname" ?></h2>

		<div style="display: flex">
			<div style="margin: 0 auto">
				<h3>Your Profile</h3>

				<table width="250" style="border: 0">
					<tr>
						<td><b>First Name</b></td>
						<td><?php echo $firstname ?></td>
					</tr>
					<tr>
						<td><b>Last Name</b></td>
						<td><?php echo $lastname ?></td>
					</tr>
					<tr>
						<td><b>Email</b></td>
						<td><?php echo $email ?></td>
					</tr>
					<tr>
						<td><b>Phone</b></td>
						<td><?php echo $phone ? $phone : "N/A" ?></td>
					</tr>
				</table>
			</div>

			<div style="margin: 0 auto">
				<form action="" method="post">
					<h4>Update Email:</h4>

					<input type=text name="update_email">
					<button>Submit</button>
				</form>

				<form action="" method="post">
					<h4>Update Password</h4>

					<input type=text name="update_password">
					<button>Submit</button>
				</form>
			</div>
		</div>

		<?php
			if (strcmp($table, "CUSTOMER") === 0) {
				echo "
					<br>
					<div style='text-align: center'>
						<form action='purchase_history.php' method='post'>
							<button name='purchases'>View Purchases</button>
						</form>
					</div>";
			}
		?>
	</div>
</body>
</html>
