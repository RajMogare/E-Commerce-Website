<?php

session_start();
$_SESSION["login_status"] = false;

$conn = new mysqli("localhost", "root", "", "acme_project_ecommerce", 3306);

$username = $_POST['username'];
$password = $_POST['password'];


$query = "select * from user where username='$username'";

// echo $query;
$sql_result = mysqli_query($conn, $query);



echo "<br>";
print_r($sql_result);
echo "<br>";

if ($sql_result->num_rows > 0) {
    $_SESSION["login_status"] = true;

    echo "Login Success";
    $dbrow = mysqli_fetch_assoc($sql_result);
    $_SESSION["login_status"] = true;
    $_SESSION["usertype"] = $dbrow["usertype"];
    $_SESSION["username"] = $dbrow["username"];
    $_SESSION["userid"] = $dbrow["userid"];
    $_SESSION["cartid"]=$dbrow["cartid"];
    // echo "<br>";
    // echo $dbrow;
    // echo "<br>";

    print_r($dbrow);

    if (password_verify($password, $dbrow['password'])) {

        if ($dbrow['usertype'] == 'Vendor') {
            header("location:../vendor/home.php");
        } else if ($dbrow['usertype'] == 'Customer') {
            header("location:../customer/home.php");
        }
    }
} else {
    echo "Login Failed";
}
