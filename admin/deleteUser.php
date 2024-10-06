<?php
// Include database connection and authentication check
include "authgaurd.php"; 
include "../shared/connection.php"; 

// Check if 'userid' is set in the URL
if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];

    // Prepare and execute the DELETE query
    $query = "DELETE FROM user WHERE userid = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $userid);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect back to the home page after successful deletion
        header("Location: home.php?msg=User+deleted+successfully");
        exit();
    } else {
        // Handle the error
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    // Redirect if 'userid' is not set
    header("Location: home.php");
    exit();
}

// Close the connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
