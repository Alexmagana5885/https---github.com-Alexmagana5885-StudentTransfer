<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Information</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="StudentTranferRegistration.js"></script>
    <script>
        $(document).ready(function () {
            // Assuming jsonData contains the JSON data you generated in your PHP script
            var jsonData = <?php echo json_encode($jsonData, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>;

            // Populate County dropdown
            var countyDropdown = $("#selectCountyI");
            $.each(jsonData, function (county, schools) {
                countyDropdown.append($("<option></option>").attr("value", county).text(county));
            });

            // Handle county selection change
            countyDropdown.on("change", function () {
                var selectedCounty = $(this).val();
                var schoolDropdown = $("#selectSchoolI");

                // Clear previous options
                schoolDropdown.empty();

                // Populate School Name dropdown based on the selected county
                $.each(jsonData[selectedCounty], function (index, school) {
                    schoolDropdown.append($("<option></option>").attr("value", school.school_name).text(school.school_name));
                });

                // Trigger change event to update Subcounty, Contact, and Email fields
                schoolDropdown.trigger("change");
            });

            // Handle school selection change
            $("#selectSchoolI").on("change", function () {
                var selectedCounty = $("#selectCountyI").val();
                var selectedSchool = $(this).val();

                // Find the selected school in the JSON data
                var selectedSchoolData = jsonData[selectedCounty].find(function (school) {
                    return school.school_name === selectedSchool;
                });

                // Populate Subcounty, School Contact/Phone Number, and School Email Address fields
                $("p[name='Subcounty']").text(selectedSchoolData.subcounty);
                $("p[name='IntendedSchoolContact']").text(selectedSchoolData.phone_number);
                $("p[name='IntendedSchoolEmail']").text(selectedSchoolData.email_address);
            });
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <h2>Intended School</h2>

        <label class="label" for="selectCounty">Select County</label>
        <select name="county" class="textarea" id="selectCountyI"></select>

        <label class="label">School Name</label>
        <select name="IntendedSchoolName" id="selectSchoolI" class="textarea"></select>

        <label class="label">Select Subcounty</label>
        <p class="textarea" name="Subcounty"></p>

        <label class="label">School Contact/Phone Number</label>
        <p class="textarea" name="IntendedSchoolContact"></p>

        <label class="label">School Email Address</label>
        <p class="textarea" name="IntendedSchoolEmail"></p>
    </div>
    <script src="StudentTranferRegistration.js"></script>
</body>

</html>
