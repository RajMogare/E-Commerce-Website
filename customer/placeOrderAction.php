<?php
session_start();
include "../shared/connection.php";

// Retrieve form data
$cartid = $_POST['cartid'];
$userid = $_POST['userid'];
$pid = $_POST['pid'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Set initial status to 'Processing'
$order_status = 'Processing';

// Insert order into the orders table
$insert_order = "INSERT INTO orders (userid, pid, name, address, phone, order_status) 
                 VALUES ('$userid', '$pid', '$name', '$address', '$phone', '$order_status')";

if (mysqli_query($conn, $insert_order)) {
    // After placing the order, you can remove the product from the cart
    $delete_cart = "DELETE FROM cart WHERE cartid = $cartid";
    mysqli_query($conn, $delete_cart);

    echo "Order placed successfully! Your order is being processed.";
    // Redirect to customer home or order tracking page
    header("Location: customerOrders.php");
} else {
    echo "Error placing order: " . mysqli_error($conn);
}

?>
