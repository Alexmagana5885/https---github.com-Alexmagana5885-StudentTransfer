<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Handle Personal Details

    // Handle Previous School Details

    // Handle Intended School Details

    // Handle File Uploads
    $uploadPath = "uploads/"; // Change this to the desired folder path
    $registrationNumber = $_POST["RegistrationNumber"];

    function uploadFile($fileInputName, $newFileName) {
        global $uploadPath, $registrationNumber;

        $targetDir = $uploadPath;
        $targetFile = $targetDir . basename($_FILES[$fileInputName]["name"]);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // New file name with the specified prefix
        $newFileName = $newFileName . $registrationNumber . "." . $fileType;

        $uploadOk = 1;

        // Check if file already exists
        if (file_exists($targetDir . $newFileName)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES[$fileInputName]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedFileTypes = array("pdf");
        if (!in_array($fileType, $allowedFileTypes)) {
            echo "Sorry, only PDF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // If everything is ok, try to upload file
            if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetDir . $newFileName)) {
                // File uploaded successfully, you can now store the file path in the database
                $filePath = $targetDir . $newFileName;
                // Insert the $filePath into the database (you need to implement this part)
                echo "The file " . htmlspecialchars(basename($_FILES[$fileInputName]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Upload each file with the desired prefix
    uploadFile("clearanceFormPDF", "clearanceFormPDF");
    uploadFile("TranferAprovalPDF", "TranferAprovalPDF");
    uploadFile("identificationPDF", "identificationPDF");
    uploadFile("pasportPdf", "pasportPdf");

    // Continue with storing other form data in the database
    // ...

}
?>

<?php
// Assuming you have a database connection established

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle personal details, previous school, intended school, and parent details
    
    // Handle file uploads
    $uploadDir = 'uploads/';
    $fullName = $_POST['fullName'];
    $registrationNumber = $_POST['RegistrationNumber'];

    function uploadFile($fileKey, $newFileName) {
        global $uploadDir;

        $targetDir = $uploadDir;
        $targetFile = $targetDir . basename($_FILES[$fileKey]["name"]);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $newFilePath = $targetDir . $newFileName . '.' . $fileType;

        if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $newFilePath)) {
            return $newFilePath;
        } else {
            return false;
        }
    }

    // Rename and upload each file
    $clearanceFormPath = uploadFile('clearanceFormPDF', 'clearanceFormPDF' . $registrationNumber);
    $tranferAprovalPath = uploadFile('TranferAprovalPDF', 'TranferAprovalPDF' . $registrationNumber);
    $identificationPath = uploadFile('identificationPDF', 'identificationPDF' . $registrationNumber);
    $pasportPath = uploadFile('pasportPdf', 'pasportPdf' . $registrationNumber);

    // Store file paths in the database
    // Ensure that you have a proper database connection and table structure
    // Adapt the following code based on your database configuration

    $sql = "INSERT INTO file_paths (clearanceForm, tranferAproval, identification, pasport)
            VALUES ('$clearanceFormPath', '$tranferAprovalPath', '$identificationPath', '$pasportPath')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
