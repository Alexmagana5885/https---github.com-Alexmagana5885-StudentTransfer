<?php
require_once('config.php');

if (isset($_POST['submitFeedback'])) {
    // Retrieve form data
    $registration_number = $_POST['registration_number'];
    $feedbackOption = $_POST['feedbackOption'];

    // Update the database with feedback
    $updateQuery = "UPDATE studenttransferregistration SET schoolResponse = ? WHERE registration_number = ?";
    
    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "ss", $feedbackOption, $registration_number);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Handle file upload
    $uploadDir = "uploads/adminResponses/SchoolResponses/";
    $uploadFile = $uploadDir . $registration_number . '.pdf';

    if (move_uploaded_file($_FILES['admissionLetter']['tmp_name'], $uploadFile)) {
        // Update the database with the new file name
        $updateFileQuery = "UPDATE studenttransferregistration SET schoolResponse_doc = ? WHERE registration_number = ?";

        // Use prepared statements to prevent SQL injection
        $stmtFile = mysqli_prepare($conn, $updateFileQuery);
        mysqli_stmt_bind_param($stmtFile, "ss", $uploadFile, $registration_number);
        mysqli_stmt_execute($stmtFile);
        mysqli_stmt_close($stmtFile);

        echo "File is valid, and was successfully uploaded.";
    } else {
        echo "File upload failed.";
    }
}

// Redirect to the original page
header("Location: TransferFilee.php");
exit();
?>
