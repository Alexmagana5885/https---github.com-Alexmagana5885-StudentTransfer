<?php
session_start();

include("config.php"); // Assuming this file contains your database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $officeName = $_POST["GOoffice"];
    $registrationNumber = $_POST["RegistrationNumber"];
    $county = $_POST["Gcounty"];
    $subCounty = $_POST["Gsubcounty"];
    $officeContact = $_POST["registration_code"];
    $email = $_POST["Gemail"];
    $password = $_POST["GCreatePassword"];
    
    // SQL query to insert data into the database
    $sql = "INSERT INTO GofficeRegistration (office_name, registration_number, county, sub_county, office_contact, email, password) VALUES ('$officeName', '$registrationNumber', '$county', '$subCounty', '$officeContact', '$email', '$password')";
    
    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page
        header("Location: login.html"); 
        exit;
    } else {
        // Handle errors
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close connection
    $conn->close();
}
?>
