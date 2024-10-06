<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <title>User List</title>
</head>

<body>
    <!-- Include menu.html at the top -->
    <?php include "./menu.html"; ?>

    <div class="container mt-5">
        <h2 class="mb-4">User List</h2>

        <table class="table table-bordered rounded-5">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">Sr. No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Usertype</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody >
                <?php
                // include "authgaurd.php";
                include "../shared/connection.php"; // Include your database connection

                // Fetch user data from the database
                $sql_result = mysqli_query($conn, "SELECT * FROM user");
                $sr_no = 1; // Initialize serial number

                // Loop through the fetched data
                while ($dbrow = mysqli_fetch_assoc($sql_result)) {
                    echo "<tr class='text-center'>";
                    echo "<td>" . $sr_no . "</td>"; // Serial number
                    echo "<td>" . htmlspecialchars($dbrow['username']) . "</td>"; // Name
                    echo "<td>" . htmlspecialchars($dbrow['usertype']) . "</td>"; // Usertype

                    // Action buttons for Edit and Delete
                    echo "<td>
                            <a href='editUser.php?useid=" . $dbrow['userid'] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='deleteUser.php?userid=" . $dbrow['userid'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
                          </td>";
                    echo "</tr>";

                    $sr_no++; // Increment serial number
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
