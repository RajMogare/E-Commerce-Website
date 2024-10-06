<?php
include "./authgaurd.php";
include "../shared/connection.php";

if (isset($_GET['orderid'])) {
    $orderid = $_GET['orderid'];

    // Update the order status to 'Delivered'
    $sql_update = "UPDATE orders SET order_status = 'Delivered' WHERE orderid = $orderid";
    if (mysqli_query($conn, $sql_update)) {
        // Redirect back to admin orders page with a success message
        header("Location: adminOrders.php?status=delivered");
    } else {
        echo "Error updating order status: " . mysqli_error($conn);
    }
} else {
    echo "No order ID provided!";
}
?>
