<?php
// Database connection parameters
$host = "localhost"; // Replace with your PostgreSQL host if needed
$port = "5432"; // Default PostgreSQL port
$dbname = "TransferSystem";
$user = "your_postgresql_username";
$password = "your_postgresql_password";

// Establish a database connection
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Database connection failed");
}

// Retrieve form data (modify field names as needed)
$levelOfSchool = $_POST['level_of_school'];
$schoolName = $_POST['school_name'];
$location = $_POST['location'];
// ... (retrieve other form data)

// SQL query to insert data into the table (modify table and column names)
$sql = "INSERT INTO registration_data (level_of_school, school_name, location, registration_code, gender_accepted, mode_of_schooling, email_address, phone_number, address, postal_code, school_fees_per_semester, types_of_diet, medical, agreed_to_terms)
        VALUES ('$levelOfSchool', '$schoolName', '$location', '$registrationCode', '$genderAccepted', '$modeOfSchooling', '$emailAddress', '$phoneNumber', '$address', '$postalCode', $schoolFeesPerSemester, '$typesOfDiet', '$medical', '$agreedToTerms')";

$result = pg_query($conn, $sql);

if (!$result) {
    die("Error: " . pg_last_error($conn));
} else {
    echo "Registration successful!";
}

// Close the database connection
pg_close($conn);
?>
 