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
    <title>Student Page</title>
</head>
<body>

    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title"> STUDENT PAGE</span>
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
                    <a href="sessionEnd.php">
                        <span class="title">Sign Out</span>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <span id="openPopupBtnS" class="title">Account Settings Personal Information</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span id="openPopupBtnSS" class="title">Account Settings School Information</span>
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
            $imagePath = "uploads/profileP/" . $row2['ProfilePicture'];
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
        <div style="font-size: 15px;" class="numbers">
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
        <div style="font-size: 15px;" class="numbers">
        <?php
        if ($row2) {
            echo "<h2>" . $row2['studentContact'] . "</h2>";
            echo'<div class="cardName">Email Number</div>';
            echo "<h2>" . $row2['email'] . "</h2>";
        }
        ?>
        </div>
    </div>
</div>

<div class="card">
    <div>
        <div class="cardName">Current School</div>
        <div style="font-size: 15px;" class="numbers">
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
                               echo "<td><a class='buttonResponse' id='openPopupBtn2' href='#?registration_number=" . $row['registration_number'] . "' class='status-link'>Responses</a></td>";
       
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
                        echo '<p>' . $row['IntededSchoolResponse'] . '</p>';
                    }
                } else {
                    echo '<p>No Response</p>';
                }
                ?>

                
            </div>
        </div>

        <div class="popup" id="popup2">
            <div class="popup-content">
                <span class="close" id="closePopupBtn2">&times;</span>
                <h2 style="color: #355e8b;">Education Office Response</h2>
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

        <div class="popupS" id="popupS">
            <div class="popup-contentS">
                <span class="closeS" id="closePopupBtnS">&times;</span>
                <h2 style="color: #355e8b;">Account Settings</h2>


                <style>
                    .inputfield{
                        margin-bottom: 10px;

                    }

                    .inputfield label{
                        width: 70%;
                        color: #473f8a;
                        font-size: 10px;
                    }

                    .wrapper .form .inputfield .input,
                    .inputfield .textarea,
                    .inputfield .custom_select select {
                        width: 70%;
                        outline: none;
                        border: 1px solid #a0a1b4;
                        font-size: 12px;
                        padding: 10px;
                        border-radius: 3px;
                        transition: border-color 0.3s ease;
                    }


                    

                </style>
                
    <div class="wrapper">
        <div class="title">
            Edit Student Personal Information
        </div>

        <form action="sample.php" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="student_id" value="<?php echo $row['registration_number']; ?>">

            <div class="form">



<div class="inputfield">
    <label>Name</label>
    <input  type="text" class="input" name="Sname">
</div>
<div class="inputfield">
    <label>Profile Picture</label>
    <input  type="file" class="input" name="ProfilePicture" accept="image/*">
</div>



<div class="inputfield">
    <label>Gender</label>
    <div class="custom_select">
        <select  name="sGender">
            <option >Choose option </option>
            <option >Male</option>
            <option >Female</option>
            
        </select>
    </div>
</div>


<div class="inputfield">
    <label >Student Contact</label>
    <input type="number" class="input" name="studentContact">
</div>

<div class="inputfield">
    <label>Email address</label>
    <input type="email" class="input" name="Semail">
</div>

<div class="inputfield">
    <label >Edit Password</label>
    <input type="password" class="input" id="password" name="GCreatePassword">
</div>

<div class="inputfield">
    <label >Confirm Password</label>
    <input type="password" class="input" id="confirmPassword" name="GConfirmPassword">
</div>
<!-- check th password -->
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('form');

        form.addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert("Passwords do not match. Please try again.");
                event.preventDefault(); // Prevent the form submission
            }
        });
    });
</script>


<div class="inputfield terms">
    <label class="check">
        <h4>Agreed to terms and conditions</h4>
        <input type="checkbox" required>
        <span class="checkmark"></span>
    </label>
</div>

</div>
</form>
<script src="StudentTranferRegistration.js"></script>
</div>

            <div class="inputfield">
            <input style=" width: 80px; height: 30px; border-radius: 10px; color: #0b054d; " type="submit" value="Update Information" class="btn">
            </div>
        </form>
    </div>

                

                
            </div>
        </div>



        <div class="popupSS" id="popupSS">
            <div class="popup-contentSS">
                <span class="closeSS" id="closePopupBtnSS">&times;</span>
                <h2 style="color: #355e8b;">Account Settings</h2>


                <style>
                    .inputfield{
                        margin-bottom: 10px;

                    }

                    .inputfield label{
                        width: 100%;
                        color: #473f8a;
                        font-size: 12px;
                    }

                    .wrapper .form .inputfield .input,
                    .inputfield .textarea,
                    .inputfield .custom_select select {
                        width: 100%;
                        outline: none;
                        border: 1px solid #a0a1b4;
                        font-size: 12px;
                        padding: 7px;
                        border-radius: 3px;
                        transition: border-color 0.3s ease;
                    }
                    .title{
                        font-size: 14px;
                    }


                    

                </style>
                
    <div class="wrapper">
        <div class="title">
            Edit Student School Information
        </div>

        <form action="sample.php" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="student_id" value="<?php echo $row['registration_number']; ?>">

            <div class="form">

<div class="inputfield">
    <div class="custom_select">
        <select  name="level_of_school">
            <option value="option1">Choose School Level</option>
            <option value="Primary School">Primary School</option>
            <option value="Secondary School">Secondary School</option>
            <option value="University/College">University/College</option>
        </select>
    </div>
</div>




<div class="inputfield">
    <label>Registration Number</label>
    <input  type="text" class="input" name="registration_number">
</div>

<div class="inputfield">
    <label>Current School</label>
    <input  type="text" class="input" name="Schoolname">
</div>

<div class="inputfield">
    <label>School Location</label>
    <div class="custom_select">
        <select  id="selectCounty" name="Gcounty"></select>
    </div>
</div>

<div class="inputfield">
    <div class="custom_select">
        <select  id="selectSubCounty" name="Gsubcounty"></select>
    </div>
</div>




<div class="inputfield terms">
    <label class="check">
        <h4>Agreed to terms and conditions</h4>
        <input type="checkbox" required>
        <span class="checkmark"></span>
    </label>
</div>


</div>
</form>
<script src="StudentTranferRegistration.js"></script>
</div>

            <div class="inputfield">
                <input style=" width: 80px; height: 30px; border-radius: 10px; color: #0b054d; " type="submit" value="Update Information" class="btn">
            </div>
        </form>
    </div>



        

        





<!-- =========== Scripts =========  -->

    <script src="adminsch.js"></script>


    <!-- ====== ionicons ======= -->
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



</body>
</html>