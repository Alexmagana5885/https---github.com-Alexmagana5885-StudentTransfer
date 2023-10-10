<?php
// Include the database configuration file
include("config.php");


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $level_of_school = $_POST["level_of_school"];
    $name = $_POST["name"];
    $registration_number = $_POST["registration_number"];
    $password = $_POST["password"];

    // Hash the password for security 
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // SQL query to insert data into the 'students' table using prepared statement
    $sql = "INSERT INTO studentdetails (level_of_school, name, registration_number, password)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $level_of_school, $name, $registration_number, $hashed_password);

    if ($stmt->execute()) {
        // Registration successful
        // Redirect to login page
        header("Location: login.html");
        exit;
    } else {
        // Registration failed
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
