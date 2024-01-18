<?php

require_once('config.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT Gcounty, Gsubcounty, phone_number, email_address, school_name FROM schoolreg";
$result = $conn->query($sql);

// Initialize an associative array to store the data
$countySchools = array();

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch data and group schools by county
    while ($row = $result->fetch_assoc()) {
        $county = $row["Gcounty"];
        $schoolName = $row["school_name"];
        $Gsubcounty = $row["Gsubcounty"];
        $phone_number = $row["phone_number"];
        $email_address = $row["email_address"];

        // Add school to the countySchools array
        if (!isset($countySchools[$county])) {
            $countySchools[$county] = array();
        }

        $countySchools[$county][] = array(
            'schoolName' => $schoolName,
            'SchoolInfo' => [
                [
                    'Gsubcounty' => $Gsubcounty,
                    'phone_number' => $phone_number,
                    'email_address' => $email_address
                ]
            ]
        );
    }
}

// Close the database connection
$conn->close();

// Convert the associative array to JSON
$SchoolMap = json_encode($countySchools, JSON_PRETTY_PRINT);

// Specify the path and filename for the output file
$outputFilePath = 'JSON/schoolmap.json';

// Save JSON data to the file
file_put_contents($outputFilePath, $SchoolMap);

// Output success message or handle errors as needed
if (file_exists($outputFilePath)) {
    echo "JSON data has been successfully stored in the file: $outputFilePath";
} else {
    echo "Error: Unable to store JSON data in the file.";
}
?>
