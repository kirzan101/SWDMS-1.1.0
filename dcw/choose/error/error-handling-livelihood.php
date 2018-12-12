<?php

// Error handling variables
$choice1Err = $choice2Err =  $choice3Err = $startupErr = "";

// livelihood Required variables
$choice1 = $choice2 =  $choice3 = $startup = "";

// Error Counter
$countErrs = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Defining the Required Variables
  
   if (!empty($_POST["choice1"]) AND !empty($_POST["choice2"]) AND !empty($_POST["choice3"]) AND !empty($_POST["startup"])) {
    $choice1Err = "Only one service";
	$choice2Err = "Only one service";
	$choice3Err = "Only one service";
	$startupErr = "Only one service";
	$countErrs = 1;
  } else {
  
  if (empty($_POST["choice1"]) AND empty($_POST["choice2"]) AND empty($_POST["choice3"]) AND !empty($_POST["startup"])) {
    $choice1 = liivelihood_input($_POST["choice1"]);
	$choice2 = liivelihood_input($_POST["choice2"]);
	$choice3 = liivelihood_input($_POST["choice3"]);
	$startup = liivelihood_input($_POST["startup"]);
  } elseif (!empty($_POST["choice1"]) AND !empty($_POST["choice2"]) AND !empty($_POST["choice3"]) AND empty($_POST["startup"])) {
    $choice1 = liivelihood_input($_POST["choice1"]);
	$choice2 = liivelihood_input($_POST["choice2"]);
	$choice3 = liivelihood_input($_POST["choice3"]);
	$startup = liivelihood_input($_POST["startup"]);
  } else {
	$choice1Err = "This field is REQUIRED";
	$choice2Err = "This field is REQUIRED";
	$choice3Err = "This field is REQUIRED";
	$startupErr = "This field is REQUIRED";
	$countErrs = 1;
  }
  
  }
}

function liivelihood_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>