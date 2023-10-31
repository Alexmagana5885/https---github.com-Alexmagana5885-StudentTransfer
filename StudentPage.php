<?php
require_once('config.php');
$query = "select * from transfer_requests";
$result = mysqli_query($conn, $query);
$query2 = "select * from studentdetails";
$result2 = mysqli_query($conn, $query2);


session_start();
// After verifying the login credentials
$_SESSION['loginCategory'] = $loginCategory;
$_SESSION['registrationNumber'] = $registrationNumber;
session_start();

// Check if the user is logged in
if(isset($_SESSION['loginCategory']) && isset($_SESSION['registrationNumber'])) {
    // User is logged in, customize the page based on login category
    $loginCategory = $_SESSION['loginCategory'];
    $registrationNumber = $_SESSION['registrationNumber'];

    // Use $loginCategory and $registrationNumber to fetch user-specific data from the database
    // Populate the page with user-specific content
} else {
    // User is not logged in, redirect them to the login page
    header("Location: login.html"); // Redirect to your login page
    exit();
}


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

<!--                
<li>
    <a href="#" onclick="showPopup()">
        <span class="title">About</span>
    </a>
</li>


                
<div class="popup-container" id="popupContainer">
    <div class="popup-content">
       
        <div id="userInfo"></div>
        <button onclick="closePopup()">Close</button>
    </div>
</div>

<script src="studentPage.js" ></script>
 -->

                

                

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
            </ul>
        </div>
    

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div style="width: 500px; width: 500px; " >
                <img id="profileImage" src="prfl.png" style="width:20% ; height: 20%; margin-top: 40px; margin-bottom: 10px; float: right; " alt="Description of the image">
                </div>
 

            </div>


<!-- ======================= Cards ================== -->
<div class="cardBox">
    <div class="card">
        
        <div>
            <div class="cardName">Name</div>
            <div style="font-size: 20px;" class="numbers">
                <?php
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {

                                echo "<h2>" . $row['name'] . "</h2>";
                                
                          
                            }}


                    ?>
            </div>
            
           
        </div>

    </div>
    

    <div class="card">
        <div>
            <div class="cardName">Contacts</div>
            <?php
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {

                                echo "<h2>" . $row['Contact'] . "</h2>";
                                echo "<h2>" . $row['email'] . "</h2>";
                          
                            }}


                    ?>
            
            
        </div>
    </div>

    <div class="card">
        <div>
        <div class="cardName">Current School</div>

        <?php
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {

                                echo "<h2>" . $row['currentsSchool'] . "</h2>";
                                echo "<h2>" . $row['County'] . "</h2>";
                                echo "<h2>" . $row['SubCounty'] . "</h2>";
                          
                            }}


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
                                <td>TRANSFER STATUS</td>
                                
                                
            
                            </tr>
                        </thead>
                            
                            <?php
                                
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['intended_school_name'] . "</td>";
                                    echo "<td>" . $row['intended_school_location'] . "</td>";
                                    echo "<td>" . $row['intended_school_location'] . "</td>";
                                    echo "<td>" . $row['Year_of_Study'] . "</td>";
                                    echo "<td>" . $row['full_Name'] . "</td>";
                                    echo "<td><span class='status return'></span></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No records</td></tr>";
                            }
                            ?>

                        
                        </tbody>
                    </table>
                </div>

                <!-- =========== Scripts =========  -->
    <script src="adminsch.js"></script>

    <!-- ====== ionicons ======= -->
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



</body>
</html>