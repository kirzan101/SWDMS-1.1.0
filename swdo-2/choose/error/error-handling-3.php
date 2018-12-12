<?php

// Error handling variables
$firstnameErr = $middlenameErr = $lastnameErr = $sexErr = $bdayErr = $bplaceErr = $civilErr = $preaddErr = $barangayErr = "";
$proaddErr = $educErr = $skillErr = $incomeErr = $admissionErr = $family_headErr = $positionErr = "";

// Required variables
$firstname = $middlename = $lastname = $sex = $bday = $bplace = $civil = $preadd = $barangay = "";
$proadd = $educ = $skill = $income = $admission = $family_head = $position = "";

// Not Required variables
$religion = $tel = $philn = $reff1 = $reff2 = $house = $lot = $areff1 = $areff2 = $contactno = "";

// Error Counter
$countErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
$religion = ucfirst(strtolower($_POST["religion"]));
$tel = $_POST["tel"];
$philn = $_POST["philn"];
$reff1 = ucfirst(strtolower($_POST["reff1"]));
$reff2 = ucfirst(strtolower($_POST["reff2"]));
$house = ucfirst(strtolower($_POST["house"]));
$lot = ucfirst(strtolower($_POST["lot"]));
$areff1 = ucfirst(strtolower($_POST["areff1"]));
$areff2 = ucfirst(strtolower($_POST["areff2"]));
$contactno = $_POST["contactno"];
  
  // Defining the Required Variables
  if (empty($_POST["firstname"])) {
    $firstnameErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $firstname = user_input($_POST["firstname"]);
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
    $middlename = user_input($_POST["middlename"]);
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
    $lastname = user_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed"; 
	  $countErr = 1;
    }
  }

  if (empty($_POST["sex"])) {
    $sexErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $sex = user_input($_POST["sex"]);
  }


  if (empty($_POST["bday"])) {
    $bdayErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $bday = user_input($_POST["bday"]);
    // check if the input only contain date
	$date_arr  = explode('/', $bday);
    if (!checkdate($date_arr[0], $date_arr[1], $date_arr[2])) {
      $bdayErr = "Only Date input (MM/DD/YYYY)"; 
	  $countErr = 1;
    }
  }
  
  if (empty($_POST["bplace"])) {
    $bplaceErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $bplace = user_input($_POST["bplace"]);
  }


  if (empty($_POST["civil"])) {
    $civilErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $civil = user_input($_POST["civil"]);
  }


  if (empty($_POST["preadd"])) {
    $preaddErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $preadd = user_input($_POST["preadd"]);
  }
  
  if (empty($_POST["barangay"])) {
    $barangayErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $barangay = user_input($_POST["barangay"]);
  }
  
  if (empty($_POST["proadd"])) {
    $proaddErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $proadd = user_input($_POST["proadd"]);
  }
  
  if (empty($_POST["educ"])) {
    $educErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $educ = user_input($_POST["educ"]);
  }
  
  if (empty($_POST["skill"])) {
    $skillErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $skill = user_input($_POST["skill"]);
  }
  
  if (empty($_POST["income"])) {
    $incomeErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $income = user_input($_POST["income"]);
  }
  

}

function user_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>