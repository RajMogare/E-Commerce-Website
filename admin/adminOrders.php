<?php
include "./authgaurd.php";
include "../shared/connection.php";

// Fetch orders that are 'Shipped' (for admin to mark as Delivered)
$sql_result_shipped_orders = mysqli_query($conn, "SELECT * FROM orders WHERE order_status = 'Shipped'");

// Fetch orders that are 'Delivered' (for history tracking)
$sql_result_order_history = mysqli_query($conn, "SELECT * FROM orders WHERE order_status = 'Delivered'");

echo "<div class='container my-5'>";
echo "<a href='home.php'>";
echo "<button class='btn btn-outline-primary mb-3'><i class='bi bi-arrow-left'></i> Back to Cart</button>";
echo "</a>";

// New Orders (Shipped orders that need to be marked as Delivered)
echo "<h2>Shipped Orders (Pending Delivery)</h2>";
echo "<table class='table table-striped table-bordered'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
echo "<th>Order ID</th><th>Product ID</th><th>Name</th><th>Address</th><th>Phone</th><th>Status</th><th>Action</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($dbrow = mysqli_fetch_assoc($sql_result_shipped_orders)) {
    echo "<tr>";
    echo "<td>" . $dbrow['orderid'] . "</td>";
    echo "<td>" . $dbrow['pid'] . "</td>";
    echo "<td>" . $dbrow['name'] . "</td>";
    echo "<td>" . $dbrow['address'] . "</td>";
    echo "<td>" . $dbrow['phone'] . "</td>";
    echo "<td><span class='badge bg-info'>Shipped</span></td>";
    echo "<td>";
    echo "<a href='updateOrderStatusAdmin.php?orderid=" . $dbrow['orderid'] . "'>";
    echo "<button type='button' class='btn btn-outline-success'>Mark as Delivered</button>";
    echo "</a>";
    echo "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// Order History (Delivered Orders)
echo "<h2 class='mt-5'>Order History (Delivered Orders)</h2>";
echo "<table class='table table-striped table-bordered'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
echo "<th>Order ID</th><th>Product ID</th><th>Name</th><th>Address</th><th>Phone</th><th>Status</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($dbrow = mysqli_fetch_assoc($sql_result_order_history)) {
    echo "<tr>";
    echo "<td>" . $dbrow['orderid'] . "</td>";
    echo "<td>" . $dbrow['pid'] . "</td>";
    echo "<td>" . $dbrow['name'] . "</td>";
    echo "<td>" . $dbrow['address'] . "</td>";
    echo "<td>" . $dbrow['phone'] . "</td>";
    
    // Status is 'Delivered' for history orders
    echo "<td><span class='badge bg-success'>Delivered</span></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";
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
    <title>Admin Orders</title>
</head>

<body>

</body>

</html>
