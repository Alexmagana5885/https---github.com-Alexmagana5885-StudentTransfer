<?php
$servername = "localhost"; // Replace with your server name
$username = "username"; // Replace with your database username
$password = "password"; // Replace with your database password
$database = "dbname"; // Replace with your database name
$tableName = "transfers_table"; // Specify your table name here

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform SQL query
$sql = "SELECT name, grade, previous_school, date_of_transfer, status FROM $tableName";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- your head content remains unchanged -->
</head>
<body>
    <!-- your HTML content remains unchanged -->

    <!-- ================ transfer details ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Recent Transfers Request</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Grade</td>
                        <td>Previous School</td>
                        <td>Date of Transfer</td>
                        <td>Status</td>
                    </tr>
                </thead>

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['grade'] . "</td>";
                        echo "<td>" . $row['previous_school'] . "</td>";
                        echo "<td>" . $row['date_of_transfer'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }

                // Close connection
                $conn->close();
                ?>
            </table>
        </div>
    </div>

    <!-- rest of your HTML content remains unchanged -->
</body>
</html>
