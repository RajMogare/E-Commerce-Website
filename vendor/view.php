<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
</body>

</html>

<?php
include "./authgaurd.php";
include "../shared/connection.php";
include "./menu.html";

// Fetch products owned by the user
$sql_result = mysqli_query($conn, "select * from product where owner=$_SESSION[userid]");

// Create a responsive grid layout using Bootstrap's grid system
echo "<div class='container mt-5'>"; // Added margin for better spacing
echo "<div class='row g-4'>"; // Use Bootstrap row with gap (g-4 adds space between cards)

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3'>"; // Responsive grid for different devices
    echo "<div class='card h-100'>"; // 'h-100' ensures the card height takes up the available space
    echo "<img src='$dbrow[impath]' class='card-img-top' alt='Product Image'>";
    echo "<div class='card-body'>
            <h4 class='card-title'>$dbrow[name]</h4>
            <h5 class='card-subtitle mb-2 text-muted'>$dbrow[price]Rs</h5>
            <p class='card-text'>$dbrow[detail]</p>
            <a href='edit.php?pid=$dbrow[pid]'>
              <button type='button' class='btn btn-outline-success'>Edit</button>
            </a>
            <a href='delete.php?pid=$dbrow[pid]'>
              <button type='button' class='btn btn-outline-danger'>Delete</button>
            </a>
          </div>"; // End card-body
    echo "</div>"; // End card
    echo "</div>"; // End column
}

echo "</div>"; // Close row
echo "</div>"; // Close container
?>


