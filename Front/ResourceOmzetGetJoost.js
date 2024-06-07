// Fetch the data from the ResourceOmzet.php file
fetch('../ResourceOmzet.php')
    .then(response => response.json()) // Parse the response as JSON
    .then(users => {
        // Get the element where you want to display the users
        const userList = document.getElementById('userList');

        // Iterate over the users
        users.forEach(user => {
            // Create a new list item for each user
            const li = document.createElement('li');

            // Set the text of the list item to the user's information
            li.textContent = `${user.voornaam} ${user.achternaam}: €${parseFloat(user.total_omzet).toFixed(2)}`;

            // Append the list item to the user list
            userList.appendChild(li);
        });
    })
    .catch(error => {
        // Log any errors to the console
        console.error('Error:', error);
    });