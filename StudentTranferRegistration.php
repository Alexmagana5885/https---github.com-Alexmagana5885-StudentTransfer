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


// Function to generate a unique file name based on registration number
function generateFileName($registrationNumber, $originalFileName) {
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    return $registrationNumber . '_' . time() . '.' . $fileExtension;
}


$ApplicationLetterPdf = generateFileName($registrationNumber, $_FILES["ApplicationLetterPdf"]["name"]);
$clearanceFormPdf = generateFileName($registrationNumber, $_FILES["clearanceFormPDF"]["name"]);
$transferApprovalPdf = generateFileName($registrationNumber, $_FILES["TranferAprovalPDF"]["name"]);
$identificationPdf = generateFileName($registrationNumber, $_FILES["identificationPDF"]["name"]);




// Insert data into the database
$sql = "INSERT INTO studenttransferregistration (full_name, grade, phone_number, email, registration_number, date_of_birth, 
        previous_school_name, county, subcounty, previous_school_phone_number, previous_school_email, 
        intended_school_name, intended_school_county, intended_school_subcounty, intended_school_phone_number, 
        intended_school_email, transfer_reason, ApplicationLetterPdf, clearanceFormPDF, TranferAprovalPDF, identificationPDF, 
        parent_name, parent_phone_number, parent_email, parent_id_number, parent_reason_for_transfer, parent_idpp, parent_address, parent_phone_number_p, transfer_date) 
        VALUES ('$fullName', '$grade', '$phoneNumber', '$email', 
        '$registrationNumber', '$dateOfBirth', '$schoolName', '$county', '$subcounty', '$schoolPhoneNumber', 
        '$schoolEmail', '$intendedSchoolName', '$intendedSchoolCounty', '$intendedSchoolSubcounty', 
        '$intendedSchoolPhoneNumber', '$intendedSchoolEmail', '$transferReason', '$ApplicationLetterPdf', '$clearanceFormPdf', 
        '$transferApprovalPdf', '$identificationPdf', '$PName', '$PhoneNumberP', '$pemail', '$PID', '$PReasonForTranfer', '$IDPP', 
        '$addressP', '$phoneNumberP', '$Date')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: StudentPage.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Move uploaded files to uploaded directory
$uploadDirectory1 = "uploads/studentDocuments/ApplicationLetters/";
$uploadDirectory2 = "uploads/studentDocuments/clearanceForms/";
$uploadDirectory3 = "uploads/studentDocuments/TranferAprovals/";
$uploadDirectory4 = "uploads/studentDocuments/identifications/";

move_uploaded_file($_FILES["ApplicationLetterPdf"]["tmp_name"], $uploadDirectory1 . $ApplicationLetterPdf);
move_uploaded_file($_FILES["clearanceFormPDF"]["tmp_name"], $uploadDirectory2 . $clearanceFormPdf);
move_uploaded_file($_FILES["TranferAprovalPDF"]["tmp_name"], $uploadDirectory3 . $transferApprovalPdf);
move_uploaded_file($_FILES["identificationPDF"]["tmp_name"], $uploadDirectory4 . $identificationPdf);

$conn->close();
?>


