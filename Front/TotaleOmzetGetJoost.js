// Fetch the data from the TotaleOmzetJoost.php file
fetch('../TotaleOmzetJoost.php')
    .then(response => response.json()) // Parse the response as JSON
    .then(data => {
        // Get the totaleOmzetGET paragraph
        const totaleOmzetGET = document.getElementById('totaleOmzetGET');

        // Check if the data contains an 'omzet' property
        if (data.omzet) {
            // If it does, prepend a "€" symbol to the 'omzet' value and set the text of the totaleOmzetGET paragraph
            // Use toFixed(2) to ensure two decimal places
            totaleOmzetGET.textContent = '€' + parseFloat(data.omzet).toFixed(2);
        } else {
            // If it doesn't, set the text of the totaleOmzetGET paragraph to the 'message' value
            totaleOmzetGET.textContent = data.message;
        }
    })
    .catch(error => {
        // Log any errors to the console
        console.error('Error:', error);
    });