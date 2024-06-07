// Fetch the data from the SalesOmzetJoost.php file
fetch('../SalesOmzetJoost.php')
    .then(response => response.json()) // Parse the response as JSON
    .then(data => {
        // Get the salesOmzetGET paragraph
        const salesOmzetGET = document.getElementById('salesOmzetGET');

        // Check if the data contains an 'omzet' property
        if (data.omzet) {
            // If it does, prepend a "€" symbol to the 'omzet' value and set the text of the salesOmzetGET paragraph
            // Use toFixed(2) to ensure two decimal places
            salesOmzetGET.textContent = '€' + parseFloat(data.omzet).toFixed(2);
        } else {
            // If it doesn't, set the text of the salesOmzetGET paragraph to the 'message' value
            salesOmzetGET.textContent = data.message;
        }
    })
    .catch(error => {
        // Log any errors to the console
        console.error('Error:', error);
    });