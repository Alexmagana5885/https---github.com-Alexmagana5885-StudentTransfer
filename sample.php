<?php
// Assuming $conn is your database connection

// Fetch user-specific data based on session variables
$loginCategory = $_SESSION['loginCategory'];
$registrationNumber = $_SESSION['registrationNumber'];

// Query the database to get the county name of the education office
$queryOfficeCounty = "SELECT county_name FROM eduofficeregistration WHERE registration_number = '$registrationNumber'";
$resultOfficeCounty = mysqli_query($conn, $queryOfficeCounty);

if ($resultOfficeCounty->num_rows > 0) {
    $rowOfficeCounty = $resultOfficeCounty->fetch_assoc();
    $officeCounty = $rowOfficeCounty['county_name'];

    // Query to get student transfer records from the same county
    $query = "SELECT str.*, er.county_name AS office_county
              FROM studenttransferregistration str
              JOIN eduofficeregistration er ON str.county_name = er.county_name
              WHERE er.county_name = '$officeCounty'
              ORDER BY 
                CASE 
                    WHEN str.education_office_response = '' THEN 3 
                    WHEN str.education_office_response = 'Pending' THEN 0
                    WHEN str.education_office_response = 'Rejected' THEN 3
                    WHEN str.education_office_response = 'Approved' THEN 2
                    ELSE 4
                END, str.education_office_response";

    $result = $conn->query($query);

    // Rest of your code to display the table
} else {
    // Handle the case where the office county information is not found
    echo "Office county information not found.";
}
?>
