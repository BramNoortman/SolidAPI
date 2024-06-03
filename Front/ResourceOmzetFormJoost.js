
// Function to close all forms
function closeAllForms() {
    document.getElementById('salesInputForm').style.display = 'none';
    document.getElementById('resourceInputForm').style.display = 'none';
    document.getElementById('totalInputForm').style.display = 'none';
}

// Event listener for the open form button in the Resource Omzet card
document.querySelector('.resources.card .open-form-button').addEventListener('click', function() {
    console.log('Open form button clicked')
    closeAllForms();
  document.getElementById('resourceOmzetInputForm').style.display = 'block';
});

// Event listener for the form submit event in the Resources Omzet form
document.getElementById('resourceOmzetDataForm').addEventListener('submit', function (event) {
    // Prevent the form from being submitted the default way
    event.preventDefault();

    // Get the input values from the form
    var unitName = document.getElementById('ResourceunitName').value;
    var omzet = document.getElementById('omzet').value;
    var userName = document.getElementById('userName').value;

    // Create a new FormData object
    var formData = new FormData();
    formData.append('unitName', unitName);
    formData.append('omzet', omzet);
    formData.append('userName', userName);

    // Create a new XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configure the request
    xhr.open('POST', '../SolidAPI/ResourceOmzetInputJoost.php', true);

    // Set up a handler for when the request finishes
    xhr.onload = function () {
        // Log the status code
        console.log('Status code:', xhr.status);

        if (xhr.status === 200) {
            // The request was successful
            console.log(this.responseText);
        } else {
            // The request failed
            console.error('An error occurred during the transaction');
        }
    };

    // Send the request
    xhr.send(formData);

    // Close the form
    document.getElementById('resourceInputForm').style.display = 'none';
});

// Event listener for the close form button in the Resources Omzet form
document.getElementById('closeResourceFormButton').addEventListener('click', function () {
    document.getElementById('resourceInputForm').style.display = 'none';
});