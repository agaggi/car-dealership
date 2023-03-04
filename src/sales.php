<?php
    require("authentication/login_check.php");

	$conn = new mysqli("database", "root", "password", "dealership");

	$username = $_SESSION['username'];

    if (empty($_POST['personal_sales'])) {

        $sql = "SELECT V.VehicleType, V.VehicleModel, V.Price, V.Color,
                       V.ListingDate, S.Date, C.CustomerID, E.FirstName, E.Lastname
                FROM EMPLOYEE as E, SALES as S, VEHICLE as V, CUSTOMER AS C
                WHERE E.EmployeeID = S.EmployeeID AND V.VehicleID = S.VehicleID
                AND C.CustomerID = S.CustomerID ORDER BY S.Date DESC";
    }

    else {

        $sql = "SELECT V.VehicleType, V.VehicleModel, V.Price, V.Color,
                       V.ListingDate, S.Date, C.CustomerID, E.FirstName, E.Lastname
                FROM EMPLOYEE as E, SALES as S, VEHICLE as V, CUSTOMER AS C
                WHERE E.EmployeeID = S.EmployeeID AND V.VehicleID = S.VehicleID
                AND C.CustomerID = S.CustomerID AND E.Username = '$username'
                ORDER BY S.Date DESC";
    }

    $result = $conn->query($sql)
		or die("sales.php - Cannot get sales.");

	$headers = array('Type', 'Model', 'Price', 'Color', 'Listed On',
					 'Purchased On', 'Customer ID', 'Sales Rep.');

	$conn->close();
?>

<!DOCTYPE html>

<html>

<head>
	<title>Car Dealership - Sales</title>
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
            <h2>Sales</h2>
            <form action='' method='post'>
                <input type="submit" name="personal_sales" value="Get Your Sales" />
            </form>
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
