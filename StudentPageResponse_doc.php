<?php
require_once('config.php');

if (isset($_GET['registration_number'])) {
    $registration_number = $_GET['registration_number'];

    // Retrieve file path from the database
    $selectQuery = "SELECT education_office_response_doc FROM studenttransferregistration WHERE registration_number = ?";
    $stmt = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmt, "s", $registration_number);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $filePath);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Check if the file path exists
        if ($filePath && file_exists($filePath)) {
            // Set appropriate headers for download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filePath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));

            // Read the file and output it to the browser
            readfile($filePath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Error fetching file path. " . mysqli_stmt_error($stmt);
    }
} else {
    echo "Invalid request.";
}
?>


<?php
require_once('config.php');

if (isset($_GET['registration_number'])) {
    $registration_number = $_GET['registration_number'];

    // Retrieve file path from the database
    $selectQuery = "SELECT schoolResponse_doc FROM studenttransferregistration WHERE registration_number = ?";
    $stmt = mysqli_prepare($conn, $selectQuery);
    mysqli_stmt_bind_param($stmt, "s", $registration_number);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $filePath);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Check if the file path exists
        if ($filePath && file_exists($filePath)) {
            // Set appropriate headers for download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filePath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));

            // Read the file and output it to the browser
            readfile($filePath);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Error fetching file path. " . mysqli_stmt_error($stmt);
    }
} else {
    echo "Invalid request.";
}
?>
