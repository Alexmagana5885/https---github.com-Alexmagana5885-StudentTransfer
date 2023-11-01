<?php

// Include the configuration file
include("config.php");

// Start a new session or resume the existing session.
session_start();

// Retrieve user input from the login form.
$loginCategory = $_POST['loginCategory'];  
$registrationNumber = $_POST['registrationNumber'];  
$password = $_POST['password'];  

// Determine the SQL query based on the selected login category.
if ($loginCategory === 'option1') {
    $sql = "SELECT * FROM studentdetails WHERE registration_number=? AND password=?";
} elseif ($loginCategory === 'option2') {
    $sql = "SELECT * FROM schoolreg WHERE registration_number=? AND password=?";
} elseif ($loginCategory === 'option3') {
    $sql = "SELECT * FROM EDUofficeRegistration  WHERE registration_number=? AND password=?";
} else {
    // If the login category is invalid, display an error message and stop the script.
    echo "Invalid login category. <a href='javascript:history.back()'>Go back</a>";
    exit();
}

// Prepare the SQL statement for execution.
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $registrationNumber, $password);
$stmt->execute();
// Get the result set from the executed statement.
$result = $stmt->get_result();

// Check if there is exactly one row in the result set (successful login).
if ($result->num_rows == 1) {
    // Store the login category in a session variable for later use.
    $_SESSION['loginCategory'] = $loginCategory;

    // Redirect the user to the appropriate page based on the login category.
    if ($loginCategory === 'option1') {
        header("Location: studentPage.php");  
    } elseif ($loginCategory === 'option2') {
        header("Location: adminsch.php");  
    } elseif ($loginCategory === 'option3') {
        header("Location: educationOfice.php");  
    }

    exit();
} else {
    // If login credentials are incorrect, display an error message and provide a way to go back.
    echo "Incorrect login credentials. <a href='javascript:history.back()'>Go back</a>";
}

session_start();

// Check if the user is logged in and user data is available in the session.
if (isset($_SESSION['loginCategory']) && $_SESSION['loginCategory'] === 'option1' && isset($_SESSION['userData'])) {
    // Access user data
    $userData = $_SESSION['userData'];

    // Now $userData contains the user-specific data, you can use it to populate the page.
    // ...
} else {
    // Redirect the user to the login page if not logged in.
    header("Location: login.php");
    exit();
}
