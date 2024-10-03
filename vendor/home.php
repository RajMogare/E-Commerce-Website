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
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="upload.php" method="post" class="w-50 bg-warning p-4" enctype="multipart/form-data">

            <h4 class="text-center">Add Product</h4>
            <input type="text" name="pname" placeholder="Product Name" class="form-control mt-3">
            <input type="number" name="pprice" placeholder="Product Price" class="form  -control mt-3">
            <textarea name="pdetail" id="" placeholder="Product Details" cols="30" rows="4" class="form-control mt-3"></textarea>

            <input type="file" name="pdtimg" class="form-control mt-2" accept=".jpg,.png,.jpeg">

            <div class="text-center mt-3">
                <button class="btn btn-danger">Add Product</button>
            </div>


        </form>
    </div>
</body>

</html>