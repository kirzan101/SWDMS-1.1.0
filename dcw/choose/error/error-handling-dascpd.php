<?php

// Error handling variables
$name_of_deceasedErr = $categoryErr = "";

// DASCPD Required variables
$name_of_deceased = $category = "";

// Error Counter
$countErrs = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Defining the Required Variables
  if (empty($_POST["name_of_deceased"])) {
    $name_of_deceasedErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $name_of_deceased = dascpd_input($_POST["name_of_deceased"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name_of_deceased)) {
      $name_of_deceasedErr = "Only letters and white space allowed"; 
	  $countErrs = 1;
    }
  }

  if (empty($_POST["category"])) {
    $categoryErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $category = dascpd_input($_POST["category"]);
  }

  if (empty($_POST["assestment"])) {
    $assestmentErr = "This field is REQUIRED";
  $countErrs = 1;
  } else {
    $assestment = user_input($_POST["assestment"]);
  }
  
}

function dascpd_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>