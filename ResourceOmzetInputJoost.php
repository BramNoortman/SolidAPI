<?php
// post data from the form to the database

// Include the database connection and Header
$conn = require 'Includes/DBconnection.php';
require 'Includes/Header.php';

// Hardcode the unitId as 1 (Finance) and get the userName and omzet from the POST request
$unitId = 1;
$userName = $_POST['userName'];
$omzet = $_POST['omzet'];

// prepare the SQL statement to get the id of the user
$stmtUser = $conn->prepare("SELECT id FROM user WHERE voornaam = ? AND unit_id = ?");

// bind the values and execute
$stmtUser->bind_param("si", $userName, $unitId);
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
$stmt->bind_param("iss", $unitId, $omzet, $userId);

// execute the statement and check if it was successful
$stmt->execute();

$stmt->close();
$stmtUser->close();
$conn->close();

// After handling the POST request, redirect back to the original page
header('Location: ../SolidAPI/Front/index.php');
exit;