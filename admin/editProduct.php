<?php
session_start();

// Include connection to the database
include "../shared/connection.php";

// Get the product ID from the URL
$pid = $_GET['pid'];

// Fetch the product details for the given product ID
$query = "SELECT * FROM product WHERE pid = $pid";
$result = mysqli_query($conn, $query);

// Check if the product exists
if (mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
} else {
    echo "Product not found.";
    exit();
}

// Handle form submission when the user updates the product details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and escape inputs to prevent SQL injection
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $pprice = (float)$_POST['pprice']; // Ensure price is treated as a float number
    $pdetail = mysqli_real_escape_string($conn, $_POST['pdetail']);
    $userid = $_SESSION['userid'];

    // If a new image is uploaded, process the file
    if (!empty($_FILES['pdtimg']['tmp_name'])) {
        $source = $_FILES['pdtimg']['tmp_name'];
        $target = "../shared/images/" . basename($_FILES['pdtimg']['name']);
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($source, $target)) {
            // Update the product with the new image path
            $query = "UPDATE product 
                      SET name = '$pname', price = $pprice, detail = '$pdetail', impath = '$target'
                      WHERE pid = $pid AND owner = $userid";
        } else {
            echo "Failed to upload image.";
            exit();
        }
    } else {
        // Update the product without changing the image
        $query = "UPDATE product 
                  SET name = '$pname', price = $pprice, detail = '$pdetail'
                  WHERE pid = $pid AND owner = $userid";
    }

    // Execute the update query and check for success
    if (mysqli_query($conn, $query)) {
        header("Location: view.php"); // Redirect to the product view page after successful update
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <title>Edit Product</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Edit Product</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="pname" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="pname" name="pname" value="<?= htmlspecialchars($product['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="pprice" class="form-label">Product Price (in Rs)</label>
                <input type="number" step="0.01" class="form-control" id="pprice" name="pprice" value="<?= htmlspecialchars($product['price']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="pdetail" class="form-label">Product Details</label>
                <textarea class="form-control" id="pdetail" name="pdetail" rows="3" required><?= htmlspecialchars($product['detail']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="pdtimg" class="form-label">Product Image (Optional)</label>
                <input type="file" class="form-control" id="pdtimg" name="pdtimg">
                <small class="form-text text-muted">Current image: <img src="<?= htmlspecialchars($product['impath']) ?>" alt="Product Image" width="100" class="img-thumbnail mt-1"></small>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update Product</button>
                <a href="products.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
