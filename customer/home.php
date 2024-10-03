<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Product Grid</title>
</head>

<body>
    <div>
    
            <?php
            include "./authgaurd.php";
            include "../shared/connection.php";
            include "./menu.html";

            $sql_result = mysqli_query($conn, "select * from product");
            echo "<div class='container m-5'>";
            echo "<div class='row g-4'>";
            while ($dbrow = mysqli_fetch_assoc($sql_result)) {
                echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3'>"; // Responsive columns for grid
                echo "<div class='card h-100'>"; // Card layout with equal height
                echo "<img src='$dbrow[impath]' class='card-img-top' alt='Product Image'>"; // Product image
                echo "<div class='card-body'>
                        <h4 class='card-title'>$dbrow[name]</h4>
                        <h5 class='card-subtitle mb-2 text-muted'>$dbrow[price]Rs</h5>
                        <p class='card-text'>$dbrow[detail]</p>
                        <a href='addcart.php?pid=$dbrow[pid]'>
                            <button type='button' class='btn btn-outline-success'>Add to Cart</button>
                        </a>
                    </div>"; // End of card-body
                echo "</div>"; // End of card
                echo "</div>"; // End of col
            }
            ?>
        </div>
    </div>
</body>

</html>
