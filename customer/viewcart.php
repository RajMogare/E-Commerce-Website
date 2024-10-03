<?php 
include "./authgaurd.php";
include "./menu.html";
include "../shared/connection.php";

// Query to fetch cart items for the logged-in user
$sql_result = mysqli_query($conn, "SELECT *
                                   FROM cart 
                                   JOIN product ON cart.pid = product.pid 
                                   WHERE cart.userid = $_SESSION[userid]");

// Start the container and row for the grid system
echo "<div class='container my-5'>";  // Bootstrap container
echo "<div class='row g-4'>";         // Bootstrap row with gap

// Loop through the results and display the items in grid columns
while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3'>"; // Responsive grid column for different screen sizes
    echo "<div class='card h-100'>";                        // Card with equal height
    echo "<img src='" . $dbrow['impath'] . "' class='card-img-top' alt='Product Image'>";
    echo "<div class='card-body'>";
    echo "<h4 class='card-title'>" . $dbrow['name'] . "</h4>";
    echo "<h5 class='card-subtitle mb-2 text-muted'>" . $dbrow['price'] . " Rs</h5>";
    echo "<p class='card-text'>" . $dbrow['detail'] . "</p>";
    echo "<div>";
    echo "<a href='removecart.php?cartid=" . $dbrow['cartid'] . "'>";
    echo "<button type='button' class='btn btn-outline-danger text-center'>Remove from Cart</button>";
    echo "</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";  // Close card div
    echo "</div>";  // Close column div
}

// Close row and container
echo "</div>";
echo "</div>";
?>
