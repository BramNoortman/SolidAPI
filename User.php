<?php

// Include the database connection file and the header file
$conn = require 'Includes/DBconnection.php';
require 'Includes/header.php';

// Check if the request method is GET
if($_SERVER['REQUEST_METHOD'] == "GET") {
    // Prepare a SQL statement to select 'voornaam', and 'achternaam' from the 'user' table
    $stmt = $conn->prepare("SELECT voornaam, achternaam FROM user");

    // Execute the SQL statement
    if (!$stmt->execute()) {
        // If the execution failed, return a JSON response with the error message
        echo json_encode(array("error" => $stmt->error));
        exit();
    }

    // Get the result of the SQL statement
    $result = $stmt->get_result();

    // If the result contains more than 0 rows, fetch all the data as an associative array and encode it as a JSON response
    if($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    } else {
        // If no rows were found, return a JSON response with a message saying "No users found"
        echo json_encode(array("message" => "No users found"));
    }
}