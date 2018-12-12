<?php

// Error handling variables
$firstnameErr = $middlenameErr = $lastnameErr = $contactnoErr = $positionErr = $passwordErr = $repasswordErr = "";

// Required variables
$firstname = $middlename = $lastname = $contactno = $position = $passwords = $repassword = "";
		
// Error Counter
$countErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Defining the Required Variables
  if (empty($_POST["firstname"])) {
    $firstnameErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $firstname = profile_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed"; 
	  $countErr = 1;
    }
  }
    
  if (empty($_POST["middlename"])) {
    $middlenameErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $middlename = profile_input($_POST["middlename"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$middlename)) {
      $middlenameErr = "Only letters and white space allowed";
	  $countErr = 1;
    }
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $lastname = profile_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed"; 
	  $countErr = 1;
    }
  }

  if (empty($_POST["contactno"])) {
    $contactnoErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $contactno = profile_input($_POST["contactno"]);
  }
  
  if (empty($_POST["position"])) {
    $positionErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $position = profile_input($_POST["position"]);
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $passwords = profile_input($_POST["password"]);
  }
  
  if (empty($_POST["repassword"])) {
    $repasswordErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $repassword = profile_input($_POST["repassword"]);
  }
  
}

function profile_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>