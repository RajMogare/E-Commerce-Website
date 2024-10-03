<?php

$conn = new mysqli("localhost", "root", "", "acme_project_ecommerce", 3306);

$password=$_POST['password'];
$hashedPassword=password_hash($password,PASSWORD_DEFAULT);

// echo "Password : ".$password. " hashedPassword: ". $hashedPassword;

mysqli_query($conn, "insert into user(username,password,usertype) values('$_POST[username]','$hashedPassword','$_POST[usertype]')")
   
   
   ?>