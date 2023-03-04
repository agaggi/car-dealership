<?php
    session_start();
    require("authentication/authentication.php");

    $error_message = '';

    if (isset($_POST['username']) && isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $conn = new mysqli("database", "root", "password", "dealership");

        // Check if valid credentials were entered
        if (authenticate_user($conn, $username, $password)) {

            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;

            $sql = "SELECT * FROM EMPLOYEE WHERE Username = '$username'";
	        $result = $conn->query($sql) or die("login.php - Error with username query.");

            // If the user is not found in the EMPLOYEE table, we know they're a customer
            if (mysqli_num_rows($result) === 1) {

                $_SESSION['role'] = "Employee";
            }

            else {

                $_SESSION['role'] = "Customer";
            }

            header('Location: index.php');
            exit();
        }

        else {

            $error_message = 'Incorrect username and/or password';
        }

        $conn->close();
    }
?>

<!DOCTYPE html>

<html>

<head>
	<title>Car Dealership - Login</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="./styles.css" />
</head>

<body>
	<div class="small-container">
        <strong style="color: red"><?php echo $error_message ?></strong>
        <h2>Login</h2>

        <p>
            If you don't have an account, please <a href="signup.php">sign up</a>.
        </p>

        <form action="" method="post">
            <table width="300" style="border: 0; margin: auto">
                <tr>
                    <td width="150"><strong>Username</strong></td>
                    <td><input name="username" type="text"></td>
                </tr>

                <tr>
                    <td width="150"><strong>Password<strong></td>
                    <td><input name="password" type="password"></td>
                </tr>
            </table>

            <button name="login">Login</button>
        </form>
    </div>
</body>
</html>
