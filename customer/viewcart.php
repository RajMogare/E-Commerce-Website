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

// Check if there are items in the cart
if (mysqli_num_rows($sql_result) > 0) {
    // Loop through the results and display the items in grid columns
    while ($dbrow = mysqli_fetch_assoc($sql_result)) {
        echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3'>"; // Responsive grid column for different screen sizes
        echo "<div class='card h-100 shadow-sm'>";              // Card with shadow and equal height
        echo "<img src='" . $dbrow['impath'] . "' class='card-img-top' alt='Product Image' style='height: 200px; object-fit: cover;'>";  // Product image with consistent height
        echo "<div class='card-body d-flex flex-column'>";       // Flexbox for better layout control inside card
        echo "<h4 class='card-title'>" . $dbrow['name'] . "</h4>";  // Product name
        echo "<h5 class='card-subtitle mb-2 text-muted'>" . $dbrow['price'] . " Rs</h5>";  // Product price
        echo "<p class='card-text'>" . $dbrow['detail'] . "</p>";  // Product description
        echo "<div class='mt-auto'>";  // Buttons at the bottom using `mt-auto` for spacing
        
        // Remove button
        echo "<a href='removecart.php?cartid=" . $dbrow['cartid'] . "'>";
        echo "<button type='button' class='btn btn-outline-danger w-100'>Remove</button>";
        echo "</a>";

        // Place order button
        echo "<a href='placeOrder.php?cartid=" . $dbrow['cartid'] . "' class='d-block mt-2'>";
        echo "<button type='button' class='btn btn-outline-secondary w-100'>Place Order</button>";
        echo "</a>";

        echo "</div>";  // Close button div
        echo "</div>";  // Close card-body div
        echo "</div>";  // Close card div
        echo "</div>";  // Close column div
    }
} else {
    // Message if the cart is empty
    echo "<div class='col-12 text-center'>";
    echo "<p>Your cart is empty. Start adding products!</p>";
    echo "</div>";
}

// Close row and container
echo "</div>";
echo "</div>";
?>
