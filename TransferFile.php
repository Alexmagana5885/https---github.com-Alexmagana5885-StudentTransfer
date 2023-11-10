<?php
// Connect to your database (use your database credentials)
include("config.php");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get registration number from the AJAX request
$registration_number = $_GET['registration_number'];

// Query to fetch student details based on the registration number
$sql = "SELECT * FROM studenttransferregistration WHERE registration_number = '$registration_number'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch student details as an associative array
    $studentDetails = $result->fetch_assoc();

    // Output student details as JSON (or any other format you prefer)
    echo json_encode($studentDetails);
} else {
    // No student found with the provided registration number
    echo json_encode(array('error' => 'Student not found'));
}

// Close the database connection
$conn->close();
?>
