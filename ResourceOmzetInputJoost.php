<?php

// Step 1: Include your database connection
$conn = require 'Includes/DBconnection.php';
require 'Includes/Header.php';

// Step 2: Retrieve the data sent by the JavaScript
$unitId = $_POST['unitId'];
$omzet = $_POST['omzet'];
$userName = $_POST['userName'];

// Split the username into voornaam and achternaam
list($voornaam, $achternaam) = explode(' ', $userName);

// Step 3: Prepare a SQL query to get the user ID
$stmt = $conn->prepare("SELECT id FROM user WHERE voornaam = ? AND achternaam = ?");
$stmt->bind_param("ss", $voornaam, $achternaam);

// Step 4: Execute the query and fetch the result
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    $userId = $user['id'];

    // Step 5: Prepare a SQL query to insert the data into the resource_omzet table
    $stmt = $conn->prepare("INSERT INTO resource_omzet (unit_Id, omzet, user_Id) VALUES (?, ?, ?)");
    $stmt->bind_param("ids", $unitId, $omzet, $userId);

    // Step 6: Execute the insert query
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data";
    }
} else {
    echo "User not found";
}

$stmt->close();
$conn->close();
?>