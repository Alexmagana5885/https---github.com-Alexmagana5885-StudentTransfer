<?php
require_once('config.php');

// Check if registration_number is set in the URL
if (isset($_GET['registration_number'])) {
    $registration_number = $_GET['registration_number'];

    // Use the registration_number to fetch data from the database
    $query = "SELECT * FROM studenttransferregistration WHERE registration_number = '$registration_number'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    // Handle the case where registration_number is not set in the URL
    // Redirect or display an error message
    header("Location: error_page.php");
    exit();
}



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
            $updateQuery = "UPDATE studenttransferregistration SET education_office_response = '$Response' WHERE registration_number = '$registration_number'";
            mysqli_query($conn, $updateQuery);

            // Display a toast message indicating that the response has been stored
            echo '<script>alert("Response submitted successfully.");</script>';
            header("Location: educationOfice.php");
        }
    }
} else {
    // Handle the case where registration_number is not set in the URL and display an error message
  
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
    <title>Office Response</title>

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

    <body>

    <form action="TransferFileEDUOF.php?registration_number=<?php echo $registration_number; ?>" method="post">
        <div class="popup" id="popup1">
            <div class="popup-content">
                <span class="close" id="closePopupBtn1">&times;</span>
                <h2 style="color: #355e8b;">Confirm the Approval and give a Comment </h2>
                <textarea style="height: 60%; width: 100%; font-size: 12px; margin: left 20px;;" id="textInput3" name="Reason" ></textarea>
                
                <button style="width: 70px; height: 30px; margin-top: 20px; color: blue; font-size: 16px; font-family: 'Times New Roman', Times, serif;"  type="submit">Confirm</button>
            </div>
        </div>
    
        <div class="popup" id="popup2">
            <div class="popup-content">
                <span class="close" id="closePopupBtn2">&times;</span>
                <h2 style="color: #355e8b;">Give a Reason for the Pending</h2>
                <textarea style="height: 80%; width: 100%; font-size: 12px;" id="textInput2" name="Reason" ></textarea>
                <button style="width: 60px; height: 30px; color: blue; font-size: 16px; font-family: 'Times New Roman', Times, serif;" >Submit</button>
            </div>
        </div>
    
        <div class="popup" id="popup3">
            <div class="popup-content">
                <span class="close" id="closePopupBtn3">&times;</span>
                <h2 style="color: #355e8b;">Give a Reason for the Rejection</h2>
                <textarea style="height: 80%; width: 100%; font-size: 12px; margin: left 20px;;" id="textInput3" name="Reason" ></textarea>
                <button style="width: 60px; height: 30px; color: blue; font-size: 16px; font-family: 'Times New Roman', Times, serif;" >Submit</button>
            </div>
        </div>
    
    </body>

    </form>
     
    <header>
       
        <h2 style="color:#fff; margin-left: 20px;">Student Name</h2>
        <nav class="Navigation">
            
      
            <a id="openPopupBtn1" class="b" href="#">Approve</a>
            <a id="openPopupBtn2" class="b" href="#">Keep Pending</a>
            <a id="openPopupBtn3" class="b" href="#">Reject</a>
            <a class="btnLogin-popup" href="educationOfice.php">Home</a>
            
            
        </nav>
        
    </header>
       

    <div style="padding-top : 110px;" class="table-container">
        <table border="1">
            <tr>
                <th>Student Details</th>
            </tr>
            <tr>
                <td>Full Name</td>
                <td><?php echo $row['full_name']; ?></td>
            </tr>
            <tr>
                <td>Grade</td>
                <td><?php echo $row['grade']; ?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><?php echo $row['phone_number']; ?></td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <td>Registration number</td>
                <td><?php echo $row['registration_number']; ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $row['date_of_birth']; ?></td>
            </tr>
            <tr>
                <th>Previous School Details</th>
            </tr>
            <tr>
                <td>School Name (Previous School)</td>
                <td><?php echo $row['previous_school_name']; ?></td>
            </tr>
            <tr>
                <td>County (Previous School)</td>
                <td><?php echo $row['county']; ?></td>
            </tr>
            <tr>
                <td>Subcounty (Previous School)</td>
                <td><?php echo $row['subcounty']; ?></td>
            </tr>
            <tr>
                <td>School Contact/Phone Number (Previous School)</td>
                <td><?php echo $row['previous_school_phone_number']; ?></td>
            </tr>
            <tr>
                <td>School Email Address (Previous School)</td>
                <td><?php echo $row['previous_school_email']; ?></td>
            </tr>
            <tr>
                <th>Intended School Details</th>
            </tr>
            <tr>
                <td>School Name (Intended School)</td>
                <td><?php echo $row['intended_school_name']; ?></td>
            </tr>
            <tr>
                <td>County (Intended School)</td>
                <td><?php echo $row['intended_school_county']; ?></td>
            </tr>
            <tr>
                <td>Subcounty (Intended School)</td>
                <td><?php echo $row['intended_school_subcounty']; ?></td>
            </tr>
            <tr>
                <td>School Contact/Phone Number (Intended School)</td>
                <td><?php echo $row['intended_school_phone_number']; ?></td>
            </tr>
            <tr>
                <td>School Email Address (Intended School)</td>
                <td><?php echo $row['intended_school_email']; ?></td>
            </tr>
            <tr>
                <th>Parrent/Gurdian Part</th>
            </tr>
            <tr>
                <td>Parent's/Gurdian's Name</td>
                <td><?php echo $row['parent_name']; ?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><?php echo $row['parent_phone_number']; ?></td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td><?php echo $row['parent_email']; ?></td>
            </tr>
            <tr>
                <td>Parent's/Gurdian's ID Number</td>
                <td><?php echo $row['parent_id_number']; ?></td>
            </tr>
            <tr>
                <td>Reason for Leaving (Parent)</td>
                <td><?php echo $row['parent_reason_for_transfer']; ?></td>
            </tr>

            <tr>
                <td>Date</td>
                <td><?php echo $row['transfer_date']; ?></td>
            </tr>
            <tr>
                <th>Required Documents</th>
            </tr>
            
                        
            <td>Application Letters</td>
<td>
    <?php
    $registration_number = $row['registration_number']; 
    $file_path = "uploads/studentDocuments/ApplicationLetters/{$registration_number}.pdf";
    
    if (file_exists($file_path)) {
        echo "<a style='text-decoration: none; color: blue; font-size: 16px; font-family: \"Times New Roman\", Times, serif;' href='{$file_path}' target='_blank' download='{$registration_number}_Application_Letters.pdf'>Download</a>";
    
    } else {
        echo "File not submitted";
    }
    ?>
</td>
</tr>


<td>Previous School Clearance Form</td>
<td>
    <?php
    $registration_number = $row['registration_number']; 
    $file_path = "uploads/studentDocuments/clearanceForms/{$registration_number}.pdf";
    
    if (file_exists($file_path)) {
        echo "<a style='text-decoration: none; color: blue; font-size: 16px; font-family: \"Times New Roman\", Times, serif;' href='{$file_path}' target='_blank' download='{$registration_number}_Clearance_Form.pdf'>Download</a>";
    
    } else {
        echo "File not submitted";
    }
    ?>
</td>
</tr>
<td>Transfer Approval from Previous School</td>
<td>
    <?php
    $registration_number = $row['registration_number']; 
    $file_path = "uploads/studentDocuments/identifications/{$registration_number}.pdf";
    
    if (file_exists($file_path)) {
        echo "<a style='text-decoration: none; color: blue; font-size: 16px; font-family: \"Times New Roman\", Times, serif;' href='{$file_path}' target='_blank' download='{$registration_number}_Transfer_Approval.pdf'>Download</a>";
    
    } else {
        echo "File not submitted";
    }
    ?>
</td>
</tr>


<td>Birth Certificate or ID Card</td>
<td>
    <?php
    $registration_number = $row['registration_number']; 
    $file_path = "uploads/studentDocuments/TranferAprovals/{$registration_number}.pdf";
    
    if (file_exists($file_path)) {
        echo "<a style='text-decoration: none; color: blue; font-size: 16px; font-family: \"Times New Roman\", Times, serif;' href='{$file_path}' target='_blank' download='{$registration_number}_Birth_Certificate.pdf'>Download</a>";
    
    } else {
        echo "File not submitted";
    }
    ?>
</td>


</tr>


    <script src="TransferFile.js"></script>

</body>
</html>


