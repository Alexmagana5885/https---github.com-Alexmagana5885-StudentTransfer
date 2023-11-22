<?php
require_once('config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected feedback option
    $feedbackOption = mysqli_real_escape_string($conn, $_POST['feedbackOption']);

    if (isset($_GET['registration_number'])) {
        $registration_number = $_GET['registration_number'];

        // Check if there is already feedback for the student
        $checkQuery = "SELECT * FROM studenttransferregistration WHERE registration_number = ?";
        $checkStmt = mysqli_prepare($conn, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, 's', $registration_number);
        mysqli_stmt_execute($checkStmt);
        $checkResult = mysqli_stmt_get_result($checkStmt);

        if ($checkResult !== false) {
            if (mysqli_num_rows($checkResult) > 0) {
                // Feedback already exists, show an error message
                echo '<script>alert("Feedback already exists for this student.");</script>';
            } else {
                // Sanitize and store the user's response in the database
                $insertQuery = "INSERT INTO studenttransferregistration (registration_number, schoolResponse) VALUES (?, ?)";
                $insertStmt = mysqli_prepare($conn, $insertQuery);
                mysqli_stmt_bind_param($insertStmt, 'ss', $registration_number, $feedbackOption);
                $insertResult = mysqli_stmt_execute($insertStmt);

                if ($insertResult) {
                    // Feedback successfully inserted, now handle file upload
                    $fileInputName = $_FILES['admissionLetter']['name'];
                    $fileExtension = pathinfo($fileInputName, PATHINFO_EXTENSION);

                    // Rename the file to registration_number.extension
                    $newFileName = $registration_number . '.' . $fileExtension;
                    $uploadPath = 'uploads/adminResponses/SchoolResponses/' . $newFileName;

                    // Move the uploaded file to the uploads folder
                    if (move_uploaded_file($_FILES['admissionLetter']['tmp_name'], $uploadPath)) {
                        echo "Feedback and file uploaded successfully.";
                    } else {
                        echo "Error uploading file.";
                    }
                } else {
                    // Error inserting feedback into the database
                    echo "Error: " . mysqli_error($conn);
                }
            }
        } else {
            // Error with the query
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($checkStmt);

        // Check if the insert statement is set before closing
        if (isset($insertStmt)) {
            mysqli_stmt_close($insertStmt);
        }
    }
}
?>
