<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Product Grid</title>

    <style>
        /* Ensure all images have a fixed height and are centered */
        .card-img-top {
            object-fit: cover;
            width: 100%;
            height: 200px; /* Fixed height for images */
            border-bottom: 2px solid #f8f9fa;
        }

        .card {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            border-radius: 12px;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-weight: bold;
        }

        .btn {
            margin-top: 10px;
            transition: background-color 0.2s ease;
        }

        .btn-outline-success:hover {
            background-color: #28a745;
            color: white;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        /* Extra styling for the card grid */
        .container {
            margin-top: 40px;
            padding-bottom: 50px;
        }
    </style>
</head>

<body>
</body>

</html>

<?php
include "./authgaurd.php";
include "../shared/connection.php";
include "./menu.html";

// Fetch products owned by the user
$sql_result = mysqli_query($conn, "select * from product");

// Create a responsive grid layout using Bootstrap's grid system
echo "<div class='container'>";
echo "<div class='row g-4'>"; // Row with gap for card spacing

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3'>"; // Responsive column for different devices
    echo "<div class='card h-100'>"; // 'h-100' ensures consistent card height
    echo "<img src='$dbrow[impath]' class='card-img-top' alt='Product Image'>"; // Image with fixed size
    echo "<div class='card-body'>
            <h4 class='card-title'>$dbrow[name]</h4>
            <h5 class='card-subtitle mb-2 text-muted'>$dbrow[price] Rs</h5>
            <p class='card-text'>$dbrow[detail]</p>
            <a href='editProduct.php?pid=$dbrow[pid]'>
              <button type='button' class='btn btn-outline-success w-100'>Edit</button>
            </a>
            <a href='deleteProduct.php?pid=$dbrow[pid]'>
              <button type='button' class='btn btn-outline-danger w-100'>Delete</button>
            </a>
          </div>"; // End card-body
    echo "</div>"; // End card
    echo "</div>"; // End column
}

echo "</div>"; // Close row
echo "</div>"; // Close container
?>
