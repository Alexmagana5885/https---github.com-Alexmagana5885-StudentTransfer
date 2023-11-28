<?php
session_start();
$sessionTimeout = 30 * 60;

require_once('config.php');

// Fetch data from the database
$limit = 10;
$schoolName = 'school_name';

$query = "SELECT * FROM studenttransferregistration WHERE schoolResponse = 'Rejected' AND intended_school_name = '$schoolName' LIMIT $limit";
$result = mysqli_query($conn, $query);
// $query = "SELECT * FROM studenttransferregistration";
$result = mysqli_query($conn, $query);

$query2 = "SELECT * FROM schoolreg";
$result2 = mysqli_query($conn, $query2);




$countTotalTransfers = "SELECT * FROM studenttransferregistration";
$countResult = mysqli_query($conn, $countTotalTransfers);
$totalTransfersCount = mysqli_num_rows($countResult);


$countAcceptedTransfers = "SELECT * FROM studenttransferregistration WHERE schoolResponse = 'Approved'";
$countResultAcceptedTransfers = mysqli_query($conn, $countAcceptedTransfers);
$AcceptedTransfers = mysqli_num_rows($countResultAcceptedTransfers);

$countPendingTransfers = "SELECT * FROM studenttransferregistration WHERE schoolResponse = 'Pending'";
$resultPendingTransfers = mysqli_query($conn, $countPendingTransfers);
$pendingTransfers = mysqli_num_rows($resultPendingTransfers);


$countRejectedTransfers = "SELECT * FROM studenttransferregistration WHERE schoolResponse = 'Rejected'";
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

$query = "SELECT * FROM schoolreg WHERE registration_number = '$registrationNumber'";
$result2 = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="adminscg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Admin</title>
</head>

<body>

    <!--  Navigation  -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title"> SCHOOL ADMIN</span>
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
                            echo "<h2>" . $row['school_name'] . "</h2>";
                        }
                    }
                    ?>
                </div>
            </div>

            <!--  Cards  -->
            <div class="cardBox">
                <!-- Card 1: Total Transfers -->
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $totalTransfersCount; ?></div>
                        <div class="cardName">Total Transfers</div>
                    </div>
                </div>

                <!-- Card 2: Accepted Transfers -->
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $AcceptedTransfers; ?></div>
                        <div class="cardName">Accepted Transfers</div>
                    </div>
                </div>
                 
                <!-- Card 3: Pending Transfers -->
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $pendingTransfers; ?></div>
                        <div class="cardName">Pending Transfers</div>
                    </div>
                </div>

                <!-- Card 4: Rejected Transfers -->
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $RejectedTransfers; ?></div>
                        <div class="cardName">Rejected Transfers</div>
                    </div>
                </div>
            </div>

            <!--  Transfer Details  -->
            <div class="details">
                <div class="recentTransfers">
                    <div class="cardHeader">
                        <h2>Recent Transfers Request</h2>
                    </div>

                    <table>
                        <thead>
                            <tr style="font-size: 15px; color: #355e8b; ">
                                <td>Name</td>
                                <td>Year of Study</td>
                                <td>Previous School</td>
                                <td>Student Email</td>
                                <td>Gurdian Contact</td>
                                <td>Details</td>
                                <td>Response</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM studenttransferregistration ORDER BY 
                            CASE 
                                WHEN education_office_response = '' THEN 0 
                                WHEN education_office_response = 'Pending' THEN 1
                                WHEN education_office_response = 'Rejected' THEN 2
                                WHEN education_office_response = 'Approved' THEN 3
                                ELSE 4
                            END, education_office_response";

                            $result = $conn->query($sql);


                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['full_name'] . "</td>";
                                    echo "<td>" . $row['grade'] . "</td>";
                                    echo "<td>" . $row['previous_school_name'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['parent_phone_number'] . "</td>";
                                    echo "<td ><a class='buttonResponse' href='SchoolTransferResponse.php?registration_number=" . $row['registration_number'] . "' class='status-link'>More Student Details</a></td>";
                                    echo "<td>" . $row['schoolResponse'] . "</td>";
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

                <!-- Response Popup Form -->
                <form action="sample2.php" method="post">
                                <!-- <?php
                // if ($result->num_rows > 0) {
                // while ($row = $result->fetch_assoc()) {
                    // echo '<div class="popup" id="' . $row['registration_number'] . '">';
                // }
                // }
                // ?> -->

<!-- > popup1 -->
                    <div class="popup" id="popup1">
                        <div class="popup-content">
                            <span class="close" id="closePopupBtn1">&times;</span>
                            <h2 style="color: #355e8b;">Response</h2>

                            <h3>Approval:</h3><br>
                            <p>Attach a detailed letter explaining the approval, including any additional requirements or information.</p><br>

                            <h3>Pending Transfer:</h3><br>
                            <p>Attach a letter providing details on the reason for keeping the transfer request pending. Include any necessary information related to the decision.</p><br>

                            <h3>Rejecting Transfer:</h3><br>
                            <p>Attach a letter outlining the reasons for rejecting the transfer request. Provide detailed information supporting the decision to reject the transfer.</p>
                            <br><br>

                            <label for="selectOption" style="font-size: 16px; color: #355e8b; font-family: 'Times New Roman', Times, serif;">Feedback</label>
                            <select name="feedbackOption" id="selectOption" style="font-size: 14px; color: #355e8b; font-family: 'Times New Roman', Times, serif;">
                                <option value="option1">Choose an option</option>
                                <option value="option2">Approve</option>
                                <option value="option3">Keep Pending</option>
                                <option value="option4">Reject</option>
                            </select>

                            <input type="file" id="fileInput" name="admissionLetter" style="color: #355e8b; font-size: 1.17em; margin: 1em 0; font-weight: bold;">

                            <button type="submit" name="Approved" style="width: 70px; height: 30px; margin-top: 20px; color: blue; font-size: 16px; font-family: 'Times New Roman', Times, serif;">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--  Scripts   -->
    <script src="adminsch.js"></script>
    

    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
