<?php
//  database conection  
include("config.php");


session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data
$level_of_school = $_POST['level_of_school'];
$name = $_POST['Sname'];
$registration_number = $_POST['registration_number'];
$currentSchool = $_POST['Schoolname'];
$county = $_POST['Gcounty'];
$subCounty = $_POST['Gsubcounty'];
$gender = $_POST['sGender'];
$studentContact = $_POST['studentContact'];
$email = $_POST['Semail'];
$password = password_hash($_POST['GCreatePassword'], PASSWORD_DEFAULT);

// Insert data into the students table
$sql = "INSERT INTO studentregistration (level_of_school, name, registration_number, currentSchool, county, subCounty, gender, studentContact, email, password)
VALUES ('$level_of_school', '$name', '$registration_number', '$currentSchool', '$county', '$subCounty', '$gender', '$studentContact', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: login.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
