
<!-- Warning: Undefined array key "registration_number" in C:\xampp\htdocs\https---github.com-Alexmagana5885-StudentTransfer\EditStudentPersonalInformation.php on line 6

Warning: Undefined array key "registration_number" in C:\xampp\htdocs\https---github.com-Alexmagana5885-StudentTransfer\EditStudentPersonalInformation.php on line 11
Data updated successfully! -->


<?php
//  database connection established
include("config.php"); 
session_start();
$loginCategory = $_SESSION['loginCategory'];
$registration_number  = $_SESSION['registration_number'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $student_id = $_SESSION["registration_number"]; 
    
    $Sname = $_POST["Sname"];
    $ProfilePicture = $_FILES["ProfilePicture"]["name"]; // Use $_FILES for file upload
    $sGender = $_POST["sGender"];
    $studentContact = $_POST["studentContact"];
    $Semail = $_POST["Semail"];
    $GCreatePassword = $_POST["GCreatePassword"];
    $GConfirmPassword = $_POST["GConfirmPassword"];


    


    // Insert or update data into the database
   
    $sql = "UPDATE studentregistration SET 
            name = '$Sname',
            ProfilePicture = '$ProfilePicture',
            gender = '$sGender',
            studentContact = '$studentContact',
            email = '$Semail',
            password = '$GCreatePassword'
            WHERE registration_number  = '$registration_number'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check for success or display an error message
    if ($result) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }

    // Close the database connection if needed
    mysqli_close($conn);
}
?>
