<?php
require_once('config.php');



if (isset($_GET['school_name'])) {
    $school_name = $_GET['school_name']; 

    // $school_name = 'Hensley, Hodges and Baker';

    // Use the school_name to fetch data from the database
    $query = "SELECT * FROM schoolreg WHERE school_name = '$school_name'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // Display details
        } else {
            echo "No details found for the selected school.";
        }
    } else {
        // Handle the case where the query fails
        die("Error in SQL query: " . mysqli_error($conn));
    }
} else {
    // Handle the case where school_name is not set in the URL
    // Redirect or display an error message
    header("Location: error_page.php");
    exit();
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="TransferFile.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Response</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
     <style>
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #355e8b;/
        }
  
        .Navigation {
            display: flex;
        } 
  
        .Navigation a {
            margin: 0 10px; 
            text-decoration: none;
            color: #fff;
        }
    </style> 
  </head>
  
<body>
    
    <header>
       
        <h2 style="color:#fff; margin-left: 20px;"><?php echo $row['school_name']; ?>  Details</h2>
        <nav class="Navigation">
            
      
      
            
            <a class="btnLogin-popup" href="StudentTranferRegistrationform.php">Home</a>

            <a id="openPopupBtn2" class="b" href="#"></a>
            <a id="openPopupBtn3" class="b" href="#"></a>
            
        </nav>
        
    </header>
       


    <div style="padding-top : 110px;" class="table-container">
        <table border="1">
            <tr>
                <th>School Details</th>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $row['school_name']; ?></td>
            </tr>
            <tr>
                <td>level of school</td>
                <td><?php echo $row['level_of_school']; ?></td>
            </tr>
            <tr>
                <td>County Location</td>
                <td><?php echo $row['county']; ?></td>
            </tr>
            <tr>
                <td>SubCounty Location</td>
                <td><?php echo $row['subcounty']; ?></td>
            </tr>
            <tr>
                <td>Gender Accepted</td>
                <td><?php echo $row['gender_accepted']; ?></td>
            </tr>
            <tr>
                <td>Mode Of Schooling</td>
                <td><?php echo $row['mode_of_schooling']; ?></td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td><?php echo $row['email_address']; ?></td>
            </tr>

            <tr>
                <td>Phone Number</td>
                <td><?php echo $row['phone_number']; ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo $row['address']; ?></td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td><?php echo $row['postal_code']; ?></td>
            </tr>

            <tr>
                <td>School Fees</td>
                <td><?php echo $row['school_fees']; ?></td>
            </tr>

            <tr>
                <td>Diet Type</td>
                <td><?php echo $row['diet_type']; ?></td>
            </tr>
            <tr>
                <td>Medical Facility</td>
                <td><?php echo $row['medical_facility']; ?></td>
            </tr>
            

</tr>



    <script src="TransferFile.js"></script>

</body>
</html>


