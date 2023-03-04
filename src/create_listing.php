<?php
    require("authentication/login_check.php");

    $errorMessage = '';

    if (isset($_POST['submit'])) {

        if (isset($_FILES['image']) && strcmp($_FILES['image']['name'], '') !== 0) {

            $image_name = $_FILES['image']['name'];
            $tmpfile = $_FILES['image']['tmp_name'];

            move_uploaded_file($tmpfile, "assets/vehicle_images/".$image_name);
        }

        else {

            $image_name = 'default.png';
        }

        $type = $_POST['type'];
        $model = $_POST['model'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $vin = $_POST['vin'];

        $username = $_SESSION['username'];

        $conn = new mysqli("database", "root", "password", "dealership");

        $sql = "SELECT EmployeeID FROM EMPLOYEE WHERE Username = '$username'";
        $result = $conn->query($sql) or die("sales.php - Cannot get employee.");

        $employee_id = $result->fetch_assoc()['EmployeeID'];

        $sql = "INSERT INTO VEHICLE
                VALUES (NULL, '$vin', '$type', '$model', $price, '$color',
                        0, NOW(), '$image_name', $employee_id)";

        $result = $conn->query($sql) or die("sales.php - Cannot list vehicle.");
        $conn->close();
    }
?>

<!DOCTYPE html>

<html>

<head>
	<title>Car Dealership - Create Listing</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="./styles.css" />
</head>

<body>
    <?php include("components/header.php"); ?>

    <div class="small-container" style="text-align: left">
        <h1 style='text-align: center'>Create Listing</h1>

        <form action='' method='post' enctype='multipart/form-data'>
            <table style="margin: 1% auto">
                <tr>
                    <td><b>Select Vehicle Type</b></td>
                    <td>
                        <select name='type'>
                            <option value='Coupe'> Coupe </option>
                            <option value='Truck'> Truck </option>
                            <option value='Sedan'> Sedan </option>
                            <option value='SUV'> SUV </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><b>Enter Vehicle Model</b></td>
                    <td><input type='text' name='model' required></td>
                </tr>

                <tr>
                    <td><b>Enter Vehicle VIN</b></td>
                    <td><input type='text' name='vin' required></td>
                </tr>

                <tr>
                    <td><b>Select Vehicle Color</b></td>
                    <td>
                        <select name='color'>
                            <option value='White'> White </option>
                            <option value='Black'> Black </option>
                            <option value='Blue'> Blue </option>
                            <option value='Yellow'> Yellow </option>
                            <option value='Red'> Red </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><b>Enter a Price</b></td>
                    <td><input type='number' name='price' required></td>
                </tr>

                <tr>
                    <td><b>Upload a Picture</b> (optional)</td>
                    <td><input type='file' accept='image/*' name='image'></td>
                </tr>
            </table>

            <div style='text-align: center'>
                <input type='submit' name='submit' value='Post' style='width: 150px'>
            </div>
        </form>
    </div>
</body>
</html>
