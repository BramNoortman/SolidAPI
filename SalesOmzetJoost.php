<?php

// Include the database connection file and the header file
$conn = require 'Includes/DBconnection.php';
require 'Includes/header.php';

// Check if the request method is GET
if($_SERVER['REQUEST_METHOD'] == "GET") {
    // Hardcode the 'id' to be 1
    $id = 1;

        // Prepare a SQL statement to select 'omzet' from the 'sales_omzet' table where 'id' matches the provided 'id'
        $stmt = $conn->prepare("SELECT omzet FROM sales_omzet WHERE id = ?");

        // Bind the provided 'id' to the SQL statement
        $stmt->bind_param("i", $id);

        // Execute the SQL statement
        $stmt->execute();

        // Get the result of the SQL statement
        $result = $stmt->get_result();

        // If the result contains more than 0 rows, fetch the data as an associative array and encode it as a JSON response
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            echo json_encode($data);
        } else {
            // If no rows were found, return a JSON response with a message saying "No record found with id: $id"
            echo json_encode(array("message" => "No record found with id: $id"));
        }
    } else {
        // If no 'id' was provided, return a JSON response with a message saying "No id provided"
        echo json_encode(array("message" => "No id provided"));
}