<?php

// Get the request body
$body = file_get_contents('php://input');

// Try to decode the JSON body
$jsonBody = json_decode($body);
