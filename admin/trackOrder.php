<?php
include "./authgaurd.php";
include "../shared/connection.php";

// Fetch all orders placed by the logged-in user
$sql_result = mysqli_query($conn, "SELECT * FROM orders WHERE userid = $_SESSION[userid]");

echo "<div class='container my-5'>";


// Back button to go back to the cart page (viewcart.php)
echo "<a href='home.php'>";
echo "<button class='btn btn-outline-primary mb-3'><i class='bi bi-arrow-left'></i> Back to Cart</button>";
echo "</a>";

// Page heading with some margin and styling
echo "<h2 class='mb-4'>Your Orders</h2>";

// Table to display the order details with Bootstrap styling
echo "<div class='table-responsive'>";  // Responsive table for better mobile viewing
echo "<table class='table table-striped table-bordered table-hover'>";  // Added hover effect
echo "<thead class='table-dark'>";  // Dark header
echo "<tr>";
echo "<th scope='col'>Order ID</th>";
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
    echo "<td>" . $dbrow['pid'] . "</td>";
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
    echo "<td>" . date('d M Y', strtotime($dbrow['order_date'])) . "</td>";  // Formatted date
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";  // Close table-responsive div
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

    <title>Document</title>
</head>

<body>

</body>

</html>