<?php

session_start();

// $conn = new mysqli("localhost", "root", "", "acme_project_ecommerce", 3306);

include "../shared/connection.php";

$source = $_FILES['pdtimg']['tmp_name'];
$target = "../shared/images/" . $_FILES['pdtimg']['name'];

move_uploaded_file($source, $target);
mysqli_query($conn, "insert into product(name,price,detail,impath,owner) values(
'$_POST[pname]',
$_POST[pprice],
'$_POST[pdetail]',
'$target',
$_SESSION[userid]

)");

header("location:view.php");    
?>