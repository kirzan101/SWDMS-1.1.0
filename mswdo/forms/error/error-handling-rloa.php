<?php

// Error handling variables
$referral_letter_detailsErr = $referral_detailsErr = "";

// DASCPD Required variables
$referral_letter_details = $referral_details = "";

// Error Counter
$countErrs = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Defining the Required Variables
  if (empty($_POST["referral_details"])) {
    $referral_detailsErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $referral_details = rloa_input($_POST["referral_details"]);
  }

  if (empty($_POST["referral_letter_details"]) OR $_POST["referral_letter_details"] == '' ) {
    $referral_letter_detailsErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $referral_letter_details = rloa_input($_POST["referral_letter_details"]);
  }
  
}

function rloa_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>