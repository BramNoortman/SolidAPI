<?php

// Include the database connection file
$conn = require 'Includes/DBconnection.php';
require 'Includes/Header.php';

// Check if the request method is GET
if($_SERVER['REQUEST_METHOD'] == "GET") {
    // Check if an 'id' is provided in the GET parameters
    if(isset($_GET['id'])) {
        // Store the 'id' in a variable
        $id = $_GET['id'];

        // Prepare a SQL statement to select 'omzet' from the 'totale_omzet' table and 'naam', 'locatie', 'manager' from the 'unit' table
        // The 'totale_omzet' table is joined with the 'unit' table based on the 'unit_Id'
        // The selection is filtered by the 'id' in the 'totale_omzet' table which should match the provided 'id'
        $stmt = $conn->prepare("SELECT totale_omzet.omzet, unit.naam, unit.locatie, unit.manager FROM totale_omzet INNER JOIN unit ON totale_omzet.unit_Id = unit.id WHERE totale_omzet.id = ?");
        // Bind the provided 'id' to the SQL statement
        $stmt->bind_param("i", $id);

        // Execute the SQL statement
        $stmt->execute();

        // Get the result of the SQL statement
        $result = $stmt->get_result();

        // If the result contains more than 0 rows, fetch the data as an associative array and encode it as a JSON response
        if($result->num_rows > 0) {
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
}