<?php
include "./authgaurd.php";
include "../shared/connection.php";

// Ensure session user ID is safely handled
$userid = $_SESSION['userid'];

// Query to fetch all orders placed by the logged-in user, along with product name from the products table
$sql_result = mysqli_query($conn, "SELECT orders.orderid, product.name AS product_name, orders.pid, orders.order_status, orders.order_date 
                                   FROM orders 
                                   JOIN product ON orders.pid = product.pid 
                                   WHERE orders.userid = '$userid'");

if (!$sql_result) {
    echo "<div class='alert alert-danger'>Failed to fetch orders. Please try again later.</div>";
    exit;
}

echo "<div class='container my-5'>";

// Back button to go back to the cart page (viewcart.php)
echo "<a href='viewcart.php'>";
echo "<button class='btn btn-outline-primary mb-3'><i class='bi bi-arrow-left'></i> Back to Cart</button>";
echo "</a>";

// Page heading with margin and styling
echo "<h2 class='mb-4'>Your Orders</h2>";

// Check if there are any orders to display
if (mysqli_num_rows($sql_result) > 0) {
    // Responsive table for better mobile viewing
    echo "<div class='table-responsive'>";
    echo "<table class='table table-striped table-bordered table-hover'>";
    echo "<thead class='table-dark'>";
    echo "<tr>";
    echo "<th scope='col'>Order ID</th>";
    echo "<th scope='col'>Product Name</th>";
    echo "<th scope='col'>Product ID</th>";
    echo "<th scope='col'>Status</th>";
    echo "<th scope='col'>Order Date</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Display each order in a table row
    while ($dbrow = mysqli_fetch_assoc($sql_result)) {
        echo "<tr>";
        echo "<td>" . $dbrow['orderid'] . "</td>";
        echo "<td>" . $dbrow['product_name'] . "</td>";
        echo "<td>" . $dbrow['pid'] . "</td>";

        // Display order status with badges for better UI
        echo "<td><span class='badge ";
        if ($dbrow['order_status'] == 'Processing') {
            echo "bg-warning'>Processing";
        } elseif ($dbrow['order_status'] == 'Shipped') {
            echo "bg-info'>Shipped";
        } elseif ($dbrow['order_status'] == 'Delivered') {
            echo "bg-success'>Delivered";
        } else {
            echo "bg-secondary'>Unknown";
        }
        echo "</span></td>";

        // Format and display the order date
        echo "<td>" . date('d M Y', strtotime($dbrow['order_date'])) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";  // Close table-responsive div
} else {
    // No orders found for the user
    echo "<div class='alert alert-info'>You have no orders yet.</div>";
}

echo "</div>";  // Close container div
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (Optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <title>Order History</title>
</head>
<body>

</body>
</html>
