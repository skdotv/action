<?php

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "http://www.kimonolabs.com/api/e45oypq8?apikey=xxxx");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $parsed_json = curl_exec($ch);
// $parsed_json = json_decode($parsed_json);

// foreach($parsed_json->results->collection1 as $collection){
//     echo $collection->title->text . '<br>';
//     echo $collection->title->href . '<br>';
//     echo $collection->posted . '<br><br>';
// }

// curl_close($ch);

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