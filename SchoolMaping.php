<?php

require_once('config.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT county, school_name FROM schoolreg";
$result = $conn->query($sql);

// Initialize an associative array to store the data
$countySchools = array();

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch data and group schools by county
    while ($row = $result->fetch_assoc()) {
        $county = $row["county"];
        $schoolName = $row["school_name"];

        // Add school to the countySchools array
        if (!isset($countySchools[$county])) {
            $countySchools[$county] = array();
        }
        $countySchools[$county][] = $schoolName;
    }
}

// Close the database connection
$conn->close();

// Convert the associative array to JSON
$jsonData = json_encode($countySchools, JSON_PRETTY_PRINT);

// Output the JSON data
header('Content-Type: application/json');
echo $jsonData;
?>
