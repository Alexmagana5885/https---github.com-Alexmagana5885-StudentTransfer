<?php
// Database connection
include("config.php");

session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate form data
$level_of_school = mysqli_real_escape_string($conn, $_POST['level_of_school']);
$name = mysqli_real_escape_string($conn, $_POST['Sname']);
$registration_number = mysqli_real_escape_string($conn, $_POST['registration_number']);
$currentSchool = mysqli_real_escape_string($conn, $_POST['Schoolname']);
$county = mysqli_real_escape_string($conn, $_POST['Gcounty']);
$subCounty = mysqli_real_escape_string($conn, $_POST['Gsubcounty']);
$gender = mysqli_real_escape_string($conn, $_POST['sGender']);
$studentContact = mysqli_real_escape_string($conn, $_POST['studentContact']);
$email = mysqli_real_escape_string($conn, $_POST['Semail']);
$password = mysqli_real_escape_string($conn, $_POST['GCreatePassword']);

// File upload handling
$uploadDir = "uploads/profileP/"; // Directory to store uploaded files

// Check if a file is selected
if (isset($_FILES["ProfilePicture"])) {
    $fileExtension = pathinfo($_FILES["ProfilePicture"]["name"], PATHINFO_EXTENSION);
    $newFileName = $registration_number . '.' . $fileExtension;
    $uploadFile = $uploadDir . $newFileName;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["ProfilePicture"]["tmp_name"], $uploadFile)) {
        // File uploaded successfully, now insert information into the database
        $ProfilePicture = $newFileName;

        // Insert data into the students table using prepared statement
        $sql = $conn->prepare("INSERT INTO studentregistration (level_of_school, name, ProfilePicture, registration_number, currentSchool, county, subCounty, gender, studentContact, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("sssssssssss", $level_of_school, $name, $ProfilePicture, $registration_number, $currentSchool, $county, $subCounty, $gender, $studentContact, $email, $password);

        if ($sql->execute()) {
            echo "New record created successfully";
            header("Location: login.html");
        } else {
            echo "Error: " . $sql->error;
        }
    } else {
        echo "Error uploading the file.";
    }
} else {
    echo "No file selected.";
}

$conn->close();
?>


<?php
        if ($row2 && isset($row2['ProfilePicture'])) {
            $imagePath = "uploads/" . $row2['ProfilePicture'];
            echo "<img  src='$imagePath' alt='Profile Picture'>";
        }
         ?>