<?php
// Database connection
include("config.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$fullName = $_POST['fullName'];
$grade = $_POST['Grade'];
$phoneNumber = $_POST['studentPNumbe'];
$email = $_POST['studentEmail'];
$registrationNumber = $_POST['RegistrationNumber'];
$dateOfBirth = $_POST['DateOfBirth'];

$schoolName = $_POST['schoolName'];
$county = $_POST['county'];
$subcounty = $_POST['Subcounty'];
$schoolPhoneNumber = $_POST['schoolPNumber'];
$schoolEmail = $_POST['schoolEmail'];

$intendedSchoolName = $_POST['IntededSchoolName'];
$intendedSchoolCounty = $_POST['county']; // Note: You might want to change these lines
$intendedSchoolSubcounty = $_POST['Subcounty']; // if they are not supposed to be overwritten
$intendedSchoolPhoneNumber = $_POST['IntededSchoolContact'];
$intendedSchoolEmail = $_POST['IntededSchoolEmail'];

$transferReason = $_POST['ReasonForTranfer'];

$PName = $_POST['PName'];
$PhoneNumberP = $_POST['PhoneNumberP'];
$pemail = $_POST['pemail'];
$PID = $_POST['PID'];
$PReasonForTranfer = $_POST['PReasonForTranfer'];

$IDPP = $_POST['IDPP'];
$addressP = $_POST['addressP'];
$phoneNumberP = $_POST['phoneNumberP'];
$Date = $_POST['Date'];

// handle files
$passportPdf = $_FILES["pasportPdf"]["name"];
$clearanceFormPdf = $_FILES["clearanceFormPDF"]["name"];
$transferApprovalPdf = $_FILES["TranferAprovalPDF"]["name"];
$identificationPdf = $_FILES["identificationPDF"]["name"];

// Insert data into the database
$sql = "INSERT INTO student_transfer (full_name, grade, phone_number, email, registration_number, date_of_birth, 
        previous_school_name, county, subcounty, previous_school_phone_number, previous_school_email, 
        intended_school_name, intended_school_county, intended_school_subcounty, intended_school_phone_number, 
        intended_school_email, transfer_reason, pasportPdf, clearanceFormPDF, TranferAprovalPDF, identificationPDF, 
        PName, PhoneNumberP, pemail, PID, PReasonForTranfer, IDPP, addressP, phoneNumberP, Date) 
        VALUES ('$fullName', '$grade', '$phoneNumber', '$email', 
        '$registrationNumber', '$dateOfBirth', '$schoolName', '$county', '$subcounty', '$schoolPhoneNumber', 
        '$schoolEmail', '$intendedSchoolName', '$intendedSchoolCounty', '$intendedSchoolSubcounty', 
        '$intendedSchoolPhoneNumber', '$intendedSchoolEmail', '$transferReason', '$passportPdf', '$clearanceFormPdf', 
        '$transferApprovalPdf', '$identificationPdf', '$PName', '$PhoneNumberP', '$pemail', '$PID', '$PReasonForTranfer', '$IDPP', 
        '$addressP', '$phoneNumberP', '$Date')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Move uploaded files to desired directory
$uploadDirectory = "uploads/";

move_uploaded_file($_FILES["pasportPdf"]["tmp_name"], $uploadDirectory . $passportPdf);
move_uploaded_file($_FILES["clearanceFormPDF"]["tmp_name"], $uploadDirectory . $clearanceFormPdf);
move_uploaded_file($_FILES["TranferAprovalPDF"]["tmp_name"], $uploadDirectory . $transferApprovalPdf);
move_uploaded_file($_FILES["identificationPDF"]["tmp_name"], $uploadDirectory . $identificationPdf);

$conn->close();
?>
