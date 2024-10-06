<?php
session_start();
$_SESSION["login_status"] = false;

// Create connection
$conn = new mysqli("localhost", "root", "", "acme_project_ecommerce", 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Fetch user by username only
$query = "SELECT * FROM user WHERE username='$username'";

// Execute query
$sql_result = mysqli_query($conn, $query);

// Check if user exists
if ($sql_result && mysqli_num_rows($sql_result) > 0) {
    $dbrow = mysqli_fetch_assoc($sql_result);

    // Use password_verify to check the hashed password
    if (password_verify($password, $dbrow['password'])) {
        // Password matches, set session variables
        $_SESSION["login_status"] = true;
        $_SESSION["usertype"] = $dbrow["usertype"];
        $_SESSION["username"] = $dbrow["username"];
        $_SESSION["userid"] = $dbrow["userid"];

        // Redirect based on user type
        if ($dbrow['usertype'] == 'Admin') {
            header("location:../admin/home.php");
            exit;
        } else if ($dbrow['usertype'] == 'Customer') {
            header("location:../customer/home.php");
            exit;
        } else if ($dbrow['usertype'] == 'Vendor') {
            header("location:../vendor/home.php");
            exit;
        }
    } else {
        echo "Invalid password. Login failed.";
    }
} else {
    echo "Invalid username. Login failed.";
}

// Close the connection
mysqli_close($conn);
?>
