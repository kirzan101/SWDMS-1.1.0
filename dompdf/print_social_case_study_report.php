<?php
// include autoloader
session_start();
require_once 'dompdf/autoload.inc.php';

include "../db_connect.php";

$client_id = $_GET['client_id'];
$count_no = $_GET['count_no'];
$service_no = $_GET['service_no'];

$sql = "SELECT * FROM client c INNER JOIN assistance s, interview i, client_general_details g WHERE s.client_id = $client_id && c.client_id = $client_id && i.client_id = $client_id && i.interview_id = s.interview_id && g.client_general_detail_id = $count_no && c.client_id = g.client_id && s.interview_id = g.interview_id";
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

if($con->query($sql)){

			$sql =  "SELECT * FROM assistance WHERE client_id = $client_id";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$rows = $result->fetch_assoc();
			
			$worker_id = $rows['worker_id'];
		
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM workers WHERE worker_id = $worker_id";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$rowss = $result->fetch_assoc();
			
			$worker_fname = $rowss['first_name'];
			$worker_lname = $rowss['last_name'];
		
		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM client_scsr_details WHERE client_id = $client_id && client_scsr_detail_id = $service_no";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$details = $result->fetch_assoc();
		
		}
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

$worker_name = $worker_fname.' '.$worker_lname;			
$name = $row['first_name'].'&nbsp;'.$row['middle_name'].'&nbsp;'.$row['last_name'];
$sign_name = $row['first_name'].'&nbsp;'.$row['last_name'];
$interview_date = date("M d, Y", strtotime($row['interview_date']));  
$birthdate = date("F d, Y", strtotime($row['date_of_birth']));
$bplace = $row['place_of_birth'];
$telephone = $row['telephone'];
$address = ucwords($row['address']);
$provincial_address = $row['provincial_address'];
$philhealth = $row['philhealth_no'];
$house = $row['house'];
$lot = $row['lot'];
$assestment = $row['assestment'];
$ages = $row['age'];
$age = $ages.' years old';
$educ = $row['educ_attainment'];
$counterno = $details['client_scsr_detail_id'];
$counterno = str_pad($counterno, 6, "0", STR_PAD_LEFT);
$assessment = $row['assestment'];
$background = $details['background_info'];
$recommendation = $details['recommendation'];

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
        $pdf_filename = 'general_report';


$this_html ="
<!DOCTYPE html>
<html>
<title>Print Social Case Study Report</title>

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

td, th, h4, input, p { font-size: 13px; }

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
			<h4 style='margin:0; color: black'><b>SOCIAL CASE STUDY REPORT</b></h4>
	</center>

	<p style='text-align: right; margin-right: 11.5%;'>No. $counterno</p>
	<p style='margin-left: 70%;'>Date Applied: <input style=' border: none; border-bottom: 1px solid black; width: 128px; text-align: center;' type='text' value='$interview_date'></p>
	<b style='margin-left: 3%;'>I. IDENTIFYING DATA</b><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Name' type='text' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$name' type='text' /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Age' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$age' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Date of Birth' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$birthdate' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='Educational Attainment' /><b>:</b>
	<input style='width: 480px; border: none; ' value='$educ' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Address' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$address' type='text'  /><br>

	<b style='margin-left: 3%;'>II. FAMILY COMPOSITION</b><br><br>
	<table align='center' style='width: 100%;'>
	<tr>
		<th style='text-align: center;' >#</th>
		<th style='text-align: center;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th style='text-align: center;' >Age</th>
		<th style='text-align: center;' >Sex</th>
		<th style='text-align: center;' >Civil Status&nbsp;&nbsp;&nbsp;</th>
		<th style='text-align: center;' >Relationship to client&nbsp;&nbsp;&nbsp;</th>
		<th style='text-align: center;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Occupation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th style='text-align: center;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
	</tr>

		<tr>
			<td>1</td>
			<td>".$fam1['name']."</td>
			<td>".$afam1."</td>
			<td>".$fam1['fam_sex']."</td>
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
			<td>".$fam10['fam_educ_attainment']."</td>
			<td>".$fam10['relationship']."</td>
			<td>".$fam10['fam_skills']."</td>
			<td>".$fam10['fam_income']."</td>
		</tr>
	</table>
	<br>
	<b style='margin-left: 3%;'>III. PROBLEM PRESENTED</b>
	<p style='text-align: justify; text-justify: inter-word; text-indent: 50px;' >$assessment</p>
	<b style='margin-left: 3%;'>IV. BACKGROUND INFORMATION</b>
	<p style='text-align: justify; text-justify: inter-word; text-indent: 50px;' >$background</p>
	<b style='margin-left: 3%;'>V. RECOMMENDATION</b>
	<p style='text-align: justify; text-justify: inter-word; text-indent: 50px;' >$recommendation</p>
	
	<p style='text-align: right; margin-right: 4.5%;'>Prepared by:</p><br>
	<p style='text-align: right; margin-right: 4.5%; '>$worker_name, RSW</p>
	<p style='text-align: right; margin-right: 4.5%;'>Social Welfare Officer II</p>
	<p style='text-align: left; margin-left: 4.5%;'>Noted By:</p><br>
	<p style='text-align: left; margin-left: 4.5%; text-indent: 50px;'>FRANCIA M. ARCAYERA, RSW<br>
	<a style='text-align: left; margin-left: 1%;'>Municipal Social Welfare and Development Officer</a></p>

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

