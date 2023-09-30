<?php


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost"; // Change to your database server name
    $username = "root"; // Change to your database username
    $password = ""; // Change to your database password
    $dbname = "tanferdatabase"; // Change to your database name

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input
    $registrationNumber = $_POST["registrationNumber"];
    $password = $_POST["password"];

    // Prepare a SQL query to retrieve user information
    $sql = "SELECT * FROM studentdetails WHERE registration_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $registrationNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user with the given registration number exists
    if ($result->num_rows == 1) {
        // Fetch user data from the database
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row["password"])) {
            // Password is correct; user is authenticated
            // Start a session and store user information if needed
            session_start();
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];

            // Redirect to a protected page or display a success message
            header("Location: dashboard.php"); // Change to the desired destination
        } else {
            // Password is incorrect; display an error message
            echo "Incorrect password. <a href='javascript:history.back()'>Go back</a>";
        }
    } else {
        // User does not exist; display an error message
        echo "User with the provided registration number does not exist. <a href='javascript:history.back()'>Go back</a>";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
