<?php
session_start();

include("config.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $level_of_school = $_POST["level_of_school"];
    $school_name = $_POST["school_name"];
    $Gcounty = $_POST["Gcounty"];
    $Gsubcounty = $_POST["Gsubcounty"];
    $password = $_POST["password"];
    $registration_number = $_POST["registration_number"];
    $gender_accepted = $_POST["gender_accepted"];
    $mode_of_schooling = $_POST["mode_of_schooling"];
    $email_address = $_POST["email_address"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $postal_code = $_POST["postal_code"];
    $school_fees = $_POST["school_fees"];
    $diet_type = $_POST["diet_type"];
    $medical_facility = $_POST["medical_facility"];

    // SQL query to insert data into the 'schoolreg' table using prepared statement
    $sql = "INSERT INTO schoolreg (level_of_school, school_name, Gcounty, Gsubcounty, registration_number, password, gender_accepted, mode_of_schooling, email_address, phone_number, address, postal_code, school_fees, diet_type, medical_facility)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssss", $level_of_school, $school_name, $Gcounty, $Gsubcounty, $registration_number, $password, $gender_accepted, $mode_of_schooling, $email_address, $phone_number, $address, $postal_code, $school_fees, $diet_type, $medical_facility);

    if ($stmt->execute()) {
        header("Location: login.html"); 
        exit; 
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>




