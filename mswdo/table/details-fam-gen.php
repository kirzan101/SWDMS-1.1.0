<?php 

//family table inputs

//name
$name1 = $_POST["name1"];
$name2 = $_POST["name2"];
$name3 = $_POST["name3"];
$name4 = $_POST["name4"];
$name5 = $_POST["name5"];
$name6 = $_POST["name6"];
$name7 = $_POST["name7"];
$name8 = $_POST["name8"];
$name9 = $_POST["name9"];
$name10 = $_POST["name10"];

//age
$birthDate1 = date('m/d/Y', strtotime($_POST["birthdate1"])); // Declare variable for birthdate
$birthDate1 = explode("/", $birthDate1); // Split a string by a specified string into pieces
$age1 = (date("md", date("U", mktime(0, 0, 0, $birthDate1[0], $birthDate1[1], $birthDate1[2]))) > date("md") ? ((date("Y") - $birthDate1[2]) - 1) : (date("Y") - $birthDate1[2])); // Computes current date to inserted date 

$birthDate2 = date('m/d/Y', strtotime($_POST["birthdate2"])); // Declare variable for birthdate
$birthDate2 = explode("/", $birthDate2); // Split a string by a specified string into pieces
$age2 = (date("md", date("U", mktime(0, 0, 0, $birthDate2[0], $birthDate2[1], $birthDate2[2]))) > date("md") ? ((date("Y") - $birthDate2[2]) - 1) : (date("Y") - $birthDate2[2])); // Computes current date to inserted date

$birthDate3 = date('m/d/Y', strtotime($_POST["birthdate3"])); // Declare variable for birthdate
$birthDate3 = explode("/", $birthDate3); // Split a string by a specified string into pieces
$age3 = (date("md", date("U", mktime(0, 0, 0, $birthDate3[0], $birthDate3[1], $birthDate3[2]))) > date("md") ? ((date("Y") - $birthDate3[2]) - 1) : (date("Y") - $birthDate3[2])); // Computes current date to inserted date

$birthDate4 = date('m/d/Y', strtotime($_POST["birthdate4"])); // Declare variable for birthdate
$birthDate4 = explode("/", $birthDate4); // Split a string by a specified string into pieces
$age4 = (date("md", date("U", mktime(0, 0, 0, $birthDate4[0], $birthDate4[1], $birthDate4[2]))) > date("md") ? ((date("Y") - $birthDate4[2]) - 1) : (date("Y") - $birthDate4[2])); // Computes current date to inserted date

$birthDate5 = date('m/d/Y', strtotime($_POST["birthdate5"])); // Declare variable for birthdate
$birthDate5 = explode("/", $birthDate5); // Split a string by a specified string into pieces
$age5 = (date("md", date("U", mktime(0, 0, 0, $birthDate5[0], $birthDate5[1], $birthDate5[2]))) > date("md") ? ((date("Y") - $birthDate5[2]) - 1) : (date("Y") - $birthDate5[2])); // Computes current date to inserted date

$birthDate6= date('m/d/Y', strtotime($_POST["birthdate6"])); // Declare variable for birthdate
$birthDate6 = explode("/", $birthDate6); // Split a string by a specified string into pieces
$age6 = (date("md", date("U", mktime(0, 0, 0, $birthDate6[0], $birthDate6[1], $birthDate6[2]))) > date("md") ? ((date("Y") - $birthDate6[2]) - 1) : (date("Y") - $birthDate6[2])); // Computes current date to inserted date

$birthDate7 = date('m/d/Y', strtotime($_POST["birthdate7"])); // Declare variable for birthdate
$birthDate7 = explode("/", $birthDate7); // Split a string by a specified string into pieces
$age7 = (date("md", date("U", mktime(0, 0, 0, $birthDate7[0], $birthDate7[1], $birthDate7[2]))) > date("md") ? ((date("Y") - $birthDate7[2]) - 1) : (date("Y") - $birthDate7[2])); // Computes current date to inserted date

$birthDate8 = date('m/d/Y', strtotime($_POST["birthdate8"])); // Declare variable for birthdate
$birthDate8 = explode("/", $birthDate8); // Split a string by a specified string into pieces
$age8 = (date("md", date("U", mktime(0, 0, 0, $birthDate8[0], $birthDate8[1], $birthDate8[2]))) > date("md") ? ((date("Y") - $birthDate8[2]) - 1) : (date("Y") - $birthDate8[2])); // Computes current date to inserted date

$birthDate9 = date('m/d/Y', strtotime($_POST["birthdate9"])); // Declare variable for birthdate
$birthDate9 = explode("/", $birthDate9); // Split a string by a specified string into pieces
$age9 = (date("md", date("U", mktime(0, 0, 0, $birthDate9[0], $birthDate9[1], $birthDate9[2]))) > date("md") ? ((date("Y") - $birthDate9[2]) - 1) : (date("Y") - $birthDate9[2])); // Computes current date to inserted date

$birthDate10 = date('m/d/Y', strtotime($_POST["birthdate10"])); // Declare variable for birthdate
$birthDate10 = explode("/", $birthDate10); // Split a string by a specified string into pieces
$age10 = (date("md", date("U", mktime(0, 0, 0, $birthDate10[0], $birthDate10[1], $birthDate10[2]))) > date("md") ? ((date("Y") - $birthDate10[2]) - 1) : (date("Y") - $birthDate10[2])); // Computes current date to inserted date

//sex
$sex1 = $_POST["sex1"];
$sex2 = $_POST["sex2"];
$sex3 = $_POST["sex3"];
$sex4 = $_POST["sex4"];
$sex5 = $_POST["sex5"];
$sex6 = $_POST["sex6"];
$sex7 = $_POST["sex7"];
$sex8 = $_POST["sex8"];
$sex9 = $_POST["sex9"];
$sex10 = $_POST["sex10"];

//civil status
$civil1 = $_POST["civil1"];
$civil2 = $_POST["civil2"];
$civil3 = $_POST["civil3"];
$civil4 = $_POST["civil4"];
$civil5 = $_POST["civil5"];
$civil6 = $_POST["civil6"];
$civil7 = $_POST["civil7"];
$civil8 = $_POST["civil8"];
$civil9 = $_POST["civil9"];
$civil10 = $_POST["civil10"];

//relationship
$relation1 = $_POST["relation1"];
$relation2 = $_POST["relation2"];
$relation3 = $_POST["relation3"];
$relation4 = $_POST["relation4"];
$relation5 = $_POST["relation5"];
$relation6 = $_POST["relation6"];
$relation7 = $_POST["relation7"];
$relation8 = $_POST["relation8"];
$relation9 = $_POST["relation9"];
$relation10 = $_POST["relation10"];

//educational attainment
$educ1 = $_POST["educ1"];
$educ2 = $_POST["educ2"];
$educ3 = $_POST["educ3"];
$educ4 = $_POST["educ4"];
$educ5 = $_POST["educ5"];
$educ6 = $_POST["educ6"];
$educ7 = $_POST["educ7"];
$educ8 = $_POST["educ8"];
$educ9 = $_POST["educ9"];
$educ10 = $_POST["educ10"];

//skills/ocupation
$skill1 = $_POST["skill1"];
$skill2 = $_POST["skill2"];
$skill3 = $_POST["skill3"];
$skill4 = $_POST["skill4"];
$skill5 = $_POST["skill5"];
$skill6 = $_POST["skill6"];
$skill7 = $_POST["skill7"];
$skill8 = $_POST["skill8"];
$skill9 = $_POST["skill9"];
$skill10 = $_POST["skill10"];

//income
$income1 = $_POST["income1"];
$income2 = $_POST["income2"];
$income3 = $_POST["income3"];
$income4 = $_POST["income4"];
$income5 = $_POST["income5"];
$income6 = $_POST["income6"];
$income7 = $_POST["income7"];
$income8 = $_POST["income8"];
$income9 = $_POST["income9"];
$income10 = $_POST["income10"];

//birthdate
$birthdate1 = date('Y-m-d', strtotime($_POST["birthdate1"])); // Change the format from m-d-Y to Y-m-d $_POST["birthdate1"];
$birthdate2 = date('Y-m-d', strtotime($_POST["birthdate2"])); // Change the format from m-d-Y to Y-m-d $_POST["birthdate1"];
$birthdate3 = date('Y-m-d', strtotime($_POST["birthdate3"])); // Change the format from m-d-Y to Y-m-d $_POST["birthdate1"];
$birthdate4 = date('Y-m-d', strtotime($_POST["birthdate4"])); // Change the format from m-d-Y to Y-m-d $_POST["birthdate1"];
$birthdate5 = date('Y-m-d', strtotime($_POST["birthdate5"])); // Change the format from m-d-Y to Y-m-d $_POST["birthdate1"];
$birthdate6 = date('Y-m-d', strtotime($_POST["birthdate6"])); // Change the format from m-d-Y to Y-m-d $_POST["birthdate1"];
$birthdate7 = date('Y-m-d', strtotime($_POST["birthdate7"])); // Change the format from m-d-Y to Y-m-d $_POST["birthdate1"];
$birthdate8 = date('Y-m-d', strtotime($_POST["birthdate8"])); // Change the format from m-d-Y to Y-m-d $_POST["birthdate1"];
$birthdate9 = date('Y-m-d', strtotime($_POST["birthdate9"])); // Change the format from m-d-Y to Y-m-d $_POST["birthdate1"];
$birthdate10 = date('Y-m-d', strtotime($_POST["birthdate10"])); // Change the format from m-d-Y to Y-m-d $_POST["birthdate1"];

?>