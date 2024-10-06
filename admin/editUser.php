<?php
// Include database connection and authentication check
include "authgaurd.php";
include "../shared/connection.php";

// Check if 'userid' is set in the URL
if (isset($_GET['useid'])) {
    $userid = $_GET['useid'];

    // Fetch the user data based on 'userid'
    $query = "SELECT * FROM user WHERE userid = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // If user data is found, show the form
    if ($user) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Edit User</title>
    </head>

    <body>
        <div class="container mt-5">
            <h2>Edit User</h2>
            <form action="editUser.php" method="POST">
                <input type="hidden" name="userid" value="<?php echo $user['userid']; ?>">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="usertype" class="form-label">User Type</label>
                    <select name="usertype" id="usertype" class="form-select">
                        <option value="Customer" <?php if ($user['usertype'] == 'Customer') echo 'selected'; ?>>Customer</option>
                        <option value="Vendor" <?php if ($user['usertype'] == 'Vendor') echo 'selected'; ?>>Vendor</option>
                        <option value="Admin" <?php if ($user['usertype'] == 'Admin') echo 'selected'; ?>>Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="home.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </body>

    </html>
<?php
    } else {
        echo "User not found!";
    }
}

// Close connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
