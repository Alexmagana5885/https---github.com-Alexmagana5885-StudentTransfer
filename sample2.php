<?php
// Assuming you have a database connection established
require_once('config.php');

if (isset($_GET['county'])) {
    $selectedCounty = $_GET['county'];

    // Fetch schools for the selected county
    $sql = "SELECT school_name FROM schoolreg WHERE county = '$selectedCounty'";
    $result = $conn->query($sql);

    $schools = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $schools[] = $row['school_name'];
        }
    }

    // Close the database connection
    $conn->close();

    // Convert the array to JSON and echo it
    echo json_encode(array($selectedCounty => $schools));
}
?>


<div class="wrapper">
    <h2>Intended School</h2>
  
    <label class="label" for="selectCounty">Select County</label>
    <select name="county" class="textarea" id="selectCountyI"></select>
    <!-- <input name="county" type="text" class="textarea"> -->
  
    <label class="label">School Name</label>
    <select name="IntendedSchoolName" id="selectSchoolI" class="textarea"></select>
    <!-- <input name="IntendedSchoolName" type="text" class="textarea"> -->
  
    <label class="label">Select Subcounty</label>
    <select class="textarea" name="Subcounty" id="selectSubCountyI"></select>
    <!-- <input name="Subcounty" type="text" class="textarea"> -->
  
    <label class="label">School Contact/Phone Number</label>
    <input name="IntendedSchoolContact" type="number" class="textarea">
  
    <label class="label">School Email Address</label>
    <input name="IntendedSchoolEmail" type="email" class="textarea">


</div>