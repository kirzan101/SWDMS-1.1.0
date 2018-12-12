<?php
// include autoloader
session_start();
require_once 'dompdf/autoload.inc.php';

include "../db_connect.php";

$client_id = $_GET['client_id'];
$count_no = $_GET['count_no'];

$sql = "SELECT * FROM client c INNER JOIN client_general_details s, interview i WHERE i.interview_id = s.interview_id && s.client_id = $client_id && c.client_id = $client_id && i.client_id = $client_id && s.client_general_detail_id = $count_no";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$worker_id = $row['worker_id'];
$interview_id = $row['interview_id'];


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
		
if($con->query($sql)){

			$sql =  "SELECT * FROM workers WHERE worker_id = $worker_id";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$worker = $result->fetch_assoc();
			
			$worker_name = $worker['first_name'].'&nbsp;'.$worker['last_name'];

		}
		}
		
if($con->query($sql)){
	
			$serviceno = $row['client_general_detail_id'];

			$sql =  "SELECT * FROM aics_counter WHERE interview_id = $interview_id";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$aics = $result->fetch_assoc();
			
			 $controlno = $aics['aics_counter_id']; 
			// $controlno = str_pad($aics['aics_counter_id'], 6, "0", STR_PAD_LEFT);
		}	else {
			$controlno = "";
		}
}

if (empty($controlno)) {
	$controlno = str_pad($serviceno, 6, "0", STR_PAD_LEFT);
} else {
	$controlno = str_pad($controlno, 6, "0", STR_PAD_LEFT);
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
  
	if($row['admission'] == 'referral') {
		
		$admission = 'Referral';
		
	} else if ($row['admission'] == 'walkin') {
		
		$admission = 'Walk-in';
		
	} else {
		
		$walkin = 'error';
	}

	// Replace 0 to empty
			if ($fam1['fam_age'] == 0 OR $fam1['birthdates'] == '1970-01-01') {
				$afam1 = " ";
			}
			else {
				$afam1 = $fam1['fam_age'];
			}
			
			if ($fam2['fam_age'] == 0 OR $fam2['birthdates'] == '1970-01-01') {
				$afam2 = " ";
			}
			else {
				$afam2 = $fam2['fam_age'];
			}
			
			if ($fam3['fam_age'] == 0 OR $fam3['birthdates'] == '1970-01-01') {
				$afam3 = " ";
			}
			else {
				$afam3 = $fam3['fam_age'];
			}	
			if ($fam4['fam_age'] == 0 OR $fam4['birthdates'] == '1970-01-01') {
				$afam4 = " ";
			}
			else {
				$afam4 = $fam4['fam_age'];
			}	
			if ($fam5['fam_age'] == 0 OR $fam5['birthdates'] == '1970-01-01') {
				$afam5 = " ";
			}
			else {
				$afam5 = $fam5['fam_age'];
			}
			if ($fam6['fam_age'] == 0 OR $fam6['birthdates'] == '1970-01-01') {
				$afam6 = " ";
			}
			else {
				$afam6 = $fam6['fam_age'];
			}
			if ($fam7['fam_age'] == 0 OR $fam7['birthdates'] == '1970-01-01') {
				$afam7 = " ";
			}
			else {
				$afam7 = $fam7['fam_age'];
			}
			if ($fam8['fam_age'] == 0 OR $fam8['birthdates'] == '1970-01-01') {
				$afam8 = " ";
			}
			else {
				$afam8 = $fam8['fam_age'];
			}
			if ($fam9['fam_age'] == 0OR $fam9['birthdates'] == '1970-01-01') {
				$afam9 = " ";
			}
			else {
				$afam9 = $fam9['fam_age'];
			}
			if ($fam10['fam_age'] == 0 OR $fam10['birthdates'] == '1970-01-01') {
				$afam10 = " ";
			}
			else {
				$afam10 = $fam10['fam_age'];
			}


			
$name = $row['first_name'].'&nbsp;'.$row['middle_name'].'&nbsp;'.$row['last_name'];
$sign_name = $row['first_name'].'&nbsp;'.$row['last_name'];
$interview_date = date("m/d/Y", strtotime($row['interview_date']));  
$birthdate = date("M d, Y", strtotime($row['date_of_birth']));
$bplace = $row['place_of_birth'];
$telephone = $row['telephone'];
$address = $row['address'];
$provincial_address = $row['provincial_address'];
$philhealth = $row['philhealth_no'];
$house = $row['house'];
$lot = $row['lot'];
$assestment = ucfirst($row['assestment']);
$religion = $row['religion'];
$educational = $row['educ_attainment'];
$skills = $row['skills'];
$reff1 = $row['referral1'];
$reff2 = $row['referral2'];
$areff1 = $row['referral_contact1'];
$areff2 = $row['referral_contact2'];
$income = $row['income'];

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
  text-transform: capitalize;
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

input, td, th, b {
	font-size: 14px;
}

td {
	text-align: center;
}

input[type=radio] { display: inline; }
input[type=radio]:before { font-family: DejaVu Sans; }

.qcont:first-letter {
  text-transform: capitalize
}
</style>

	<center style='color: blue;'>
		<br><img src='images/dswd-logo.jpg' style='margin-right: 13%;' alt='images/dswd-logo' width='100' height='100' align='right' style='display: block; margin-left: 1% ; '>
			<img src='images/canaman-seal.png' style='margin-left: 13%;' alt='images/canaman-seal' width='100' height='100' align='left' style='display: block; margin-right: 1%;'>
			<h4 style='margin:0;'><b>Republic of the Philippines</b></h4>
			<h4 style='margin:0;'><b>Province of Camarines Sur</b></h4>
			<h4 style='margin:0;'><b>Municipality of Canaman</b></h4>
			<h4 style='margin:0;'><b>Tel. (054) 881-27-08</b></h4>
			<h4 style='margin:0; color: black'><b>Email:</b><i><u>mswdo_canaman@yahoo.com</u></i></h4><br>
			<h4 style='margin:0; color: red'><b>MUNICIPAL SOCIAL WELFARE AND DEVELOPMENT OFFICE</b></h4><br>
			<h4 style='margin:0; color: black'><b>GENERAL INTAKE SHEET</b></h4>
	</center>

	<p style='text-align: right; margin-right: 11.5%;'>No. $controlno</p>
	<p style='margin-left: 70%;'>Date Applied: <input style=' border: none; border-bottom: 1px solid black; width: 98px; text-align: center;' type='text' value=".$interview_date."></p>
	<b style='margin-left: 3%;'>I. IDENTIFYING INFORMATION</b><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Name' type='text' /><b>:</b>
	<input style='width: 300px; border: none; border-bottom: 1px solid black; text-align: center;' value='$name' type='text' />
	<input style='width: 30px; border: none;' type='text' value='Sex:' />
	<input style='width: 80px; border: none; border-bottom: 1px solid black; text-align: center;' value=".$row['sex']." type='text' />
	<input style='width: 30px; border: none;' type='text' value='Age:' />
	<input style='width: 70px; border: none; border-bottom: 1px solid black; text-align: center;' value=".$row['age']." type='text'  />
	<br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='4a. Date of Birth:' type='text' /><b>:</b>
	<input style='width: 120px; border: none; border-bottom: 1px solid black; text-align: center;' value='$birthdate' type='text' />
	<input style='width: 100px; border: none;' type='text' value='4b.Birthplace:' />
	<input style='width: 310px; border: none; border-bottom: 1px solid black; text-align: center;' value='$bplace' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='5. Civil Status:' type='text' /><b>:</b>
	<input style='width: 80px; border: none; border-bottom: 1px solid black; text-align: center;' value=".$row['civil_status']." type='text' />
	<input style='width: 85px; border: none;' type='text' value='6. Religion:' />
	<input style='width: 165px; border: none; border-bottom: 1px solid black; text-align: center;' value='$religion' type='text' />
	<input style='width: 85px; border: none;' type='text' value='7. Tel. No.:' />
	<input style='width: 100px; border: none; border-bottom: 1px solid black; text-align: center;' value='$telephone' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 150px; border: none;' type='text' value='8a. Present Address:' />
	<input style='width: 535px; border: none; border-bottom: 1px solid black; text-align: center;' value='$address' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='8b. Provincial Address:' />
	<input style='width: 515px; border: none; border-bottom: 1px solid black; text-align: center;' value='$provincial_address' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 250px; border: none;' type='text' value='9. Highest Educational Attainment:' />
	<input style='width: 175px; border: none; border-bottom: 1px solid black; text-align: center;' value='$educational' type='text' />
	<input style='width: 135px; border: none;' type='text' value='10. Philhealth No.:' />
	<input style='width: 110px; border: none; border-bottom: 1px solid black; text-align: center;' value='$philhealth' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 155px; border: none;' type='text' value='11. Skills/Occupation:' />
	<input style='width: 165px; border: none; border-bottom: 1px solid black; text-align: center;' value='$skills' type='text' />
	<input style='width: 220px; border: none;' type='text' value='12. Estimated Family Income:' />
	<input style='width: 130px; border: none; border-bottom: 1px solid black; text-align: center;' value='P $income' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 180px; border: none;' type='text' value='13. Mode of Admission:' />
	<input style='width: 175px; border: none; border-bottom: 1px solid black; text-align: center;' value='$admission' type='text' />
	<input style='width: 130px; border: none;' type='text' value='(Referring Party):' />
	<input style='width: 185px; border: none; border-bottom: 1px solid black; text-align: center;' value='$reff1' type='text' />

	<br>
	<input style='margin-left: 4.5%; width: 110px; border: none;' value='14. Ownership' type='text' /><b>:</b>
	<input style='width: 75px; border: none;' type='text' value='a. House:' />
	<input style='width: 210px; border: none; border-bottom: 1px solid black; text-align: center;' value='$house' type='text' />
	<input style='width: 45px; border: none;' type='text' value='b. Lot:' />
	<input style='width: 210px; border: none; border-bottom: 1px solid black; text-align: center;' value='$lot' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 290px; border: none;' value='Address/Contact # of the Refering Party' type='text' /><b>:</b>
	<input style='width: 385px; border: none; border-bottom: 1px solid black; text-align: center;' value='$areff1' type='text' />
	<b style='margin-left: 3%;'>II. FAMILY COMPOSITION</b><br>
	<table style='width: 100%;'>
		<tr>
			<th></th>
			<th>Name</th>
			<th>Age</th>
			<th>Sex</th>
			<th>Civil Status</th>
			<th>Educational Attainment</th>
			<th>Relationship to Client</th>
			<th>Occupation</th>
			<th>Monthly Income</th>
		</tr>
		<tr>
			<td>1</td>
			<td>".$fam1['name']."</td>
			<td>".$afam1."</td>
			<td>".$fam1['fam_sex']."</td>
			<td>".$fam1['fam_civil_status']."</td>
			<td>".$fam1['fam_educ_attainment']."</td>
			<td>".$fam1['relationship']."</td>
			<td>".$fam1['fam_skills']."</td>
			<td>".$fam1['fam_income']."</td>
		</tr>
		<tr>
			<td>2</td>
			<td>".$fam2['name']."</td>
			<td>".$afam2."</td>
			<td>".$fam2['fam_sex']."</td>
			<td>".$fam2['fam_civil_status']."</td>
			<td>".$fam2['fam_educ_attainment']."</td>
			<td>".$fam2['relationship']."</td>
			<td>".$fam2['fam_skills']."</td>
			<td>".$fam2['fam_income']."</td>
		</tr>
		<tr>
			<td>3</td>
			<td>".$fam3['name']."</td>
			<td>".$afam3."</td>
			<td>".$fam3['fam_sex']."</td>
			<td>".$fam3['fam_civil_status']."</td>
			<td>".$fam3['fam_educ_attainment']."</td>
			<td>".$fam3['relationship']."</td>
			<td>".$fam3['fam_skills']."</td>
			<td>".$fam3['fam_income']."</td>
		</tr>
		<tr>
			<td>4</td>
			<td>".$fam4['name']."</td>
			<td>".$afam4."</td>
			<td>".$fam4['fam_sex']."</td>
			<td>".$fam4['fam_civil_status']."</td>
			<td>".$fam4['fam_educ_attainment']."</td>
			<td>".$fam4['relationship']."</td>
			<td>".$fam4['fam_skills']."</td>
			<td>".$fam4['fam_income']."</td>
		</tr>
		<tr>
			<td>5</td>
			<td>".$fam5['name']."</td>
			<td>".$afam5."</td>
			<td>".$fam5['fam_sex']."</td>
			<td>".$fam5['fam_civil_status']."</td>
			<td>".$fam5['fam_educ_attainment']."</td>
			<td>".$fam5['relationship']."</td>
			<td>".$fam5['fam_skills']."</td>
			<td>".$fam5['fam_income']."</td>
		</tr>
		<tr>
			<td>6</td>
			<td>".$fam6['name']."</td>
			<td>".$afam6."</td>
			<td>".$fam6['fam_sex']."</td>
			<td>".$fam6['fam_civil_status']."</td>
			<td>".$fam6['fam_educ_attainment']."</td>
			<td>".$fam6['relationship']."</td>
			<td>".$fam6['fam_skills']."</td>
			<td>".$fam6['fam_income']."</td>
		</tr>
		<tr>
			<td>7</td>
			<td>".$fam7['name']."</td>
			<td>".$afam7."</td>
			<td>".$fam7['fam_sex']."</td>
			<td>".$fam7['fam_civil_status']."</td>
			<td>".$fam7['fam_educ_attainment']."</td>
			<td>".$fam7['relationship']."</td>
			<td>".$fam7['fam_skills']."</td>
			<td>".$fam7['fam_income']."</td>
		</tr>
		<tr>
			<td>8</td>
			<td>".$fam8['name']."</td>
			<td>".$afam8."</td>
			<td>".$fam8['fam_sex']."</td>
			<td>".$fam8['fam_civil_status']."</td>
			<td>".$fam8['fam_educ_attainment']."</td>
			<td>".$fam8['relationship']."</td>
			<td>".$fam8['fam_skills']."</td>
			<td>".$fam8['fam_income']."</td>
		</tr>
		<tr>
			<td>9</td>
			<td>".$fam9['name']."</td>
			<td>".$afam9."</td>
			<td>".$fam9['fam_sex']."</td>
			<td>".$fam9['fam_civil_status']."</td>
			<td>".$fam9['fam_educ_attainment']."</td>
			<td>".$fam9['relationship']."</td>
			<td>".$fam9['fam_skills']."</td>
			<td>".$fam9['fam_income']."</td>
		</tr>
		<tr>
			<td>10</td>
			<td>".$fam10['name']."</td>
			<td>".$afam10."</td>
			<td>".$fam10['fam_sex']."</td>
			<td>".$fam10['fam_civil_status']."</td>
			<td>".$fam10['fam_educ_attainment']."</td>
			<td>".$fam10['relationship']."</td>
			<td>".$fam10['fam_skills']."</td>
			<td>".$fam10['fam_income']."</td>
		</tr>
	</table>
	<b style='margin-left: 3%;'>III. SOCIAL WORKER'S ASSESTMENT/PROBLEM PRESENTED</b><br>
	<p style='margin-left: 3%;' class='qcont'>&nbsp;&nbsp;&nbsp;$assestment</p><br>
	<label style='margin-left: 13%;'>Interviewed by:</label><label style='margin-left: 15%;' hidden>Received & Approved by:</label><label style='margin-left: 10%;' hidden>Client's Signiture:</label><br><br>
	<input style='margin-left: 5%; width: 200px; border: none; border-bottom: 1px solid black; text-align: center;' value='$worker_name' type='text' />
	<input style='margin-left: 5%; width: 200px; border: none; border-bottom: 1px solid black; text-align: center;' value='' type='text' />
	<input style='margin-left: 5%; width: 200px; border: none; border-bottom: 1px solid black; text-align: center;' value='' type='text' />
	
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

