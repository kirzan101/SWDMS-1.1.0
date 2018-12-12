<?php

// Error handling variables
$typeErr = $committedErr = $whomErr = $whereErr = $dispositionErr = $referErr = $whenErr = $serviceErr = "";

// CICL Required variables
$type = $committed = $whom = $where = $disposition = $refer = $when = $service = "";

// Error Counter
$countErrs = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Defining the Required Variables
  if (empty($_POST["type"])) {
    $typeErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $type = cicl_input($_POST["type"]);
  }

  if (empty($_POST["refer"])) {
    $referErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $refer = cicl_input($_POST["refer"]);
  }
  
  if (empty($_POST["committed"])) {
    $committedErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $committed = cicl_input($_POST["committed"]);
  }
  
  if (empty($_POST["service"])) {
    $serviceErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $service = cicl_input($_POST["service"]);
  }
  
  if (empty($_POST["where"])) {
    $whereErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $where = cicl_input($_POST["where"]);
  }
  
  if (empty($_POST["when"])) {
    $whenErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $when = cicl_input($_POST["when"]);
  }
  
  if (empty($_POST["disposition"])) {
    $dispositionErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $disposition = cicl_input($_POST["disposition"]);
  }
  
  if (empty($_POST["whom"])) {
    $whomErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $whom = cicl_input($_POST["whom"]);
  }
  
}

function cicl_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>