<?php
// include autoloader
session_start();
require_once 'dompdf/autoload.inc.php';

include "../db_connect.php";

$client_id = $_GET['client_id'];

$sql = "SELECT * FROM client c INNER JOIN client_general_details s, interview i WHERE s.client_id = $client_id && c.client_id = $client_id && i.client_id = $client_id";
$result = $con->query($sql);
$row = $result->fetch_assoc();

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id && fam_no = 1";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam1 = $result->fetch_assoc();
		
		}
		}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id && fam_no = 2";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam2 = $result->fetch_assoc();

		}
		}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id && fam_no = 3";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam3 = $result->fetch_assoc();

		}
		}		

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id && fam_no = 4";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam4 = $result->fetch_assoc();

		}
		}		

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id && fam_no = 5";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam5 = $result->fetch_assoc();

		}
		}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id && fam_no = 6";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam6 = $result->fetch_assoc();

		}
		}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id && fam_no = 7";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam7 = $result->fetch_assoc();

		}
		}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id && fam_no = 8";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam8 = $result->fetch_assoc();

		}
		}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id && fam_no = 9";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam9 = $result->fetch_assoc();

		}
		}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id && fam_no = 10";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam10 = $result->fetch_assoc();

		}
		}

// Query for Checkbox Civil Status

	if(isset($row['civil_status']) && ($row['civil_status'] !== 'single')) {
		
		$single = 'unchecked';
		
	} else {
		
		$single = 'checked';
	}
	
	if(isset($row['civil_status']) && ($row['civil_status'] !== 'married')) {
		
		$married = 'unchecked';
		
	} else {
		
		$married = 'checked';
	}
	
	if(isset($row['civil_status']) && ($row['civil_status'] !== 'other')) {
		
		$other = 'unchecked';
		
	} else {
		
		$other = 'checked';
	}
	
// Query for Checkbox Mode of Admission
  
	if(isset($row['admission']) && ($row['admission'] !== 'referral')) {
		
		$referral = 'unchecked';
		
	} else {
		
		$referral = 'checked';
	}
	
	if(isset($row['admission']) && ($row['admission'] !== 'walkin')) {
		
		$walkin = 'unchecked';
		
	} else {
		
		$walkin = 'checked';
	}

	// Replace 0 to empty
			if ($fam1['fam_age'] == 0) {
				$afam1 = " ";
			}
			else {
				$afam1 = $fam1['fam_age'];
			}
			
			if ($fam2['fam_age'] == 0) {
				$afam2 = " ";
			}
			else {
				$afam2 = $fam2['fam_age'];
			}
			
			if ($fam3['fam_age'] == 0) {
				$afam3 = " ";
			}
			else {
				$afam3 = $fam3['fam_age'];
			}	
			if ($fam4['fam_age'] == 0) {
				$afam4 = " ";
			}
			else {
				$afam4 = $fam4['fam_age'];
			}	
			if ($fam5['fam_age'] == 0) {
				$afam5 = " ";
			}
			else {
				$afam5 = $fam5['fam_age'];
			}
			if ($fam6['fam_age'] == 0) {
				$afam6 = " ";
			}
			else {
				$afam6 = $fam6['fam_age'];
			}
			if ($fam7['fam_age'] == 0) {
				$afam7 = " ";
			}
			else {
				$afam7 = $fam7['fam_age'];
			}
			if ($fam8['fam_age'] == 0) {
				$afam8 = " ";
			}
			else {
				$afam8 = $fam8['fam_age'];
			}
			if ($fam9['fam_age'] == 0) {
				$afam9 = " ";
			}
			else {
				$afam9 = $fam9['fam_age'];
			}
			if ($fam10['fam_age'] == 0) {
				$afam10 = " ";
			}
			else {
				$afam10 = $fam10['fam_age'];
			}


			
$name = $row['first_name'].'&nbsp;'.$row['middle_name'].'&nbsp;'.$row['last_name'];
$sign_name = $row['first_name'].'&nbsp;'.$row['last_name'];
$interview_date = date("m/d/Y", strtotime($row['interview_date']));  
$birthdate = date("m/d/Y", strtotime($row['date_of_birth']));
$bplace = $row['place_of_birth'];
$telephone = $row['telephone'];
$address = $row['address'];
$provincial_address = $row['provincial_address'];
$philhealth = $row['philhealth_no'];
$house = $row['house'];
$lot = $row['lot'];
$assestment = $row['assestment'];

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
        $pdf_filename = 'general_report';


$this_html ="
<!DOCTYPE html>
<html>
<title>Print General Intake</title>

<br>

<style>

@page { 
	margin: 0.5cm;
	margin-top: 0.1cm;
	margin-bottom: 0.1cm;
}

table {
    border-collapse: collapse;
}

table, td, th, tr {
    border: 1px solid black;
	height: 1px;
}

input[type=text] { 
	height: 17px; 
	border: 1px solid black;
}



.paddingClass{
    
    margin:10px;
    padding:5px;
}

  input {
    border: none;
    border-bottom: 1px solid black;
  }

input:focus {
  outline: none;
}

input.rightAligned {
text-align: right;
align: center;
}

input[type=checkbox]:before { 
font-family: DejaVu Sans; 
}

input[type=checkbox] { 
display: inline; 
}

input[type=radio] { display: inline; }
input[type=radio]:before { font-family: DejaVu Sans; }

</style>

	<center style='color: blue;'>
		<br><img src='images/dswd-logo.jpg' style='margin-right: 13%;' alt='images/dswd-logo' width='100' height='100' align='right' style='display: block; margin-left: 1% ; '>
			<img src='images/canaman-seal.png' style='margin-left: 13%;' alt='images/canaman-seal' width='100' height='100' align='left' style='display: block; margin-right: 1%;'>
			<h4 style='margin:0;'><b>Republic of the Philippines</b></h4>
			<h4 style='margin:0;'><b>Province of Camarines Sur</b></h4>
			<h4 style='margin:0;'><b>Municipality of Canaman</b></h4>
			<h4 style='margin:0;'><b>Tel. (054) 811-73-67</b></h4>
			<h4 style='margin:0; color: black'><b>Email:</b><i><u>mswdo_canaman@yahoo.com</u></i></h4><br>
			<h4 style='margin:0; color: red'><b>MUNICIPAL SOCIAL WELFARE AND DEVELOPMENT OFFICE</b></h4><br>
			<h4 style='margin:0; color: black'><b>Children in Conflict with the law</b></h4>
	</center>

	<p style='margin-left: 70%;'>Date Applied: <input style=' border: none; border-bottom: 1px solid black; width: 98px; text-align: center;' type='text' value=".$interview_date."></p>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Name' type='text' /><b>:</b>
	<input style='width: 300px; border: none; border-bottom: 1px solid black; text-align: center;' value='$name' type='text' />
	<input style='width: 30px; border: none;' type='text' value='Sex:' />
	<input style='width: 80px; border: none; border-bottom: 1px solid black; text-align: center;' value=".$row['sex']." type='text' />
	<input style='width: 30px; border: none;' type='text' value='Age:' />
	<input style='width: 70px; border: none; border-bottom: 1px solid black; text-align: center;' value=".$row['age']." type='text'  />
	<br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Date of Birth:' type='text' /><b>:</b>
	<input style='width: 120px; border: none; border-bottom: 1px solid black; text-align: center;' value='$birthdate' type='text' />
	<input style='width: 100px; border: none;' type='text' value='Birthplace:' />
	<input style='width: 310px; border: none; border-bottom: 1px solid black; text-align: center;' value='$bplace' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Present Address' /><b>:</b>
	<input style='width: 545px; border: none; border-bottom: 1px solid black; text-align: center;' value='$address' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 175px; border: none;' value='Educational Attainment:' type='text' /><b>:</b>
	<input style='width: 120px; border: none; border-bottom: 1px solid black; text-align: center;' value='$birthdate' type='text' />
	<input style='width: 100px; border: none;' type='text' value='Referred By:' />
	<input style='width: 265px; border: none; border-bottom: 1px solid black; text-align: center;' value='$bplace' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Type of Offense' type='text' /><b>:</b>
	<input style='width: 85px; border: none; border-bottom: 1px solid black; text-align: center;' value='' type='text' />
	<input style='width: 75px; border: none;' type='text' value='Committed:' />
	<input style='width: 85px; border: none; border-bottom: 1px solid black; text-align: center;' value='' type='text' />
	<input style='width: 40px; border: none;' type='text' value='When:' />
	<input style='width: 70px; border: none; border-bottom: 1px solid black; text-align: center;' value='' type='text'  />
	<input style='width: 40px; border: none;' type='text' value='Where:' />
	<input style='width: 100px; border: none; border-bottom: 1px solid black; text-align: center;' value='' type='text'  />
	<br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='To Whom:' type='text' /><b>:</b>
	<input style='width: 120px; border: none; border-bottom: 1px solid black; text-align: center;' value='$birthdate' type='text' />
	<input style='width: 140px; border: none;' type='text' value='Service Rendered:' />
	<input style='width: 270px; border: none; border-bottom: 1px solid black; text-align: center;' value='$bplace' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Disposition' /><b>:</b>
	<br>
	
</body>
</html>
";

$dompdf->loadHtml($this_html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'Portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
$new = str_replace(" ", "", $pdf_filename);
// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream($new,array("Attachment"=>0));
?>

