<?php
require_once('tcpdf/tcpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['full_name'];
    $grade = $_POST['grade'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    // ... add more variables for other form fields ...

    // Create PDF
    $pdf = new TCPDF();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    // Add form data to PDF
    $pdf->Cell(0, 10, 'Full Name: ' . $full_name, 0, 1);
    $pdf->Cell(0, 10, 'Grade: ' . $grade, 0, 1);
    $pdf->Cell(0, 10, 'Phone Number: ' . $phone_number, 0, 1);
    $pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);
    // ... add more cells for other form fields ...

    // Output PDF to browser or save it to a file
    $pdfFileName = 'output.pdf';
    $pdf->Output($pdfFileName, 'F'); // F for saving to a file

    // Recipient email address
    $to = 'recipient@example.com';

    // Sender email address
    $from = 'sender@example.com';

    // Subject of the email
    $subject = 'Generated PDF';

    // Message body
    $message = 'Please find the generated PDF attached.';

    // Headers for attaching the PDF
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";
    $headers .= "--boundary\r\n";
    $headers .= "Content-Type: application/octet-stream; name=\"$pdfFileName\"\r\n";
    $headers .= "Content-Disposition: attachment; filename=\"$pdfFileName\"\r\n";
    $headers .= "Content-Transfer-Encoding: base64\r\n";
    $headers .= "\r\n";
    $headers .= chunk_split(base64_encode(file_get_contents($pdfFileName))) . "\r\n";
    $headers .= "--boundary--\r\n";

    // Send email with attachment
    if(mail($to, $subject, $message, $headers)) {
        echo 'Email sent successfully.';
    } else {
        echo 'Email failed to send.';
    }
}
?>
