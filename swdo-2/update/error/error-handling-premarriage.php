<?php

// Male inputs
// Error handling variables
$firstnamemErr = $middlenamemErr = $lastnamemErr = $sexmErr = $bdaymErr = $bplacemErr = $civilmErr = $preaddmErr = $barangaymErr = "";
$proaddmErr = $educmErr = $skillmErr = $incomemErr = $mincomemErr = $afaddmErr = $family_headmErr = $positionmErr = "";

// Not Required variables
$religionm = $telm = $philnm = $contactnom = "";

// Female inputs
// Error handling variables
$firstnamefErr = $middlenamefErr = $lastnamefErr = $sexfErr = $bdayfErr = $bplacefErr = $civilfErr = $preaddfErr = $barangayfErr = "";
$proaddfErr = $educfErr = $skillfErr = $incomefErr = $mincomefErr = $afaddfErr = $family_headfErr = $positionfErr = "";

// Date of Marriage
$marriage_dateErr = "";

// Not Required variables
$religionf = $telf = $philnf = $contactnof = "";

// Error Counter
$countErrs = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Male Inputs
	
$religionm = ucfirst(strtolower($_POST["religionm"]));
$telm = $_POST["telm"];
$philnm = $_POST["philnm"];
$contactnom = $_POST["contactnom"];
  
  // Defining the Required Variables
  if (empty($_POST["firstnamem"])) {
    $firstnamemErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $firstnamem = premarriage_input($_POST["firstnamem"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstnamem)) {
      $firstnamemErr = "Only letters and white space allowed"; 
	  $countErrs = 1;
    }
  }
    
  if (empty($_POST["middlenamem"])) {
    $middlenamemErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $middlenamem = premarriage_input($_POST["middlenamem"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$middlenamem)) {
      $middlenamemErr = "Only letters and white space allowed";
	  $countErrs = 1;
    }
  }

  if (empty($_POST["lastnamem"])) {
    $lastnamemErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $lastnamem = premarriage_input($_POST["lastnamem"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastnamem)) {
      $lastnamemErr = "Only letters and white space allowed"; 
	  $countErrs = 1;
    }
  }

  if (empty($_POST["sexm"])) {
    $sexmErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $sexm = premarriage_input($_POST["sexm"]);
  }


  if (empty($_POST["bdaym"])) {
    $bdaymErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $bdaym = premarriage_input($_POST["bdaym"]);
    // check if the input only contain date
	$date_arr  = explode('/', $bdaym);
    if (!checkdate($date_arr[0], $date_arr[1], $date_arr[2])) {
      $bdaymErr = "Only Date input (MM/DD/YYYY)"; 
	  $countErrs = 1;
    }
  }
  
  if (empty($_POST["bplacem"])) {
    $bplacemErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $bplacem = premarriage_input($_POST["bplacem"]);
  }


  if (empty($_POST["civilm"])) {
    $civilmErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $civilm = premarriage_input($_POST["civilm"]);
  }


  if (empty($_POST["preaddm"])) {
    $preaddmErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $preaddm = premarriage_input($_POST["preaddm"]);
  }
  
  if (empty($_POST["barangaym"])) {
    $barangaymErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $barangaym = premarriage_input($_POST["barangaym"]);
  }
  
  if (empty($_POST["proaddm"])) {
    $proaddmErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $proaddm = premarriage_input($_POST["proaddm"]);
  }
  
  if (empty($_POST["educm"])) {
    $educmErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $educm = premarriage_input($_POST["educm"]);
  }
  
  if (empty($_POST["skillm"])) {
    $skillmErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $skillm = premarriage_input($_POST["skillm"]);
  }
  
  if (empty($_POST["incomem"])) {
    $incomemErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $incomem = premarriage_input($_POST["incomem"]);
  }
  
  if (empty($_POST["mincomem"])) {
    $mincomemErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $mincomem = premarriage_input($_POST["mincomem"]);
  }
  
  if (empty($_POST["afaddm"])) {
    $afaddmErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $afaddm = premarriage_input($_POST["afaddm"]);
  }
  
  // Female Inputs
  
$religionf = ucfirst(strtolower($_POST["religionf"]));
$telf = $_POST["telf"];
$philnf = $_POST["philnf"];
$contactnof = $_POST["contactnof"];
  
  // Defining the Required Variables
  if (empty($_POST["firstnamef"])) {
    $firstnamefErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $firstnamef = premarriage_input($_POST["firstnamef"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstnamef)) {
      $firstnamefErr = "Only letters and white space allowed"; 
	  $countErrs = 1;
    }
  }
    
  if (empty($_POST["middlenamef"])) {
    $middlenamefErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $middlenamef = premarriage_input($_POST["middlenamef"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$middlenamef)) {
      $middlenamefErr = "Only letters and white space allowed";
	  $countErrs = 1;
    }
  }

  if (empty($_POST["lastnamef"])) {
    $lastnamefErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $lastnamef = premarriage_input($_POST["lastnamef"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastnamef)) {
      $lastnamefErr = "Only letters and white space allowed"; 
	  $countErrs = 1;
    }
  }

  if (empty($_POST["sexf"])) {
    $sexfErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $sexf = premarriage_input($_POST["sexf"]);
  }


  if (empty($_POST["bdayf"])) {
    $bdayfErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $bdayf = premarriage_input($_POST["bdayf"]);
    // check if the input only contain date
	$date_arr  = explode('/', $bdayf);
    if (!checkdate($date_arr[0], $date_arr[1], $date_arr[2])) {
      $bdayfErr = "Only Date input (MM/DD/YYYY)"; 
	  $countErrs = 1;
    }
  }
  
  if (empty($_POST["bplacef"])) {
    $bplacefErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $bplacef = premarriage_input($_POST["bplacef"]);
  }


  if (empty($_POST["civilf"])) {
    $civilfErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $civilf = premarriage_input($_POST["civilf"]);
  }


  if (empty($_POST["preaddf"])) {
    $preaddfErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $preaddf = premarriage_input($_POST["preaddf"]);
  }
  
  if (empty($_POST["barangayf"])) {
    $barangayfErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $barangayf = premarriage_input($_POST["barangayf"]);
  }
  
  if (empty($_POST["proaddf"])) {
    $proaddfErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $proaddf = premarriage_input($_POST["proaddf"]);
  }
  
  if (empty($_POST["educf"])) {
    $educfErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $educf = premarriage_input($_POST["educf"]);
  }
  
  if (empty($_POST["skillf"])) {
    $skillfErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $skillf = premarriage_input($_POST["skillf"]);
  }
  
  if (empty($_POST["incomef"])) {
    $incomefErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $incomef = premarriage_input($_POST["incomef"]);
  }
  
  if (empty($_POST["mincomef"])) {
    $mincomefErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $mincomef = premarriage_input($_POST["mincomef"]);
  }
  
  if (empty($_POST["afaddf"])) {
    $afaddfErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $afaddf = premarriage_input($_POST["afaddf"]);
  }
  
  // Date of Marriage
  
  if (empty($_POST["marriage_date"])) {
    $marriage_dateErr = "This field is REQUIRED";
	$countErrs = 1;
  } else {
    $marriage_date = premarriage_input($_POST["marriage_date"]);
    // check if the input only contain date
	$date_arr  = explode('/', $marriage_date);
    if (!checkdate($date_arr[0], $date_arr[1], $date_arr[2])) {
      $marriage_date = "Only Date input (MM/DD/YYYY)"; 
	  $countErrs = 1;
    }
  }

}

function premarriage_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>