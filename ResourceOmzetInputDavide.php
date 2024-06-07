<?php
// post data from the form to the database

// Include the database connection and Header
$conn = require 'Includes/DBconnection.php';
require 'Includes/header.php';

// Hardcode the unitName as "Eindhoven" and get the userName and omzet from the POST request
$unitName ="Eindhoven";
$userName = $_POST['userName'];
$omzet = $_POST['omzet'];

// prepare the SQL statements to get the ids of the unit and user
$stmtUnit = $conn->prepare("SELECT id FROM unit WHERE naam = ?");
$stmtUser = $conn->prepare("SELECT id FROM user WHERE voornaam = ?");

// bind the values and execute
$stmtUnit->bind_param("s", $unitName);
$stmtUnit->execute();

// fetch the results and store the ids in variables
$resultUnit = $stmtUnit->get_result();
$unit = $resultUnit->fetch_assoc();

if (!$unit) {
    exit;
}

$unitId = $unit['id'];

// Now that we've fetched all the results of the $stmtUnit query, we can execute the $stmtUser query
$stmtUser->bind_param("s", $userName);
$stmtUser->execute();

$resultUser = $stmtUser->get_result();
$user = $resultUser->fetch_assoc();

if (!$user) {
    exit;
}

$userId = $user['id'];

// prepare the SQL statement to insert a new record into the resource_omzet table
// Ensure that the column names match with your database schema
$stmt = $conn->prepare("INSERT INTO resource_omzet (unit_Id, omzet, user_Id) VALUES (?, ?, ?)");

// bind the values and execute
$stmt->bind_param("sss", $unitId, $omzet, $userId);

// execute the statement and check if it was successful
$stmt->execute();

$stmt->close();
$stmtUnit->close();
$stmtUser->close();
$conn->close();

// After handling the POST request, redirect back to the original page
header('Location: ../SolidAPI/Front/index.php');
exit;