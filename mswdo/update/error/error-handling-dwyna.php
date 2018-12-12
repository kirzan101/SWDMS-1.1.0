<?php

// Error handling variables
$typeErr = $perpetratorErr = $whereErr = $dispositionErr = $parentErr = $whenErr = $serviceErr = "";

// dwyna Required variables
$type = $perpetrator = $where = $disposition = $parent = $when = $service = "";

// Error Counter
$countErrs = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Defining the Required Variables
  if (empty($_POST["type"])) {
    $typeErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $type = dwyna_input($_POST["type"]);
  }

  if (empty($_POST["parent"])) {
    $parentErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $parent = dwyna_input($_POST["parent"]);
  }
  
  if (empty($_POST["service"])) {
    $serviceErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $service = dwyna_input($_POST["service"]);
  }
  
  if (empty($_POST["where"])) {
    $whereErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $where = dwyna_input($_POST["where"]);
  }
  
  if (empty($_POST["when"])) {
    $whenErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $when = dwyna_input($_POST["when"]);
  }
  
  if (empty($_POST["disposition"])) {
    $dispositionErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $disposition = dwyna_input($_POST["disposition"]);
  }
  
  if (empty($_POST["perpetrator"])) {
    $perpetratorErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $perpetrator = dwyna_input($_POST["perpetrator"]);
  }
  
}

function dwyna_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>