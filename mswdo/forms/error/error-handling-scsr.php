<?php

// Error handling variables
$backgroundErr = $recommendationErr = "";

// scsr Required variables
$background = $recommendation = "";

// Error Counter
$countErrs = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Defining the Required Variables
  if (empty($_POST["background"])) {
    $backgroundErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $background = scsr_input($_POST["background"]);
  }

  if (empty($_POST["recommendation"])) {
    $recommendationErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $recommendation = scsr_input($_POST["recommendation"]);
  }
  
}

function scsr_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>