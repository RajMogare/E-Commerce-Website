<?php
include '../shared/connection.php';

// Check if 'cartid' is passed via GET
if (isset($_GET['cartid'])) {
    $cartid = $_GET['cartid']; // Get the cartid from the URL

    // Query to delete the cart item based on cartid
    $delete_query = "DELETE FROM cart WHERE cartid = $cartid";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        echo "Item removed from cart successfully!";
        // header("location:home.php");
    } else {
        echo "Failed to remove item: " . mysqli_error($conn);
    }

    // Redirect back to the cart page or home page
    header("Location:viewcart.php");
} else {
    echo "Invalid request.";
}
?>
