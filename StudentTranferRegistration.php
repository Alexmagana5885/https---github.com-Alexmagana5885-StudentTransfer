<?php

session_start();

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle personal details
    $fullName = $_POST["fullName"];
    $YearofStudy = $_POST["YearofStudy"];
    $studentPNumber = $_POST["studentPNumbe"];
    $studentEmail = $_POST["studentEmail"];
    $parrentPNumbe = $_POST["parrentPNumbe"];
    $parrentPemail = $_POST["parrentPemail"];

    // Handle previous school details
    $schoolName = $_POST["schoolName"];
    $schoolLocation = $_POST["schoolLocation"];
    $schoolPNumber = $_POST["schoolPNumber"];
    $schoolEmail = $_POST["schoolEmail"];

    // Handle intended school details
    $intendedSchoolName = $_POST["IntededSchoolName"];
    $intendedSchoolLocation = $_POST["IntededSchoolLocation"];
    $intendedSchoolContact = $_POST["IntededSchoolContact"];
    $intendedSchoolEmail = $_POST["IntededSchoolEmail"];

    // Handle transfer reason
    $reasonForTransfer = $_POST["ReasonForTranfer"];

    // Handle file uploads
    $passportPdf = $_FILES["pasportPdf"]["name"];
    $clearanceFormPdf = $_FILES["clearanceFormPDF"]["name"];
    $transferApprovalPdf = $_FILES["TranferAprovalPDF"]["name"];
    $identificationPdf = $_FILES["identificatiobPDF"]["name"];

    // Database connection (assuming you have a database named "students")
    $conn = new mysqli("localhost", "username", "password", "students");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO student_transfer (full_Name, Year_of_Study, student_phone, student_email, parent_phone, parent_email, 
            prev_school_name, prev_school_location, prev_school_phone, prev_school_email, intended_school_name, 
            intended_school_location, intended_school_phone, intended_school_email, transfer_reason, passport_pdf, 
            clearance_form_pdf, transfer_approval_pdf, identification_pdf) VALUES ('$fullName', '$YearofStudy', '$studentPNumber', 
            '$studentEmail', '$parrentPNumbe', '$parrentPemail', '$schoolName', '$schoolLocation', '$schoolPNumber', '$schoolEmail', 
            '$intendedSchoolName', '$intendedSchoolLocation', '$intendedSchoolContact', '$intendedSchoolEmail', '$reasonForTransfer', 
            '$passportPdf', '$clearanceFormPdf', '$transferApprovalPdf', '$identificationPdf')";

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
    move_uploaded_file($_FILES["identificatiobPDF"]["tmp_name"], $uploadDirectory . $identificationPdf);

    $conn->close();
}









// require_once('tcpdf/tcpdf.php');

// // Get form data from POST request
// $firstName = $_POST['firstName'];
// $secondName = $_POST['secondName'];
// $phoneNumber = $_POST['studentPNumbe'];
// $email = $_POST['studentEmail'];

// $schoolName = $_POST['schoolName'];
// $schoolLocation = $_POST['schoolLocation'];
// $schoolPhoneNumber = $_POST['schoolPNumber'];
// $schoolEmail = $_POST['schoolEmail'];

// $reasonForTransfer = $_POST['ReasonForTranfer'];

// // Create new PDF instance
// $pdf = new TCPDF();
// $pdf->SetMargins(10, 10, 10);
// $pdf->AddPage();

// Add content to PDF
// $content = "
//     <h1>Student Transfer Form</h1>
//     <h2>Personal Details:</h2>
//     <p><strong>First Name:</strong> $firstName</p>
//     <p><strong>Second Name:</strong> $secondName</p>
//     <p><strong>Phone Number:</strong> $phoneNumber</p>
//     <p><strong>Email:</strong> $email</p>

//     <h2>Previous School Details:</h2>
//     <p><strong>School Name:</strong> $schoolName</p>
//     <p><strong>Location:</strong> $schoolLocation</p>
//     <p><strong>Phone Number:</strong> $schoolPhoneNumber</p>
//     <p><strong>Email:</strong> $schoolEmail</p>

//     <h2>Reason for Transfer:</h2>
//     <p>$reasonForTransfer</p>
// ";

// $pdf->writeHTML($content, true, false, true, false, '');

// // Output the PDF to the browser
// $pdf->Output('student_transfer_form.pdf', 'D');
?>
