<?php

include("config.php");

session_start();

$loginCategory = $_POST['loginCategory'];
$registrationNumber = $_POST['registrationNumber'];
$password = $_POST['password'];

if ($loginCategory === 'option1') {
    $sql = "SELECT * FROM studentdetails WHERE registration_number=? AND password=?";
} elseif ($loginCategory === 'option2') {
    $sql = "SELECT * FROM schoolreg WHERE registration_number=? AND password=?";
} elseif ($loginCategory === 'option3') {
    $sql = "SELECT * FROM Government_Office_Registration WHERE registration_number=? AND password=?";
} else {
    echo "Invalid login category. <a href='javascript:history.back()'>Go back</a>";
    exit();
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $registrationNumber, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    header("Location: studentPage.php");
    exit();
} else {
    echo "Incorrect login credentials. <a href='javascript:history.back()'>Go back</a>";
}

$stmt->close();
$conn->close();

?>
