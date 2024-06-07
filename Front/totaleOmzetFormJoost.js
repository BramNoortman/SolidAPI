// Function to close all forms
function closeAllForms() {
    document.getElementById('salesInputForm').style.display = 'none';
    document.getElementById('resourceInputForm').style.display = 'none'; // Updated ID
    document.getElementById('totalInputForm').style.display = 'none';
}

// Event listener for the open form button in the Resource Omzet card
var openFormButton = document.querySelector('.total.card .open-form-button');
if (openFormButton) {
    openFormButton.addEventListener('click', function() {
        closeAllForms();
        document.getElementById('totalInputForm').style.display = 'block'; // Updated ID
    });
} else {
    console.error('Open form button not found');
}

// Event listener for the form submit event in the Totale Omzet form
document.getElementById('totalInputForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // Get the 'omzet' value from the form
    var omzet = document.getElementById('totalOmzet').value;

    // Use the fetch function to send a POST request to TotaleOmzetInputJoost.php with the 'omzet' value in the body
    fetch('../TotaleOmzetInputJoost.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'omzet=' + omzet,
    })
    .then(response => response.json()) // Parse the response as JSON
    .then(data => {
        // Log the JSON data to the console
        console.log(data);
    })
    .catch(error => {
        // Log any errors to the console
        console.error('Error:', error);
    });

    // Hide the form
    document.getElementById('totalInputForm').style.display = 'none';
});

// Event listener for the close form button in the Resources Omzet form
document.getElementById('closeTotalFormButton').addEventListener('click', function () { // Updated ID
    document.getElementById('totalInputForm').style.display = 'none'; // Updated ID
});