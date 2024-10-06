<?php
include "./authgaurd.php";
include "./menu.html"
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
    <title>Vendor Page</title>

    <style>
        /* Custom styling for the form */
        .form-container {
            background-color: #ffc107; /* Bootstrap warning color */
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Styling form elements */
        .form-control {
            border-radius: 8px;
        }

        .form-container h4 {
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        /* Add some transition for buttons */
        .btn-danger {
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Responsive design adjustments */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="upload.php" method="post" class="form-container w-50" enctype="multipart/form-data">
            <h4 class="text-center">Add Product</h4>

            <input type="text" name="pname" placeholder="Product Name" class="form-control mt-3 shadow-sm" required>

            <input type="number" name="pprice" placeholder="Product Price" class="form-control mt-3 shadow-sm" required>

            <textarea name="pdetail" placeholder="Product Details" cols="30" rows="4" class="form-control mt-3 shadow-sm" required></textarea>

            <input type="file" name="pdtimg" class="form-control mt-2 shadow-sm" accept=".jpg,.png,.jpeg" required>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-danger w-100 shadow-sm">Add Product</button>
            </div>
        </form>
    </div>
</body>

</html>
