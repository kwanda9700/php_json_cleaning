<?php 

  $ch = curl_init('https://coderbyte.com/api/challenges/json/json-cleaning');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  $data = curl_exec($ch);

  $items = json_decode($data, true);
  
  function cleanArray(array $value) {
    $i = [];
    foreach($value as $key => $x) {
      if($value[$key] != "" && $value[$key] != "N/A" && $value[$key] != "-") {
        $i[$key] = $x;
      }
    }
    return $i;
  }

  if ($items["age"] === "" || $items["age"] === "N/A" || $items["age"] === null || $items["age"] === "-") {
    unset($items["age"]);
  }
  if($items["DOB"] === "" || $items["DOB"] === "N/A" || $items["DOB"] === null || $items["DOB"] === "-") {
    unset($items["DOB"]);
  }

  $items["name"] = cleanArray($items["name"]);
  $items["hobbies"] = cleanArray($items["hobbies"]);
  $items["education"] = cleanArray($items["education"]);
  curl_close($ch);

print_r(json_encode($items));

?>
