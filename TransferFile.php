<?php
require_once('config.php');

// Check if registration_number is set in the URL
if (isset($_GET['registration_number'])) {
    $registration_number = $_GET['registration_number'];

    // Use the registration_number to fetch data from the database
    $query = "SELECT * FROM studenttransferregistration WHERE registration_number = '$registration_number'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    //  form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if a response is already stored
        if (!empty($row['Response'])) {
            // Display a toast message indicating that a response already exists
            echo '<script>alert("Response already submitted for this Student.");</script>';
        } else {
            // Sanitize and store the user's response in the database
            $Response = mysqli_real_escape_string($conn, $_POST['Reason']);
            $updateQuery = "UPDATE studenttransferregistration SET IntededSchoolResponse = '$Response' WHERE registration_number = '$registration_number'";
            mysqli_query($conn, $updateQuery);

            // Display a toast message indicating that the response has been stored
            echo '<script>alert("Response submitted successfully.");</script>';
            header("Location: adminsch.php");
        }
    }
} else {
    // Handle the case where registration_number is not set in the URL and display an error message
  
    header("Location: error_page.php");
    exit();
}
?>


