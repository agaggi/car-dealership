<?php
	require("authentication/login_check.php");
	require("authentication/make_sale.php");

	$conn = new mysqli("database", "root", "password", "dealership");
	$sql = "SELECT * from VEHICLE WHERE IsSold = 0";

	$criteria = array();

	// Check if the form in index.php was filled out in any way
	$not_empty = !empty($_POST['type']) || !empty($_POST['color']) ||
				 !empty($_POST['model']) || !empty($_POST['lower_price']) ||
				 !empty($_POST['upper_price']);

	if ($not_empty) {

		if (!empty($_POST['type'])) {

			$type = $_POST['type'];
			array_push($criteria, "VehicleType = '$type'");
		}

		if (!empty($_POST['color'])) {

			$color = $_POST['color'];
			array_push($criteria, "Color = '$color'");
		}

		if (!empty($_POST['model'])) {

			$model = $_POST['model'];
			array_push($criteria, "VehicleModel LIKE '%$model%'");
		}

		if (!empty($_POST['lower_price'])) {

			$lowest = $_POST['lower_price'];
			array_push($criteria, "Price >= '$lowest' ");
		}

		if (!empty($_POST['upper_price'])) {

			$highest = $_POST['upper_price'];
			array_push($criteria, "Price <= '$highest'");
		}

		foreach ($criteria as $c) {

			$sql .= " AND " . $c;
		}
	}

	$sql .= " ORDER BY ListingDate DESC";
	$result = $conn->query($sql) or die("listings.php - Cannot query VEHICLE table.");
?>

<!DOCTYPE HTML>

<html>

<head>
	<title>Car Dealership - Listings</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="./styles.css" />
</head>

<body>
	<?php include("components/header.php"); ?>

	<div class="large-container">
		<?php
			// No vehicles matching criteria
			if (mysqli_num_rows($result) == 0) {

				echo "<h2 style='text-align: center'>No results found</h2>";
			}

			else {

				echo "<h2 style='text-align: center'>Listings</h2>";
				echo "<hr width='65%'>";

				while ($row = $result->fetch_assoc()) {

					// VEHICLE table columns to be displayed
					$image = $row['ImageName'];
					$list_date = $row['ListingDate'];
					$model = $row['VehicleModel'];
					$type  = $row['VehicleType'];
					$price = $row['Price'];
					$color = $row['Color'];
					$vehicleID = $row['VehicleID'];
					$employeeID = $row['ListedBy'];

					// Getting the name of the employee using their ID
					$sql = "SELECT FirstName, LastName FROM EMPLOYEE
							WHERE EmployeeID = $employeeID";
					$response = $conn->query($sql)
						or die("listings.php - Cannot get employee name.");

					$sales_rep = join(" ", $response->fetch_assoc());

					echo "
						<div class='listing'>
							<div class='listing-image'>
								<img width='400' src='assets/vehicle_images/$image' />
							</div>

							<div class='listing-desc'>
								<h3>$model</h3>

								<p>Style/Body: $type</p>
								<p>Price: $$price</p>
								<p>Color: $color</p>
								<p>Listed on: $list_date</p>
								<p>Sales Representitive: $sales_rep</p>";

					// Make the purchase button available to customers only
					if (strcmp($_SESSION['role'], "Customer") === 0) {

						echo "<form action='' method='post'>";
						echo "<button name='$vehicleID'>Purchase</button>";
						echo "</form>";

						if (isset($_POST[$vehicleID])) {

							make_sale($conn, $vehicleID, $employeeID);
						}
					}

					echo "</div></div>";
				}
			}

			$conn->close();
		?>
	</div>
</body>
</html>
