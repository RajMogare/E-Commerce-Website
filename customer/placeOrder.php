<?php
session_start();
// include "./authgaurd.php";
include "../shared/connection.php";

// Fetch the product details from the cart (assuming you are passing cartid via URL)
$cartid = $_GET['cartid'];
$sql_result = mysqli_query($conn, "SELECT * FROM cart JOIN product ON cart.pid = product.pid WHERE cart.cartid = $cartid");
$cartItem = mysqli_fetch_assoc($sql_result);

?>

<div class="container my-5">
    <h2>Order Details</h2>
    <form action="placeOrderAction.php" method="POST">
        <input type="hidden" name="cartid" value="<?php echo $cartItem['cartid']; ?>">
        <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
        <input type="hidden" name="pid" value="<?php echo $cartItem['pid']; ?>">
        
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Shipping Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <button type="submit" class="btn btn-primary">Buy Now</button>
    </form>
</div>
