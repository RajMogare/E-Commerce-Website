<?php
include "../shared/connection.php";

// Get the order ID from the URL and sanitize it
$orderid = isset($_GET['orderid']) ? intval($_GET['orderid']) : 0;

if ($orderid > 0) {
    // Update the order status to 'Shipped'
    $update_order = "UPDATE orders SET order_status = 'Shipped' WHERE orderid = $orderid";

    if (mysqli_query($conn, $update_order)) {
        // Redirect back to vendor panel with a success message
        header("Location: vendorOrder.php?status=success");
        exit();
    } else {
        echo "Error updating order status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid Order ID.";
}
?>
