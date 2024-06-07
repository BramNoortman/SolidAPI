// Fetch the user data from the server
fetch('../User.php')
    .then(response => response.json()) // Parse the response as JSON
    .then(data => {
        // Get the dropdown element
        const dropdown = document.getElementById('userDropdown');

        // Create an option element for each user
        data.forEach(user => {
            const option = document.createElement('option');
            option.value = user.voornaam + ' ' + user.achternaam;
            option.text = user.voornaam + ' ' + user.achternaam;
            dropdown.add(option);
        });
    })
    .catch(error => console.error('Error:', error));

// Function to close all forms
function closeAllForms() {
    document.getElementById('salesInputForm').style.display = 'none';
    document.getElementById('resourceInputForm').style.display = 'none'; // Updated ID
    document.getElementById('totalInputForm').style.display = 'none';
}

// Event listener for the open form button in the Resource Omzet card
var openFormButton = document.querySelector('.resources.card .open-form-button');
if (openFormButton) {
    openFormButton.addEventListener('click', function() {
        closeAllForms();
        document.getElementById('resourceInputForm').style.display = 'block'; // Updated ID
    });
} else {
    console.error('Open form button not found');
}

// Event listener for the form submit event in the Resources Omzet form
document.getElementById('resourceDataForm').addEventListener('submit', function (event) {
    event.preventDefault();

    var unitId = 1; // Hardcoded unitId
    var omzet = (document.getElementById('omzet').value);

    var formData = new FormData();
    formData.append('unitId', unitId);
    formData.append('omzet', omzet);

    // Get the dropdown element
    var dropdown = document.getElementById('userDropdown');

    // Get the selected value
    var selectedValue = dropdown.value;

    // Append the selected value to the formData object
    formData.append('userName', selectedValue);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../ResourceOmzetInputJoost.php', true);

    xhr.onload = function () {
        console.log('Status code:', xhr.status);

        if (xhr.status === 200) {
            console.log(this.responseText);
        // } else {
        //     console.error('An error occurred during the transaction');
        }
    };

    xhr.send(formData);
    document.getElementById('resourceInputForm').style.display = 'none';
});

// Event listener for the close form button in the Resources Omzet form
document.getElementById('closeResourceFormButton').addEventListener('click', function () { // Updated ID
    document.getElementById('resourceInputForm').style.display = 'none'; // Updated ID
});