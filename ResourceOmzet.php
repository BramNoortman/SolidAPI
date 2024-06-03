<?php

// Include the database connection file
$conn = require 'Includes/DBconnection.php';
require 'Includes/Header.php';

// Prepare a SQL statement to select 'voornaam', 'achternaam' and SUM of 'omzet' from the 'user' table
// The 'resource_omzet' table is left joined with the 'user' table based on the 'user_Id'
// The result is grouped by 'user_Id' and ordered by the 'voornaam' in ascending order
$stmt = $conn->prepare("SELECT user.voornaam, user.achternaam, COALESCE(ROUND(SUM(resource_omzet.omzet), 2), 0) as total_omzet FROM user LEFT JOIN resource_omzet ON resource_omzet.user_Id = user.id GROUP BY user.id ORDER BY user.voornaam ASC");

// Execute the SQL statement
$stmt->execute();

// Get the result of the SQL statement
$result = $stmt->get_result();

// Initialize an empty array to store the users
$users = array();

// If the result contains more than 0 rows, fetch the data as an associative array and store it in the users array
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Encode the users array as a JSON response
echo json_encode($users);