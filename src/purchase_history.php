<?php
	require("authentication/login_check.php");

	$conn = new mysqli("database", "root", "password", "dealership");

	$table = "CUSTOMER";
	$username = $_SESSION['username'];

	$sql = "SELECT V.VehicleType, V.VehicleModel, V.Price, V.Color,
					V.ListingDate, S.Date, E.Firstname, E.Lastname
			FROM EMPLOYEE as E, SALES as S, VEHICLE as V, CUSTOMER AS C
			WHERE E.EmployeeID = S.EmployeeID AND V.VehicleID = S.VehicleID
			AND C.CustomerID = S.CustomerID AND C.Username = '$username'
			ORDER BY S.Date DESC";

	$result = $conn->query($sql)
		or die("purchase_history.php - Cannot get purchase history");

	$headers = array('Type', 'Model', 'Price', 'Color', 'Listed On',
					 'Purchased On', 'Sales Rep.');

	$conn->close();
?>

<!DOCTYPE HTML>

<html>

<head>
	<title>Car Dealership - Purchase History</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="./styles.css" />

	<style>
		table, th, td {

			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>

<body>
	<?php include("components/header.php"); ?>
	<div class="large-container">
		<div style='text-align: center'>
			<h2>Purchase History</h2>
			<a href='profile.php'>Go back to profile</a>
		</div>

		<br>

		<table style="margin: 0 auto; width: 80%">
			<tr>
				<?php
					// Outputting our column headers
					foreach ($headers as $header) {

						echo strcmp($header, "Sales Rep.") === 0 ? "<th colspan='2'>"
																 : "<th>";
						echo $header."</th>";
					}
				?>
			</tr>

			<?php
				while ($row = $result->fetch_assoc()) {

					echo "<tr>";

					foreach ($row as $cell) {

						echo "<td style='text-align: center'>$cell</td>";
					}

					echo "</tr>";
				}
			?>
		</table>
	</div>
</body>
</html>
