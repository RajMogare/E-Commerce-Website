<?php

session_start();

include "../shared/connection.php";

// Sanitize and escape inputs to prevent SQL injection
$pname = mysqli_real_escape_string($conn, $_POST['pname']);
$pprice = (float)$_POST['pprice']; // Ensure price is treated as a float number
$pdetail = mysqli_real_escape_string($conn, $_POST['pdetail']);
$userid = $_SESSION['userid'];

// File upload handling
$source = $_FILES['pdtimg']['tmp_name'];
$target = "../shared/images/" . basename($_FILES['pdtimg']['name']);

// Move the uploaded file to the target directory
if (move_uploaded_file($source, $target)) {
    // Insert product details into the database
    $query = "INSERT INTO product (name, price, detail, impath, owner) 
              VALUES ('$pname', $pprice, '$pdetail', '$target', $userid)";

    // Execute the query and check for success
    if (mysqli_query($conn, $query)) {
        header("Location: products.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Failed to upload image.";
}

?>
