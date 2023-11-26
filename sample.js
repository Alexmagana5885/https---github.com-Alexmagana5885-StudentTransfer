
    function populateSchools() {
        const selectedSchool = document.getElementById('selectSchoolI').value;
        const apiUrl = `/getSchoolInfo.php?school=${selectedSchool}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                document.getElementById('selectSubCountyI').value = data.Subcounty;
                document.getElementById('selectSchoolContactI').value = data.Contact;
                document.getElementById('selectSchoolEmailI').value = data.Email;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    document.getElementById('selectSchoolI').addEventListener('change', populateSchools);

