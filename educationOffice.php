<?php

session_start();
$sessionTimeout = 30 * 60;


require_once('config.php');
// $query = "select * from studenttransferregistration";
// $result = mysqli_query($conn, $query);
$query2 = "select * from eduofficeregistration";
$result2 = mysqli_query($conn, $query2);


$query = "SELECT * FROM studenttransferregistration";
$result = mysqli_query($conn, $query);
$totalTransfersCount = mysqli_num_rows($result);
$query2 = "SELECT * FROM eduofficeregistration";
$result2 = mysqli_query($conn, $query2);

$countAcceptedTransfers = "SELECT * FROM studenttransferregistration WHERE education_office_response = 'Approved'";
$countResultAcceptedTransfers = mysqli_query($conn, $countAcceptedTransfers);
$AcceptedTransfers = mysqli_num_rows($countResultAcceptedTransfers);

$countPendingTransfers = "SELECT * FROM studenttransferregistration WHERE education_office_response = 'Pending'";
$resultPendingTransfers = mysqli_query($conn, $countPendingTransfers);
$pendingTransfers = mysqli_num_rows($resultPendingTransfers);


$countRejectedTransfers = "SELECT * FROM studenttransferregistration WHERE education_office_response = 'Rejected'";
$countResultRejectedTransfers = mysqli_query($conn, $countRejectedTransfers);
$RejectedTransfers = mysqli_num_rows($countResultRejectedTransfers);





// Check if the user is not logged in, redirect them to the login page.
if (!isset($_SESSION['loginCategory']) || !isset($_SESSION['registrationNumber'])) {
    header("Location: login.html"); 
    exit();
}

// Fetch user-specific data based on session variables
$loginCategory = $_SESSION['loginCategory'];
$registrationNumber = $_SESSION['registrationNumber'];



// Query the database to get user-specific data
$query = "SELECT * FROM eduofficeregistration WHERE registration_number = '$registrationNumber'";
$result2 = mysqli_query($conn, $query);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="adminscg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education office</title>
</head>
<body>

    <!--  Navigation  -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title"> EDUCATION OFFICE</span>
                    </a>
                </li>

                <li>
                    <a href="firstPage.html">
                        
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="title">About</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="title">Contacts</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="sessionEnd.php">
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <?php
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {

                                echo "<h2>" . $row['office_name'] . "</h2>";
                          
                            }}


                    ?>
                </div>
            </div>


<!--  Cards  -->
<div class="cardBox">
    <!-- <div class="card">
        
        <div>
            <div class="numbers">2234</div>
            <div class="cardName">Total Transfers</div>
        </div>

    </div>
     -->
    <div class="card">
    <div>
        <div class="numbers"><?php echo $totalTransfersCount; ?></div>
        <div class="cardName">Total Transfers</div>
    </div>
    
    </div>

    <div class="card">
        <div>
            <div class="numbers"><?php echo $AcceptedTransfers; ?></div>
            <div class="cardName">Accepted Transfers</div>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers"><?php echo $pendingTransfers; ?></div>
            <div class="cardName">Pendig Transfers</div>
        </div>

    </div>

    <div class="card">
        <div>
            <div class="numbers"><?php echo $RejectedTransfers; ?></div>
            <div class="cardName">Rejected Transfers</div>
        </div>

    </div>
</div>

<!--  tranfer details  -->

            <div class="details">
                <div class="recentTransfers">
                    <div class="cardHeader">
                        <h2>Recent Transfers Request</h2>
                    </div>

                    <table>
                        <thead>
                            <tr style="font-size: 15px; color: #355e8b; " >
                                <td>Student Name</td>
                                <td>Current School</td>
                                <td>intended School</td>
                                <td>Student Contact</td>
                                <td>Gurdian/Parent Contact</td>
                                <td>Details</td>
                                <td>Response</td>
                            </tr>
                        </thead>

                        
                            
                            <?php

                                $sql = "SELECT * FROM studenttransferregistration  ORDER BY 
                                CASE 
                                    WHEN education_office_response = '' THEN 3 
                                    WHEN education_office_response = 'Pending' THEN 0
                                    WHEN education_office_response = 'Rejected' THEN 3
                                    WHEN education_office_response = 'Approved' THEN 2
                                    ELSE 4
                                END, education_office_response";
                                $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    
                                    echo "<tr>";
                                    echo "<td>" . $row['full_name'] . "</td>";
                                    echo "<td>" . $row['previous_school_name'] . "</td>";
                                    echo "<td>" . $row['intended_school_name'] . "</td>";
                                    echo "<td>" . $row['phone_number'] . "</td>";
                                    echo "<td>" . $row['parent_phone_number'] . "</td>";
                                    echo "<td ><a class='buttonResponse' href='educationOfficeResponse.php?registration_number=" . $row['registration_number'] . "' class='status-link'>More Student Details</a></td>";
                                    echo "<td>" . $row['education_office_response'] . "</td>";  
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No records</td></tr>";
                            }
                            ?>

<style>
                            .buttonResponse{
                                text-decoration: none;
                                color: #355e8b;
                                
                                

                            }
                            .buttonResponse:hover{
                                color: red;
                            }

                            
                        </style>

                        
                        </tbody>
                    </table>
                </div>

                <!--  Scripts   -->
    <script src="adminsch.js"></script>

    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



</body>
</html>