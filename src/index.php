<?php require("authentication/login_check.php"); ?>

<!DOCTYPE HTML>

<html>

<head>
	<title>Car Dealership</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="./styles.css" />
</head>

<body>
	<?php include("components/header.php"); ?>

	<div class="small-container" style="text-align: left">
		<div style="text-align: center">
			<h2>Search for a Vehicle</h2>
			<i>Enter your desired criteria</i>
		</div>

		<form action="listings.php" method="post">
			<div style="display: flex">
				<div class="search-options">
					<h3>Vehicle Type</h3>
					<select name="type">
						<option lable=" "></option>
						<option value="Coupe">Coupe</option>
						<option value="Truck">Truck</option>
						<option value="Sedan">Sedan</option>
						<option value="SUV">SUV</option>
					</select>

					<h3>Price Range</h3>

					<table width="150" style="border: 0; margin: auto">
						<tr>
							<td width="75">Lowest</td>
							<td><input type="number" name="lower_price" /></td>
						</tr>

						<tr>
							<td width="75">Highest</td>
							<td><input type="number" name="upper_price" /></td>
						</tr>
					</table>
				</div>

				<div class="search-options">
					<h3>Color</h3>
					<select name="color">
						<option lable=" "></option>
						<option value="White">White</option>
						<option value="Black">Black</option>
						<option value="Blue">Blue</option>
						<option value="Yellow">Yellow</option>
						<option value="Red">Red</option>
					</select>

					<h3>Model</h3>
					<input type="text" name="model" />
				</div>
			</div>

			<br>

			<div style="text-align: center">
				<button name="submit">Search</button>
			</div>
		</form>
	</div>
</body>
</html>
