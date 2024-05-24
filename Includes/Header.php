<?php

// Set the content type to JSON
header('Content-Type: application/json');

$jsonBody = json_decode(file_get_contents('php://input'));

//if(file_exists("php://input"))
//{
  //  echo json_encode("File does not exist");
//}
