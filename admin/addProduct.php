<?php
include "./authgaurd.php";
include "./menu.html";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        /* Custom styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5; /* Light background for contrast */
        }

        .form-container {
            background-color: #ffffff; /* White background for the form */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
        }

        h4 {
            color: #333; /* Dark text color for the heading */
        }

        .btn-danger {
            background-color: #dc3545; /* Red background for button */
            border-color: #dc3545; /* Red border */
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        .btn-danger:hover {
            background-color: #c82333; /* Darker red on hover */
            border-color: #bd2130; /* Darker border on hover */
        }

        .form-control {
            border-radius: 5px; /* Rounded corners for input fields */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-container {
                width: 90%; /* Adjust form width for smaller screens */
            }
        }
    </style>
    <title>Vendor Page</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="uploadProduct.php" method="post" class="w-50 form-container p-4" enctype="multipart/form-data">
            <h4 class="text-center">Add Product</h4>
            <input type="text" name="pname" placeholder="Product Name" class="form-control shadow-none mt-3" required>
            <input type="number" name="pprice" placeholder="Product Price" class="form-control shadow-none mt-3" required>
            <textarea name="pdetail" placeholder="Product Details" cols="30" rows="4" class="form-control shadow-none mt-3" required></textarea>
            <input type="file" name="pdtimg" class="form-control shadow-none mt-2" accept=".jpg,.png,.jpeg" required>
            <div class="text-center mt-3">
                <button class="btn btn-danger">Add Product</button>
            </div>
        </form>
    </div>
</body>

</html>
