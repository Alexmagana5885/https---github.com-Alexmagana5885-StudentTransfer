<?php
require_once('config.php');
$query = "select * from studenttransferregistration";
$result = mysqli_query($conn, $query);
$query2 = "select * from studentregistration";
$result2 = mysqli_query($conn, $query2);



session_start();

// Check if the user is not logged in, redirect them to the login page.
if (!isset($_SESSION['loginCategory']) || !isset($_SESSION['registrationNumber'])) {
    header("Location: login.html"); 
    exit();
}

// Fetch user-specific data based on session variables
$loginCategory = $_SESSION['loginCategory'];
$registrationNumber = $_SESSION['registrationNumber'];

// Query to  get user-specific data

$query = "SELECT * FROM studentregistration WHERE registration_number = '$registrationNumber'";
$result2 = mysqli_query($conn, $query);
$row2 = mysqli_fetch_assoc($result2); // Fetch the row

$registrationNumber = $_SESSION['registrationNumber']; 

$sql = "SELECT * FROM studenttransferregistration WHERE registration_number = '$registrationNumber'";
$result3 = $conn->query($sql);



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

    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title"> Student Page</span>
                    </a>
                </li>

                <li>
                    <a href="firstPage.html">
                        
                        <span class="title">Home</span>
                    </a>
                </li>

       

                

                <li>
                    <a href="StudentTranferRegistration.html">
                        <span class="title">Tranfer Registration</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="title">Sign Out</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="title">Account Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

            
 

            </div>


<!-- ======================= Cards ================== -->
<div class="cardBox">

<div class="card">
    <div>
        <div class="cardName">Profile Image</div>
        <div style="font-size: 20px;" class="numbers">
        <?php
        if ($row2 && isset($row2['ProfilePicture'])) {
            $imagePath = "uploads/" . $row2['ProfilePicture'];
            echo "<img class='profile-image' src='$imagePath' alt='Profile Picture'>";
        }
        ?>
        <style>
        .profile-image {
            width: 100px; 
            height: 100px; 
            object-fit: cover; 
            border-radius: 20%; 
        }

        </style>

        <!-- <img id="profileImage" src="profile.png" style="width:50% ; height: 40%; margin-bottom: 10px; float: center; " alt="Description of the image">
             -->
        </div>
    </div>
</div>
<div class="card">
    <div>
        <div class="cardName">Name</div>
        <div style="font-size: 20px;" class="numbers">
            <?php
            if ($row2) {
                echo "<h2>" . $row2['name'] . "</h2>";
                echo'<div class="cardName">Registration Number</div>';
                echo "<h2>" . $row2['registration_number'] . "</h2>";
            } 
            ?>
        </div>
    </div>
</div>

<div class="card">
    <div>
        <div class="cardName">Contacts</div>
        <?php
        if ($row2) {
            echo "<h2>" . $row2['studentContact'] . "</h2>";
            echo'<div class="cardName">Email Number</div>';
            echo "<h2>" . $row2['email'] . "</h2>";
        }
        ?>
    </div>
</div>

<div class="card">
    <div>
        <div class="cardName">Current School</div>
        <?php
        if ($row2) {
            echo "<h2>" . $row2['currentSchool'] . "</h2>";
            echo'<div class="cardName">County</div>';
            echo "<h2>" . $row2['county'] . "</h2>";
            echo'<div class="cardName">Sub County</div>';
            echo "<h2>" . $row2['subCounty'] . "</h2>";
        }
        ?>
    </div>
</div>


</div>

<!-- ================ tranfer details ================= -->

            <div class="details">
                <div class="recentTransfers">
                    <div class="cardHeader">
                        <h2>Recent Transfers Request</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>SCHOOL INTEDED</td>
                                <td>COUNTY</td>
                                <td>SUB-COUNTY</td>
                                <td>DATE</td>
                                <td>Inteded School Response</td>
                                <td>Education Office Response</td>
                                
     
                            </tr>
                        </thead>

                        <?php
                        if ($result3->num_rows > 0) {
                            while ($row = $result3->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['intended_school_name'] . "</td>";
                                echo "<td>" . $row['intended_school_county'] . "</td>";
                                echo "<td>" . $row['intended_school_subcounty'] . "</td>";
                                echo "<td>" . $row['transfer_date'] . "</td>";
                                echo "<td><a class='buttonResponse' id='openPopupBtn1' href='#?registration_number=" . $row['registration_number'] . "' class='status-link'>Responses</a></td>";
                               echo "<td><a class='buttonResponse' id='openPopupBtn1' href='#?registration_number=" . $row['registration_number'] . "' class='status-link'>Responses</a></td>";
       
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
                            .buttonResponse :hover{
                                color: red;
                            }

                            
                        </style>
                        
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
     
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
     
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
     
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
     
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
     
                            </tr>
                        </thead>
                        
                        
                        </tbody>
                    </table>
                </div>

        <div class="popup" id="popup1">
            <div class="popup-content">
                <span class="close" id="closePopupBtn1">&times;</span>
                <h2 style="color: #355e8b;">School Response</h2>
                <p>
                <?php
                if ($result3->num_rows > 0) {
                    while ($row = $result3->fetch_assoc()) {
                        echo '<p>' . $row['Response'] . '</p>';
                    }
                } else {
                    echo '<p>No Response</p>';
                }
                ?>

                
            </div>
        </div>


        





<!-- =========== Scripts =========  -->

    <script src="adminsch.js"></script>


    <!-- ====== ionicons ======= -->
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



</body>
</html>