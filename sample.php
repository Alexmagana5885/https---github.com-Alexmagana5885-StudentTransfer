<?php
include("config.php");
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['registration_number'])) {
    $registration_number = $_SESSION['registration_number'];

    // Fetch existing data from the database based on student ID
    $sql = $conn->prepare("SELECT * FROM studentregistration WHERE registration_number = ?");
    $sql->bind_param("s", $registration_number);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Student not found.";
        exit();
    }
} else {
    echo "Student ID not set.";
    exit();
}

$conn->close();
?>
