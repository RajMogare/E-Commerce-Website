<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Product Grid</title>

    <style>
        /* General styling for the page */
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        /* Styling for cards */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Image inside card */
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        /* Button styling */
        .btn-outline-success {
            transition: background-color 0.3s ease, color 0.3s ease;
            width: 100%;
        }

        .btn-outline-success:hover {
            background-color: #28a745;
            color: white;
        }

        .card-title {
            font-weight: bold;
            color: #333;
        }

        .card-subtitle {
            color: #6c757d;
        }

        .card-text {
            font-size: 14px;
            color: #555;
        }

        .row.g-4 {
            row-gap: 30px;
        }
    </style>
</head>

<body>
    <div>
        <?php
        include "./authgaurd.php";
        include "../shared/connection.php";
        include "./menu.html";

        // Fetch products from the database
        $sql_result = mysqli_query($conn, "select * from product");

        // Start container for product grid
        echo "<div class='container'>";
        echo "<div class='row g-4'>";

        // Loop through each product
        while ($dbrow = mysqli_fetch_assoc($sql_result)) {
            echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3'>"; // Responsive columns
            echo "<div class='card h-100'>"; // Card with consistent height
            echo "<img src='$dbrow[impath]' class='card-img-top' alt='Product Image'>"; // Product image

            // Card body with product details
            echo "<div class='card-body'>
                    <h4 class='card-title'>$dbrow[name]</h4>
                    <h5 class='card-subtitle mb-2'>$dbrow[price] Rs</h5>
                    <p class='card-text'>$dbrow[detail]</p>
                    <a href='addcart.php?pid=$dbrow[pid]'>
                        <button type='button' class='btn btn-outline-success'>Add to Cart</button>
                    </a>
                  </div>"; // End card-body

            echo "</div>"; // End card
            echo "</div>"; // End column
        }

        echo "</div>"; // End row
        echo "</div>"; // End container
        ?>
    </div>
</body>

</html>
