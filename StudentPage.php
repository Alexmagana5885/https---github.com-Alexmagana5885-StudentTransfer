<?php
require_once('config.php');
$query = "select * from studenttranfers";
$result = mysqli_query($conn, $query);
$query2 = "select * from schoolreg";
$result2 = mysqli_query($conn, $query2);

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

                <div class="search">
                    <?php
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {

                                echo "<h2>" . $row['school_name'] . "</h2>";
                          
                            }}


                    ?>
                </div>
            </div>


<!-- ======================= Cards ================== -->
<div class="cardBox">
    <div class="card">
        
        <div>
        <div class="cardName">Name</div>
            <div style="font-size: 20px;" class="numbers">alex</div>
            <div style="font-size: 20px;" class="numbers">magana</div>
           
        </div>

    </div>
    

    <div class="card">
        <div>
            <div class="cardName">Contacts</div>
            <div style="font-size: 20px;" class="numbers">0748027123</div>
            <div style="font-size: 20px;" class="numbers">maganaalex634@gmail.com</div>
            
        </div>
    </div>

    <div class="card">
        <div>
        <div class="cardName">Current School</div>
            <div style="font-size: 18px;" class="numbers">St Paul's University</div>
            <div style="font-size: 18px;" class="numbers">Limuru</div>
            
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
                                <td>Name of School</td>
                                <td>Grade to Join</td>
                                <td>Location</td>
                                <td>date of Transfers</td>
            
                            </tr>
                        </thead>
                            
                            <?php
                                
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['previous_school'] . "</td>";
                                    echo "<td>" . $row['date_of_transfer'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
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