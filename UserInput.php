<?php
// post data from the form to the database

// Include the database connection and Header
$conn = require 'Includes/DBconnection.php';
require 'Includes/Header.php';

// prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO sales (unitId, omzet, userId) VALUES (?, ?, ?)");

// bind the values and execute
$stmt->bind_param("sss", $_POST['unitId'], $_POST['omzet'], $_POST['userId']);

// execute the statement and check if it was successful
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
