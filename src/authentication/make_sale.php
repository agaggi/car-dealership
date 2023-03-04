<?php
    function make_sale($conn, $vehicleID, $employeeID) {

        $username = $_SESSION['username'];

        $sql = "SELECT CustomerID FROM CUSTOMER WHERE Username = '$username'";
        $result = $conn->query($sql) or die("listings.php - Could not query Customer table.");

        $customerID = $result->fetch_assoc()['CustomerID'];

        // Initiate the sale
        $sql = "INSERT INTO SALES
                VALUES(NULL, NOW(), $customerID, $vehicleID, $employeeID)";
        $result = $conn->query($sql) or die("listings.php - Could not insert sale.");

        // Set the vehicle to sold in the VEHICLE table
        $sql = "UPDATE VEHICLE SET IsSold = 1 WHERE VehicleID = $vehicleID";
        $result = $conn->query($sql) or die("listings.php - Could not mark vehicle sold.");

        echo "<script>location.href='listings.php'</script>";
    }
?>
