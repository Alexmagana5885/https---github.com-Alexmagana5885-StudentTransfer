<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Dynamic School Names</title>
</head>
<body>

<div class="wrapper">
    <h2>Intended School</h2>
  
    <label class="label" for="selectCounty">Select County</label>
    <select name="county" class="textarea" id="selectCountyI">
        <!-- Populate options dynamically using PHP -->
        <?php
            // Assuming you have a database connection established
            require_once('config.php');

            $sql = "SELECT DISTINCT county FROM schoolreg";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['county'] . "'>" . $row['county'] . "</option>";
                }
            }

            $conn->close();
        ?>
    </select>
  
    <label class="label">School Name</label>
    <select name="IntendedSchoolName" id="selectSchoolI" class="textarea"></select>
  
    <!-- Add an event listener to the county dropdown to fetch and populate schools -->
    <script>
        $(document).ready(function(){
            $('#selectCountyI').change(function(){
                var selectedCounty = $(this).val();
                
                // Clear previous options
                $('#selectSchoolI').empty();
                
                // Fetch schools for the selected county using AJAX
                $.getJSON('SchoolMaping.php', {county: selectedCounty}, function(data){
                    $.each(data[selectedCounty], function(index, value){
                        $('#selectSchoolI').append('<option value="' + value + '">' + value + '</option>');
                    });
                });
            });
        });
    </script>

    <!-- Rest of your form -->
</div>

</body>
</html>
