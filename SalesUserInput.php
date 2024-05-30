<?php
// Include the database connection and Header
$conn = require 'Includes/DBconnection.php';
require 'Includes/Header.php';

// Get the values from the form input
$unitName = $_POST['unitName'];
$omzet = $_POST['omzet'];

// Prepare the SQL statement to get the id of the unit
$stmtUnit = $conn->prepare("SELECT id FROM unit WHERE naam = ?");

// Bind the value and execute
$stmtUnit->bind_param("s", $unitName);
$stmtUnit->execute();

// Fetch the result and store the id in a variable
$resultUnit = $stmtUnit->get_result();
$unit = $resultUnit->fetch_assoc();

// If no unit is found, exit the script
if (!$unit) {
    exit;
}

$unitId = $unit['id'];

// Prepare the SQL statement to insert a new record into the sales_omzet table
$stmt = $conn->prepare("INSERT INTO sales_omzet (unit_Id, omzet) VALUES (?, ?)");

// Bind the values and execute
$stmt->bind_param("ss", $unitId, $omzet);
$stmt->execute();

// Close the statements and the connection
$stmt->close();
$stmtUnit->close();
$conn->close();

// After handling the POST request, redirect back to the original page
header('Location: ../SolidAPI/Front/index.html');
exit;