<?php

// Include the database connection file
$conn = require 'Includes/DBconnection.php';

// Check if the request method is POST
if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get the 'omzet' value from the POST data
    $omzet = $_POST['omzet'];

    // Prepare a SQL statement to update the 'omzet' value in the 'totale_omzet' table where 'id' is 1
    $stmt = $conn->prepare("UPDATE totale_omzet SET omzet = ? WHERE id = 1");

    // Bind the 'omzet' value to the SQL statement
    $stmt->bind_param("s", $omzet);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // If the SQL statement was successful, return a JSON response with a message saying "Record updated successfully"
        echo json_encode(array("message" => "Record updated successfully"));
    } else {
        // If the SQL statement was not successful, return a JSON response with a message saying "Error updating record"
        echo json_encode(array("message" => "Error updating record"));
    }
} else {
    // If the request method is not POST, return a JSON response with a message saying "Invalid request method"
    echo json_encode(array("message" => "Invalid request method"));
}