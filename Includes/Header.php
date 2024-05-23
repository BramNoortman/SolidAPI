<?php

// Set the content type to JSON
header('Content-Type: application/json');

// Function to handle API responses
function sendResponse($status, $data) {
    http_response_code($status);
    echo json_encode($data);
    exit;
}

// Example of handling a GET request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Handle GET request
    sendResponse(200, ['message' => 'GET request successful']);
}

// Example of handling a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle POST request
    sendResponse(200, ['message' => 'POST request successful']);
}

// Default response for unsupported methods
sendResponse(405, ['error' => 'Method Not Allowed']);