<?php
// include autoloader
session_start();
require_once 'dompdf/autoload.inc.php';

include "../db_connect.php";

$husband_id = $_GET['husband_id'];
$wife_id = $_GET['wife_id'];
$count_no = $_GET['count_no'];

$sql = "SELECT * FROM client_couple c INNER JOIN client_premarriage_log l WHERE c.client_couple_id = l.client_couple_id && c.husband_id = $husband_id && c.wife_id = $wife_id && c.client_couple_id = $count_no";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$interview_id = $row['interview_id'];
$worker_id = $row['worker_id'];
$husband_id = $row['husband_id'];
$wife_id = $row['wife_id'];
$marriage_date = date("F d, Y", strtotime($row['marriage_date']));
$counterno = $row['client_couple_id'];
$counterno = str_pad($counterno, 6, "0", STR_PAD_LEFT);


if($con->query($sql)){

			$sql =  "SELECT * FROM workers WHERE worker_id = $worker_id";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$rows = $result->fetch_assoc();
			
			$fname = $rows['first_name'];
			$lname = $rows['last_name'];
			$officer_name = $fname.' '.$lname;

		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM client c  INNER JOIN client_premarriage_details d WHERE c.client_id = $husband_id && c.client_id = d.client_id && c.sex = 'Male' ";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$husband = $result->fetch_assoc();
			
			$husband_age = $husband['age'];
			$husband_address = $husband['address'];
			$husband_birthdate = date("F d, Y", strtotime($husband['date_of_birth']));
			$husband_birthplace = $husband['place_of_birth'];
			$husband_educ_attainment = $husband['educ_attainment'];
			$husband_civil = $husband['civil_status'];
			$husband_skill = $husband['skills'];
			$husband_income = $husband['income_monthly'];
			$address_marriage = $husband['address_marriage'];

		}
		}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM client c  INNER JOIN client_premarriage_details d WHERE c.client_id = $wife_id && c.client_id = d.client_id && c.sex = 'Female' ";
			
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$wife = $result->fetch_assoc();
			
			$wife_age = $wife['age'];
			$wife_address = $wife['address'];
			$wife_birthdate = date("F d, Y", strtotime($wife['date_of_birth']));
			$wife_birthplace = $wife['place_of_birth'];
			$wife_educ_attainment = $wife['educ_attainment'];
			$wife_civil = $wife['civil_status'];
			$wife_skill = $wife['skills'];
			$wife_income = $wife['income_monthly'];

		}
		}		
		
		
		

$husband_name = $row['husband_name'];
$wife_name = $row['wife_name'];
$interview_date = date("M d, Y", strtotime($row['interview_date']));  

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
	text-transform: capitalize;
}



.paddingClass{
    
    margin:10px;
    padding:5px;
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
			<h4 style='margin:0; color: black'><b>Pre-Marriage Counselling Intake</b></h4>
	</center>

	<p style='text-align: right; margin-right: 11.5%;'>No. $conuterno</p>
	<p style='margin-left: 70%;'>Date Applied: <input style=' border: none; border-bottom: 1px solid black; width: 128px; text-align: center;' type='text' value='$interview_date'></p>
	<b style='margin-left: 3%;'>MAN (LALAKI)</b><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Name' type='text' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$husband_name' type='text' /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Age' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$husband_age years old' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Address' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$husband_address' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Date of Birth' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$husband_birthdate' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Place of Birth' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$husband_birthplace' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='Educational Attainment' /><b>:</b>
	<input style='width: 480px; border: none; ' value='$husband_educ_attainment' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='Civil Status' /><b>:</b>
	<input style='width: 480px; border: none; ' value='$husband_civil' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='Employment' /><b>:</b>
	<input style='width: 480px; border: none; ' value='$husband_skill' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='Income' /><b>:</b>
	<input style='width: 480px; border: none; ' value='$husband_income' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='Address after Marriage' /><b>:</b>
	<input style='width: 480px; border: none; ' value='$address_marriage' type='text'  /><br><br>

	<b style='margin-left: 3%;'>WOMAN (BABAE)</b><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Name' type='text' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$wife_name' type='text' /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Age' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$wife_age years old' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Address' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$wife_address' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Date of Birth' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$wife_birthdate' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Place of Birth' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$wife_birthplace' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='Educational Attainment' /><b>:</b>
	<input style='width: 480px; border: none; ' value='$wife_educ_attainment' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='Civil Status' /><b>:</b>
	<input style='width: 480px; border: none; ' value='$wife_civil' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='Employment' /><b>:</b>
	<input style='width: 480px; border: none; ' value='$wife_skill' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='Income' /><b>:</b>
	<input style='width: 480px; border: none; ' value='$wife_income' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 170px; border: none;' type='text' value='Address after Marriage' /><b>:</b>
	<input style='width: 480px; border: none; ' value='$address_marriage' type='text'  /><br><br>
	
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Date of Marriage' type='text' /><b>:</b>
	<input style='width: 560px; border: none; ' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$marriage_date' type='text' /><br>

	
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

