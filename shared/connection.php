<?php

$conn = new mysqli("localhost", "root", "", "acme_project_ecommerce", 3306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
