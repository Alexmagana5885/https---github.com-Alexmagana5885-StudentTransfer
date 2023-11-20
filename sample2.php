<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted
    $reason = $_POST["Reason"];
    $email = $_POST["email"];

    // Customize the email content
    $subject = "Form Submission";
    $message = "Reason: $reason";

    // Send the email
    mail($email, $subject, $message);

    // Redirect back to the original page or a thank you page
    header("Location: ".$_SERVER['REQUEST_URI']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
</head>
<body>

<form action="" method="post">
    <div class="popup" id="popup1">
        <div class="popup-content">
            <span class="close" id="closePopupBtn1">&times;</span>
            <h2 style="color: #355e8b;">Confirm the Approval and give a Comment </h2>
            <textarea style="height: 60%; width: 100%; font-size: 12px; margin: left 20px;" id="textInput3" name="Reason"></textarea>
            
            <input type="hidden" name="email" value="maganaalex634@gmail.com">
            <button style="width: 70px; height: 30px; margin-top: 20px; color: blue; font-size: 16px; font-family: 'Times New Roman', Times, serif;" type="submit">Confirm</button>
        </div>
    </div>

    <div class="popup" id="popup2">
        <div class="popup-content">
            <span class="close" id="closePopupBtn2">&times;</span>
            <h2 style="color: #355e8b;">Give a Reason for the Pending</h2>
            <textarea style="height: 80%; width: 100%; font-size: 12px;" id="textInput2" name="Reason"></textarea>
            <input type="hidden" name="email" value="maganaalex634@gmail.com">
            <button style="width: 60px; height: 30px; color: blue; font-size: 16px; font-family: 'Times New Roman', Times, serif;">Submit</button>
        </div>
    </div>

    <div class="popup" id="popup3">
        <div class="popup-content">
            <span class="close" id="closePopupBtn3">&times;</span>
            <h2 style="color: #355e8b;">Give a Reason for the Rejection</h2>
            <textarea style="height: 80%; width: 100%; font-size: 12px; margin: left 20px;" id="textInput3" name="Reason"></textarea>
            <input type="hidden" name="email" value="maganaalex634@gmail.com">
            <button style="width: 60px; height: 30px; color: blue; font-size: 16px; font-family: 'Times New Roman', Times, serif;">Submit</button>
        </div>
    </div>
</form>

</body>
</html>
