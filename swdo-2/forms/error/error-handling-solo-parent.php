<?php

// Error handling variables
$needsErr = $classificationErr = $resourcesErr = $incomemErr =  "";

// Solo Parent ID Required variables
$needs = $classification = $resources = $incomem = "";

// Error Counter
$countErrs = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Defining the Required Variables
  if (empty($_POST["needs"]) OR $_POST["needs"] == '') {
    $needsErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $needs = solo_input($_POST["needs"]);
  }

  if (empty($_POST["classification"]) OR $_POST["classification"] == '' ) {
    $classificationErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $classification = solo_input($_POST["classification"]);
  }
  
  if (empty($_POST["resources"]) OR $_POST["resources"] == '' ) {
    $resourcesErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $resources = solo_input($_POST["resources"]);
  }
  
  if (empty($_POST["incomem"])) {
    $incomemErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $incomem = solo_input($_POST["incomem"]);
  }
  
}

function solo_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>