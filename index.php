<?php


$method = $_SERVER['REQUEST_METHOD']
if ($method = "POST"){
  $requestBody = file_get_contents('php://input');
  $json =  json_decode($requestBody);

  $text = $json->result->parameters->colgate;

  switch ($text) {
    case 'hi':
        $speech = "hi , Nice to meet You";
        break;
    case 'bye':
        $speech = "bye ,good Night";
      break;
    case 'data':
    $speech = "Colgate data is data";
      # code...
      break;
    default:
    $speech = "Sorry, i didnt get that. Please ask me something related to Colgate data. Thank you";
      # code...
      break;
  }

  $response = new \stdClass();
  $response->speech = "";
  $response->displayText = "";
  $response->source = "webhook";
  echo json_encode($response);
}
else
{
  echo "Method not allowed";
}


}
 


?>