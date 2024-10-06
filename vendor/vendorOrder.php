<?php
include "./authgaurd.php";
include "../shared/connection.php";

// Fetch all orders where the status is 'Processing'
$sql_result = mysqli_query($conn, "SELECT * FROM orders WHERE order_status = 'Processing'");

if (!$sql_result) {
    echo "<div class='alert alert-danger'>Failed to fetch new orders. Please try again later.</div>";
    exit;
}

echo "<div class='container my-5'>";

// Back button to return to the home page
echo "<a href='home.php'>";
echo "<button class='btn btn-outline-primary mb-3'><i class='bi bi-arrow-left'></i> Back to Home</button>";
echo "</a>";

echo "<h2>New Orders</h2>";
echo "<table class='table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>
        <th>Order ID</th>
        <th>Product ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Action</th>
      </tr>";
echo "</thead>";
echo "<tbody>";

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($dbrow['orderid']) . "</td>";
    echo "<td>" . htmlspecialchars($dbrow['pid']) . "</td>";
    echo "<td>" . htmlspecialchars($dbrow['name']) . "</td>";
    echo "<td>" . htmlspecialchars($dbrow['address']) . "</td>";
    echo "<td>" . htmlspecialchars($dbrow['phone']) . "</td>";
    echo "<td><span class='badge bg-warning'>Processing</span></td>";
    echo "<td>";
    echo "<a href='updateOrderStatus.php?orderid=" . urlencode($dbrow['orderid']) . "'>";
    echo "<button type='button' class='btn btn-outline-success'>Mark as Shipped</button>";
    echo "</a>";
    echo "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// Vendor's Shipped Order History
$sql_result_shipped = mysqli_query($conn, "SELECT * FROM orders WHERE order_status = 'Shipped'");

if (!$sql_result_shipped) {
    echo "<div class='alert alert-danger'>Failed to fetch shipped orders. Please try again later.</div>";
    exit;
}

echo "<h2 class='mt-5'>Order History (Shipped Orders)</h2>";
echo "<table class='table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>
        <th>Order ID</th>
        <th>Product ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Status</th>
      </tr>";
echo "</thead>";
echo "<tbody>";

while ($dbrow = mysqli_fetch_assoc($sql_result_shipped)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($dbrow['orderid']) . "</td>";
    echo "<td>" . htmlspecialchars($dbrow['pid']) . "</td>";
    echo "<td>" . htmlspecialchars($dbrow['name']) . "</td>";
    echo "<td>" . htmlspecialchars($dbrow['address']) . "</td>";
    echo "<td>" . htmlspecialchars($dbrow['phone']) . "</td>";
    echo "<td><span class='badge bg-info'>Shipped</span></td>";
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
    <title>Vendor Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
</body>
</html>
