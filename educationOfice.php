<?php
require_once('config.php');
$query = "select * from transfer_requests";
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
                        <span class="title"> EDUCATION OFFICE</span>
                    </a>
                </li>

                <li>
                    <a href="firstPage.html">
                        
                        <span class="title">Dashboard</span>
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
            <div class="numbers">2234</div>
            <div class="cardName">Total Transfers</div>
        </div>

    </div>
    

    <div class="card">
        <div>
            <div class="numbers">2344</div>
            <div class="cardName">Accepted Transfers</div>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">122346</div>
            <div class="cardName">Pendig Transfers</div>
        </div>

    </div>

    <div class="card">
        <div>
            <div class="numbers">12235</div>
            <div class="cardName">Rejected Transfers</div>
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
                            <tr style="font-size: 15px; color: #355e8b; " >
                                <td>Name</td>
                                <td>Year of Study</td>
                                <td>Previous School</td>
                                <td>Student Email</td>
                                <td>Gurdian Contact</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                            
                            <?php
                                
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    
                                    echo "<tr>";
                                    echo "<td>" . $row['full_Name'] . "</td>";
                                    echo "<td>" . $row['Year_of_Study'] . "</td>";
                                    echo "<td>" . $row['prev_school_name'] . "</td>";
                                    echo "<td>" . $row['student_email'] . "</td>";
                                    echo "<td>" . $row['parent_phone'] . "</td>";
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