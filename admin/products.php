<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background for contrast */
        }

        .card {
            transition: transform 0.2s; /* Smooth scaling effect on hover */
        }

        .card:hover {
            transform: scale(1.05); /* Scale up slightly on hover */
        }

        .card-img-top {
            height: 200px; /* Fixed height for images */
            object-fit: cover; /* Cover image without stretching */
        }

        h4.card-title {
            font-size: 1.25rem; /* Font size for card title */
        }

        h5.card-subtitle {
            color: #6c757d; /* Muted color for price */
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            h4.card-title {
                font-size: 1.1rem; /* Smaller title font on mobile */
            }
        }
    </style>
    <title>Product Display</title>
</head>

<body>
    <?php
    include "./authgaurd.php";
    include "../shared/connection.php";
    include "./menu.html";

    // Fetch products owned by the user
    $sql_result = mysqli_query($conn, "SELECT * FROM product");

    // Create a responsive grid layout using Bootstrap's grid system
    echo "<div class='container mt-5'>"; // Added margin for better spacing
    echo "<h2 class='text-center mb-4'>My Products</h2>"; // Title for the page
    echo "<div class='row g-4'>"; // Use Bootstrap row with gap (g-4 adds space between cards)

    while ($dbrow = mysqli_fetch_assoc($sql_result)) {
        echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3'>"; // Responsive grid for different devices
        echo "<div class='card h-100'>"; // 'h-100' ensures the card height takes up the available space
        echo "<img src='$dbrow[impath]' class='card-img-top' alt='Product Image'>";
        echo "<div class='card-body'>
                <h4 class='card-title'>$dbrow[name]</h4>
                <h5 class='card-subtitle mb-2'>$dbrow[price] Rs</h5>
                <p class='card-text'>$dbrow[detail]</p>
                <a href='editProduct.php?pid=$dbrow[pid]' class='btn btn-outline-success'>Edit</a>
                <a href='deleteProduct.php?pid=$dbrow[pid]' class='btn btn-outline-danger'>Delete</a>
              </div>"; // End card-body
        echo "</div>"; // End card
        echo "</div>"; // End column
    }

    echo "</div>"; // Close row
    echo "</div>"; // Close container
    ?>
</body>

</html>
