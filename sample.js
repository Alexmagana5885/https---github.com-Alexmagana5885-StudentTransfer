//Fetch the counties and sub-counties from JSON files
const countiesUrl = 'JSON/counties.json';
const subCountiesUrl = 'JSON/subcounties.json';

const selectCounty = document.getElementById('selectCounty');
const selectSubCounty = document.getElementById('selectSubCounty');

// Initialize the second dropdown with a default option
selectSubCounty.innerHTML = '<option value="chooseSubCounty">Choose a sub-county</option>';

// Populate the first dropdown with counties
fetch(countiesUrl)
  .then(response => response.json())
  .then(data => {
    data.counties.forEach(county => {
      const option = document.createElement('option');
      option.value = county;
      option.textContent = county;
      selectCounty.appendChild(option);
    });
  })
  .catch(error => {
    console.error('Error fetching counties:', error);
  });

// Handle change event for the first dropdown
selectCounty.addEventListener('change', () => {
  const selectedCounty = selectCounty.value;

  // Clear existing options in the second dropdown
  selectSubCounty.innerHTML = '<option value="chooseSubCounty">Choose a sub-county</option>';

  // Populate the second dropdown with sub-counties based on the selected county
  fetch(subCountiesUrl)
    .then(response => response.json())
    .then(data => {
      const subCounties = data[selectedCounty] || [];
      subCounties.forEach(subCounty => {
        const option = document.createElement('option');
        option.value = subCounty;
        option.textContent = subCounty;
        selectSubCounty.appendChild(option);
      });
    })
    .catch(error => {
      console.error('Error fetching sub-counties:', error);
    });
});
