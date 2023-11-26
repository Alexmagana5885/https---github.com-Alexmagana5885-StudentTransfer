const countiesUrl = 'JSON/counties.json';
const subCountiesUrl = 'JSON/subcounties.json';
const selectCounty = document.getElementById('selectCountyI');
const selectSubCounty = document.getElementById('selectSubCountyI');
const selectSchool = document.getElementById('selectSchoolI');
const schoolDetailsLink = document.getElementById('schoolDetailsLink');

// Function to populate dropdown options
function populateDropdown(element, options) {
    element.innerHTML = '<option value="chooseOption">Choose an option</option>';
    options.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option;
        optionElement.textContent = option;
        element.appendChild(optionElement);
    });
}

// Function to fetch and populate sub-counties based on the selected county
function populateSubCounties(selectedCounty) {
    fetch(subCountiesUrl)
        .then(response => response.json())
        .then(data => {
            const subCounties = data[selectedCounty] || [];
            populateDropdown(selectSubCounty, subCounties);
        })
        .catch(error => {
            console.error('Error fetching sub-counties:', error);
        });
}

// Function to fetch and populate schools based on the selected county
function populateSchools(selectedCounty) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var jsonData = JSON.parse(xhr.responseText);
            if (jsonData[selectedCounty]) {
                populateDropdown(selectSchool, jsonData[selectedCounty]);
            }
        }
    };
    xhr.open('GET', 'SchoolMapping.php?county=' + selectedCounty, true);
    xhr.send();
}

// Event listener for county dropdown change
selectCounty.addEventListener('change', () => {
    const selectedCounty = selectCounty.value;
    populateSubCounties(selectedCounty);
    populateSchools(selectedCounty);
});

// Event listener for page load
window.onload = function () {
    // Trigger the initial population of sub-counties and schools dropdown
    const selectedCounty = selectCounty.value;
    populateSubCounties(selectedCounty);
    populateSchools(selectedCounty);
};

// Event listener for form submission
document.getElementById('submitRequest').addEventListener('click', function () {
    // Form submission when the button is clicked
    document.getElementById('StudentTransferRegistrationForm').submit();
});

// Event listener for the "School Details" link
schoolDetailsLink.addEventListener('click', openSchoolDetails);

function populateSchools() {
    // Your existing code to populate schools goes here

    // Update the href attribute of the link
    var selectedSchool = document.getElementById("selectSchoolI").value;
    schoolDetailsLink.setAttribute("school_name", selectedSchool);
}

function openSchoolDetails(event) {
  // Prevent the default behavior of the anchor tag
  event.preventDefault();

  var selectedSchool = schoolDetailsLink.getAttribute("school_name");

  // Redirect to SchoolDetails.php with the selected school name
  window.location.href = "SchoolDetails.php?school_name=" + encodeURIComponent(selectedSchool);
}
