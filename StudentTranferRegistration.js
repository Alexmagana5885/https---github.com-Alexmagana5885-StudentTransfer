$(document).ready(function() {
    $("#transferForm").submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Serialize the form data
        var formData = $(this).serialize();

        // Make an AJAX request to the server
        $.ajax({
            type: "POST",
            url: "StudentTranferRegistration.php", // Replace this with the correct URL for your server-side script
            data: formData,
            success: function(response) {
                // Handle the response from the server
                console.log(response); // Log the response to the console (for debugging)
                // You can show a success message or redirect the user to another page here
            },
            error: function(error) {
                // Handle errors
                console.log(error.responseText); // Log the error response to the console (for debugging)
                // You can show an error message to the user here
            }
        });
    });
});
