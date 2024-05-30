// Function to close all forms
function closeAllForms() {
    document.getElementById('salesInputForm').style.display = 'none';
    document.getElementById('resourceInputForm').style.display = 'none';
    document.getElementById('totalInputForm').style.display = 'none';
}

// Event listener for the open form button in the Sales Omzet card
document.querySelector('.sales.card .open-form-button').addEventListener('click', function() {
    closeAllForms();
    document.getElementById('salesInputForm').style.display = 'block';
});


// Event listener for the open form button in the Resource Omzet card
document.querySelector('.resources.card .open-form-button').addEventListener('click', function() {
    closeAllForms();
    document.getElementById('resourceInputForm').style.display = 'block';
});

// Event listener for the button click event in the Resources Omzet form
document.querySelector('.resource-form-card .submit-button').addEventListener('click', function () {
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
    xhr.open('POST', '../SolidAPI/ResourceOmzetInput.php', true);

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



// Event listener for the open form button in the Total Omzet card
document.querySelector('.total.card .open-form-button').addEventListener('click', function () {
    closeAllForms();
    document.getElementById('totalInputForm').style.display = 'block';
});

// Event listener for the close form button in the Sales Omzet form
document.getElementById('closeSalesFormButton').addEventListener('click', function () {
    document.getElementById('salesInputForm').style.display = 'none';
});

// Event listener for the close form button in the Resources Omzet form
document.getElementById('closeResourceFormButton').addEventListener('click', function () {
    document.getElementById('resourceInputForm').style.display = 'none';
});

// Event listener for the close form button in the Total Omzet form
document.getElementById('closeTotalFormButton').addEventListener('click', function () {
    document.getElementById('totalInputForm').style.display = 'none';
});