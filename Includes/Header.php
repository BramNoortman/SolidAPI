<?php
//most com
// Set the content type to JSON
header('Content-Type: application/json');

$jsonBody = json_decode(file_get_contents('php://input'));
