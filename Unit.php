<?php

// include de database connectie en header elements
require 'Includes/DBconnection.php';
require 'Includes/header.php';


if($_SERVER['REQUEST_METHOD'] == "GET") {

    $Unit = $conn->prepare("SELECT * FROM unit WHERE Id = ? LIMIT 1");
    $Unit->execute([$jsonBody->Id]);

    $Unit = $Unit->fetch(PDO::FETCH_ASSOC);

    if($Unit){
        $Unitfetch = $conn->prepare("SELECT * FROM unit(Naam, Locatie, Manager)values( ?, ?, ? )");
        $Unitfetch->execute([$jsonBody->Naam, $jsonBody->Locatie, $jsonBody->Manager]);
        echo json_encode(['unit_found']);
    }
    else {
        echo json_encode(['unit_not_found']);
    }
}