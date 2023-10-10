<?php
require_once('tcpdf/tcpdf.php');

// Get form data from POST request
$firstName = $_POST['firstName'];
$secondName = $_POST['secondName'];
$phoneNumber = $_POST['studentPNumbe'];
$email = $_POST['studentEmail'];

$schoolName = $_POST['schoolName'];
$schoolLocation = $_POST['schoolLocation'];
$schoolPhoneNumber = $_POST['schoolPNumber'];
$schoolEmail = $_POST['schoolEmail'];

$reasonForTransfer = $_POST['ReasonForTranfer'];

// Create new PDF instance
$pdf = new TCPDF();
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

// Add content to PDF
$content = "
    <h1>Student Transfer Form</h1>
    <h2>Personal Details:</h2>
    <p><strong>First Name:</strong> $firstName</p>
    <p><strong>Second Name:</strong> $secondName</p>
    <p><strong>Phone Number:</strong> $phoneNumber</p>
    <p><strong>Email:</strong> $email</p>

    <h2>Previous School Details:</h2>
    <p><strong>School Name:</strong> $schoolName</p>
    <p><strong>Location:</strong> $schoolLocation</p>
    <p><strong>Phone Number:</strong> $schoolPhoneNumber</p>
    <p><strong>Email:</strong> $schoolEmail</p>

    <h2>Reason for Transfer:</h2>
    <p>$reasonForTransfer</p>
";

$pdf->writeHTML($content, true, false, true, false, '');

// Output the PDF to the browser
$pdf->Output('student_transfer_form.pdf', 'D');
?>
