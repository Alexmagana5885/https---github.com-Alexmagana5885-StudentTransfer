document.addEventListener('DOMContentLoaded', function() {
    const openPopupBtn1 = document.getElementById('openPopupBtn1');
    const openPopupBtn2 = document.getElementById('openPopupBtn2');
    const openPopupBtn3 = document.getElementById('openPopupBtn3');
    const closePopupBtn1 = document.getElementById('closePopupBtn1');
    const closePopupBtn2 = document.getElementById('closePopupBtn2');
    const closePopupBtn3 = document.getElementById('closePopupBtn3');
    const popup1 = document.getElementById('popup1');
    const popup2 = document.getElementById('popup2');
    const popup3 = document.getElementById('popup3');

    openPopupBtn1.addEventListener('click', () => {
        popup1.style.display = 'flex';
    });

    openPopupBtn2.addEventListener('click', () => {
        popup2.style.display = 'flex';
    });

    openPopupBtn3.addEventListener('click', () => {
        popup3.style.display = 'flex';
    });

    closePopupBtn1.addEventListener('click', () => {
        popup1.style.display = 'none';
    });

    closePopupBtn2.addEventListener('click', () => {
        popup2.style.display = 'none';
    });

    closePopupBtn3.addEventListener('click', () => {
        popup3.style.display = 'none';
    });
});



        $(document).ready(function() {
            // Get the registration number from the URL parameter
            var registrationNumber = getParameterByName('registration_number');

            // Make an AJAX request to fetch student details based on the registration number
            $.ajax({
                url: 'TransferFile.php', // Your PHP script to fetch student details
                type: 'GET',
                data: { registration_number: registrationNumber },
                success: function(data) {
                    // Populate the page with fetched student details
                    // For example, update the content of specific HTML elements with data received from the server
                    // Example:
                    // $('#studentName').text(data.name);
                    // $('#studentGrade').text(data.grade);
                    // ...
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Function to get URL parameter by name
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
  