<?php

// include de database connectie en header elements
require 'Includes/DBconnection.php';
require 'Includes/header.php';


if($_SERVER['REQUEST_METHOD'] == "GET") {

    // Assume the JSON body is already decoded and stored in $jsonBody
    $jsonBody = json_decode(file_get_contents('php://input'));

    // Ensure the JSON body contains the necessary id attribute
    if (isset($jsonBody->id)) {
        $unit = $conn->prepare("SELECT * FROM unit WHERE id = ? LIMIT 1");
        $unit->execute([$jsonBody->id, $jsonBody->naam, $jsonBody->locatie, $jsonBody->manager]);

        $unit = $unit->fetch(PDO::FETCH_ASSOC);

        if ($unit) {
            // Return the unit details if found
            echo json_encode(['unit_found' => $unit]);
        } else {
            echo json_encode(['unit_not_found']);
        }
   // } else {
        //echo json_encode(['error' => 'Invalid request, unit ID is missing']);
    }
}