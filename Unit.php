<?php

// include the database connection and header elements
$conn = require 'Includes/DBconnection.php';
require 'Includes/Header.php';

// Check if the request method is GET
if($_SERVER['REQUEST_METHOD'] == "GET") {
    // Check if id is present in the GET request
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare SQL statement
        $stmt = $conn->prepare("SELECT * FROM unit WHERE id = ?");
        // Bind the provided 'id' to the SQL statement
        $stmt->bind_param("i", $id);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch data and encode it as JSON
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            echo json_encode($data);
        } else {
            echo json_encode(array("message" => "No record found with id: $id"));
        }
    } else {
        echo json_encode(array("message" => "No id provided"));
    }
}