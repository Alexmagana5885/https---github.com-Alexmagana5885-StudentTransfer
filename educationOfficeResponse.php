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

    <body>
    <form action="education_office_response.php" method="post" enctype="multipart/form-data">
    <div class="popup" id="popup1">
        <div class="popup-content">
            <span class="close" id="closePopupBtn1">&times;</span>
            <h2 style="color: #355e8b;">Response</h2>

            <!--  feedback options  -->
            <h3>Approval:</h3>
        <p>Attach a detailed letter explaining the approval, including any additional requirements or information.</p><br>

        <h3>Pending Transfer:</h3>
        <p>Attach a letter providing details on the reason for keeping the transfer request pending. Include any necessary information related to the decision.</p><br>

        <h3>Rejecting Transfer:</h3>
        <p>Attach a letter outlining the reasons for rejecting the transfer request. Provide detailed information supporting the decision to reject the transfer.</p>
        <br><br>
            <label for="selectOption" style="font-size: 16px; color: #355e8b; font-family: 'Times New Roman', Times, serif;">Feedback</label>
            <select name="feedbackOption" id="selectOption" style="font-size: 14px; color: #355e8b; font-family: 'Times New Roman', Times, serif;">
            <option value="Not Given">Choose an option</option>
                <option value="Approved">Approve</option>
                <option value="Pending">Keep Pending</option>
                <option value="Rejected">Reject</option>
            </select>

            <!-- Hidden input to store registration_number -->
            <input type="hidden" name="registration_number" value="<?php echo $row['registration_number']; ?>">
            

            <!-- File input -->
            <input type="file" id="fileInput" name="admissionLetter" style="color: #355e8b; font-size: 1.17em; margin: 1em 0; font-weight: bold;">

            <!-- Submit button -->
            <button type="submit" name="submitFeedback" style="width: 70px; height: 30px; margin-top: 20px; color: blue; font-size: 16px; font-family: 'Times New Roman', Times, serif;">Send</button>
        </div>
    </div>
</form>


    
    </body>

    
    
    
    <header>
       
        <h2 style="color:#fff; margin-left: 20px;"><?php echo $row['full_name']; ?> Tranfer Details</h2>
        <nav class="Navigation">
            
      
      
            <a id="openPopupBtn1" class="b" href="#">Give Feedback</a>
            <a class="btnLogin-popup" href="educationOffice.php">Home</a>

            <a id="openPopupBtn2" class="b" href="#"></a>
            <a id="openPopupBtn3" class="b" href="#"></a>
            
            
            

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


