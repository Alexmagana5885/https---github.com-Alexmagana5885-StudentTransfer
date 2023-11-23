<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once('config.php');

if (isset($_POST['submitFeedback'])) {
    // Retrieve form data
    $registration_number = $_POST['registration_number'];
    $feedbackOption = $_POST['feedbackOption'];

    // Update the database with feedback
    $updateQuery = "UPDATE studenttransferregistration SET education_office_response = ? WHERE registration_number = ?";
    
    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "ss", $feedbackOption, $registration_number);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);

        // Handle file upload
        $uploadDir = "uploads/adminResponses/GovOffResponses/";
        $uploadFile = $uploadDir . $registration_number . '.pdf';

        if (move_uploaded_file($_FILES['admissionLetter']['tmp_name'], $uploadFile)) {
            // Update the database with the new file name
            $updateFileQuery = "UPDATE studenttransferregistration SET education_office_response_doc = ? WHERE registration_number = ?";

            // Use prepared statements to prevent SQL injection
            $stmtFile = mysqli_prepare($conn, $updateFileQuery);
            mysqli_stmt_bind_param($stmtFile, "ss", $uploadFile, $registration_number);

            if (mysqli_stmt_execute($stmtFile)) {
                mysqli_stmt_close($stmtFile);
                echo "Feedback and file upload were successful.";
            } else {
                echo "File upload failed. " . mysqli_stmt_error($stmtFile);
            }
        } else {
            echo "File upload failed. Please check the file size and type.";
        }
    } else {
        echo "Feedback update failed. " . mysqli_stmt_error($stmt);
    }
}

// Redirect to the original page
header("Location: TransferFileEDUOF.php");
exit();
?>
