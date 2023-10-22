<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle personal details
    $fullName = $_POST["fullName"];
    $Grade = $_POST["Grade"];
    $studentPhoneNumber = $_POST["studentPNumber"];
    $studentEmail = $_POST["studentEmail"];
    $RegistrationNumber = $_POST["RegistrationNumber"];
    $DateOfBirth = $_POST["DateOfBirth"];

    // Handle previous school details
    $schoolName = $_POST["schoolName"];
    $selectedCounty = $_POST["selectCounty"];
    $schoolPhoneNumber = $_POST["schoolPNumber"];
    $schoolEmail = $_POST["schoolEmail"];

    // Handle intended school details
    $intendedSchoolName = $_POST["IntededSchoolName"];
    $intendedSchoolLocation = $_POST["IntededSchoolLocation"];
    $intendedSchoolContact = $_POST["IntededSchoolContact"];
    $intendedSchoolEmail = $_POST["IntededSchoolEmail"];

    // Handle transfer reasons
    $reasonForTransfer = $_POST["ReasonForTransfer"];

    // Handle parent details
    $parentName = $_POST["PName"];
    $parentPhoneNumberP = $_POST["PhoneNumberP"];
    $parentIDP = $_POST["IDP"];
    $parentPID = $_POST["PID"];
    $parentReasonForLeaving = $_POST["ReasonForTransferP"];
    
    // Handle file uploads
    $targetDirectory = "uploads/";

    $passportPhoto = $targetDirectory . basename($_FILES["passportPdf"]["name"]);
    $clearanceForm = $targetDirectory . basename($_FILES["clearanceFormPDF"]["name"]);
    $transferApproval = $targetDirectory . basename($_FILES["TransferApprovalPDF"]["name"]);
    $identificationDoc = $targetDirectory . basename($_FILES["identificationPDF"]["name"]);

    // Move uploaded files to the target directory
    move_uploaded_file($_FILES["passportPdf"]["tmp_name"], $passportPhoto);
    move_uploaded_file($_FILES["clearanceFormPDF"]["tmp_name"], $clearanceForm);
    move_uploaded_file($_FILES["TransferApprovalPDF"]["tmp_name"], $transferApproval);
    move_uploaded_file($_FILES["identificationPDF"]["tmp_name"], $identificationDoc);

    // Handle parent declaration details
    $parentID = $_POST["namePP"];
    $parentAddress = $_POST["addressP"];
    $parentPhoneNumber = $_POST["phoneNumberP"];
    $Date = $_POST["Date"];
     

    // Assuming you have a database connection established earlier
    // $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO student_transfer (full_name, Grade, student_phone, student_email, RegistrationNumber, DateOfBirth, school_name, county, school_phone, school_email, intended_school_name, intended_school_location, intended_school_contact, intended_school_email, transfer_reason, parent_name, parent_phone_number, parent_id, parent_pid, parent_reason_for_leaving, passport_photo, clearance_form, transfer_approval, identification_doc, namePP, addressP, phoneNumberP, Date)
    VALUES ('$fullName', '$Grade', '$studentPhoneNumber', '$studentEmail', '$RegistrationNumber', '$DateOfBirth', '$schoolName', '$selectedCounty', '$schoolPhoneNumber', '$schoolEmail', '$intendedSchoolName', '$intendedSchoolLocation', '$intendedSchoolContact', '$intendedSchoolEmail', '$reasonForTransfer', '$parentName', '$parentPhoneNumberP', '$parentIDP', '$parentPID', '$parentReasonForLeaving', '$passportPhoto', '$clearanceForm', '$transferApproval', '$identificationDoc', '$parentID', '$parentAddress', '$parentPhoneNumber', '$Date')";

    if ($conn->query($sql) === TRUE) {
        // Redirect after successful insertion
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
