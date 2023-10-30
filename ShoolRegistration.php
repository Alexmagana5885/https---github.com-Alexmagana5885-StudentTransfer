<?php
session_start();

include("config.php"); // Include the database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $level_of_school = $_POST["level_of_school"];
    $school_name = $_POST["school_name"];
    $school_location = $_POST["school_location"];
    $registration_code = $_POST["registration_code"];
    $password = $_POST["password"];
    $gender_accepted = $_POST["gender_accepted"];
    $mode_of_schooling = $_POST["mode_of_schooling"];
    $email_address = $_POST["email_address"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $postal_code = $_POST["postal_code"];
    $school_fees = $_POST["school_fees"];
    $diet_type = $_POST["diet_type"];
    $medical_facility = $_POST["medical_facility"];

    // SQL query to insert data into the 'schoolreg' table using prepared statement
    $sql = "INSERT INTO schoolreg (level_of_school, school_name, school_location, registration_code, password, gender_accepted, mode_of_schooling, email_address, phone_number, address, postal_code, school_fees, diet_type, medical_facility)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssss", $level_of_school, $school_name, $school_location, $registration_code, $password, $gender_accepted, $mode_of_schooling, $email_address, $phone_number, $address, $postal_code, $school_fees, $diet_type, $medical_facility);

    if ($stmt->execute()) {
        header("Location: login.html"); 
        exit; 
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST1") {
    // Retrieve form data
    $officeName = $_POST["GOoffice"];
    $registrationNumber = $_POST["RegistrationNumber"];
    $county = $_POST["Gcounty"];
    $subCounty = $_POST["Gsubcounty"];
    $officeContact = $_POST["registration_code"];
    $email = $_POST["Gemail"];
    $password = $_POST["GCreatePassword"];
    
    // SQL query to insert data into the database
    $sql = "INSERT INTO GofficeRegistration (office_name, registration_number, county, sub_county, office_contact, email, password) VALUES ('$officeName', '$registrationNumber', '$county', '$subCounty', '$officeContact', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: login.html"); 
        exit; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close connection
    $conn->close();
}
?>


