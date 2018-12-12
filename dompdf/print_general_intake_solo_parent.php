<?php
// include autoloader
session_start();
require_once 'dompdf/autoload.inc.php';

include "../db_connect.php";

$client_id = $_GET['client_id'];
$count_no = $_GET['count_no'];

$sql = "SELECT * FROM client c INNER JOIN client_solo_details s, interview i WHERE i.interview_id = s.interview_id && c.client_id = $client_id && s.client_id = $client_id && s.interview_id = i.interview_id && s.client_solo_detail_id = $count_no";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$counterno = $row['client_solo_detail_id'];
$counterno = str_pad($counterno, 6, "0", STR_PAD_LEFT);

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
		
$name = ucwords($row['first_name']).'&nbsp;'.ucwords($row['middle_name']).'&nbsp;'.ucwords($row['last_name']);
$age = $row['age'];
$sex = $row['sex'];
$bday = date('F d, Y', strtotime($row['date_of_birth']));
$contactno = $row['contact_no'];
$bplace = ucwords($row['place_of_birth']);
$civil = $row['civil_status'];
$educ = ucwords($row['educ_attainment']);
$skills = ucwords($row['skills']);
$fam_income = $row['income'];
$income = $row['income_monthly'];
$address = ucwords($row['address']);
$classification = ucfirst($row['classification']);
$needs = ucfirst(lcfirst($row['needs']));
$resources = ucfirst($row['fam_resources']);

	// Replace 0 to empty
			if ($fam1['fam_age'] == 0 OR $fam1['birthdates'] == '1970-01-01') {
				$afam1 = " ";
				$bdayfam1 = "";
			}
			else {
				$afam1 = $fam1['fam_age'];
				$bdayfam1 = date('m/d/Y', strtotime($fam1['birthdates']));
			}
			
			if ($fam2['fam_age'] == 0 OR $fam2['birthdates'] == '1970-01-01') {
				$afam2 = " ";
				$bdayfam2 = "";
			}
			else {
				$afam2 = $fam2['fam_age'];
				$bdayfam2 = date('m/d/Y', strtotime($fam2['birthdates']));
			}
			
			if ($fam3['fam_age'] == 0 OR $fam3['birthdates'] == '1970-01-01') {
				$afam3 = " ";
				$bdayfam3 = "";
			}
			else {
				$afam3 = $fam3['fam_age'];
				$bdayfam3 = date('m/d/Y', strtotime($fam3['birthdates']));
			}	
			if ($fam4['fam_age'] == 0 OR $fam4['birthdates'] == '1970-01-01') {
				$afam4 = " ";
				$bdayfam4 = "";
			}
			else {
				$afam4 = $fam4['fam_age'];
				$bdayfam4 = date('m/d/Y', strtotime($fam4['birthdates']));
			}
			if ($fam5['fam_age'] == 0 OR $fam5['birthdates'] == '1970-01-01') {
				$afam5 = " ";
				$bdayfam5 = "";
			}
			else {
				$afam5 = $fam5['fam_age'];
				$bdayfam5 = date('m/d/Y', strtotime($fam5['birthdates']));
			}
			
			if ($fam6['fam_age'] == 0 OR $fam6['birthdates'] == '1970-01-01') {
				$afam6 = " ";
				$bdayfam6 = "";
			}
			else {
				$afam6 = $fam6['fam_age'];
				$bdayfam6 = date('m/d/Y', strtotime($fam6['birthdates']));
			}
			if ($fam7['fam_age'] == 0 OR $fam7['birthdates'] == '1970-01-01') {
				$afam7 = " ";
				$bdayfam7 = "";
			}
			else {
				$afam7 = $fam7['fam_age'];
				$bdayfam7 = date('m/d/Y', strtotime($fam7['birthdates']));
			}
			if ($fam8['fam_age'] == 0 OR $fam8['birthdates'] == '1970-01-01') {
				$afam8 = " ";
				$bdayfam8 = "";
			}
			else {
				$afam8 = $fam8['fam_age'];
				$bdayfam8 = date('m/d/Y', strtotime($fam8['birthdates']));
			}
			if ($fam9['fam_age'] == 0OR $fam9['birthdates'] == '1970-01-01') {
				$afam9 = " ";
				$bdayfam9 = "";
			}
			else {
				$afam9 = $fam9['fam_age'];
				$bdayfam9 = date('m/d/Y', strtotime($fam9['birthdates']));
			}
			if ($fam10['fam_age'] == 0 OR $fam10['birthdates'] == '1970-01-01') {
				$afam10 = " ";
				$bdayfam10 = "";
			}
			else {
				$afam10 = $fam10['fam_age'];
				$bdayfam10 = date('m/d/Y', strtotime($fam10['birthdates']));
			}

			
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

p, td, th, input, b {
    font-size: 14px;
}
td {
	text-align: center;
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
			<h4 style='margin:0; color: black'><b>GENERAL INTAKE SHEET (SOLO PARENT)</b></h4>
	</center>
			<p style='text-align: right; margin-right: 11.5%;'></p>
			<p style='margin-left: 70%;'>No. $counterno <br> Date Applied: <input style=' border: none; border-bottom: 1px solid black; width: 98px; text-align: center;' type='text' value=".date('m/d/Y', strtotime($row['interview_date']))."></p>
			<b style='margin-left: 3%;'>I. IDENTIFYING DATA</b><br>
			<input style='margin-left: 4.5%; width: 130px; border: none;' value='Name' type='text' /><b>:</b>
			<input style='width: 300px; border: none; border-bottom: 1px solid black;' value='$name' type='text' />
			<input style='width: 30px; border: none;' type='text' value='Age:' />
			<input style='width: 70px; border: none; border-bottom: 1px solid black;' value='$age' type='text'  />
			<input style='width: 30px; border: none;' type='text' value='Sex:' />
			<input style='width: 80px; border: none; border-bottom: 1px solid black;' value='$sex' type='text' />
			<br>
			<input style='margin-left: 4.5%; width: 130px; border: none;' value='Address' type='text' /><b>:</b>
			<input style='width: 543px; border: none; border-bottom: 1px solid black;' value='$address' type='text' />
			<br>
			<input style='margin-left: 4.5%; width: 130px; border: none;' value='Date of Birth' type='text' /><b>:</b>
			<input style='width: 247px; border: none; border-bottom: 1px solid black;' value='$bday' type='text' />
			<input style='width: 85px; border: none;' type='text' value='Contact No.' />
			<input style='width: 195px; border: none; border-bottom: 1px solid black;' value='$contactno' type='text' />
			<br>
			<input style='margin-left: 4.5%; width: 130px; border: none;' value='Place of Birth' type='text' /><b>:</b>
			<input style='width: 543px; border: none; border-bottom: 1px solid black;' value='$bplace' type='text' />
			<br>
			<input style='margin-left: 4.5%; width: 130px; border: none;' value='Civil Status' type='text' /><b>:</b>
			<input style='width: 543px; border: none; border-bottom: 1px solid black;' value='$civil' type='text' />
			<br>
			<input style='margin-left: 4.5%; width: 165px; border: none;' value='Educational Attainment' type='text' /><b>:</b>
			<input style='width: 509px; border: none; border-bottom: 1px solid black;' value='$educ' type='text' />
			<br>
			<input style='margin-left: 4.5%; width: 130px; border: none;' value='Occupation' type='text' /><b>:</b>
			<input style='width: 543px; border: none; border-bottom: 1px solid black;' value='$skills' type='text' />
			<br>
			<input style='margin-left: 4.5%; width: 130px; border: none;' value='Monthly Income' type='text' /><b>:</b>
			<input style='width: 543px; border: none; border-bottom: 1px solid black;' value='$income' type='text' />
			<br>
			<input style='margin-left: 4.5%; width: 205px; border: none;' value='Total Monthly Family Income' type='text' /><b>:</b>
			<input style='width: 468px; border: none; border-bottom: 1px solid black;' value='$fam_income' type='text' />
			<br>
			<b style='margin-left: 3%;'>II. FAMILY COMPOSITION</b><br>
				<table style='width: 100%;'>
					<tr>
						<th></th>
						<th style='width: auto;'>Name</th>
						<th style='width: auto;'>Age</th>
						<th style='width: auto;'>Date of Birth</th>
						<th style='width: auto;'>Sex</th>
						<th style='width: auto;'>Civil Status</th>
						<th style='width: auto;'>Educational Attainment</th>
						<th style='width: auto;'>Relationship to Client</th>
						<th style='width: auto;'>Occupation</th>
					</tr>
					<tr>
						<td>1</td>
						<td>".$fam1['name']."</td>
						<td>$afam1</td>
						<td>$bdayfam1</td>
						<td>".$fam1['fam_sex']."</td>
						<td>".$fam1['fam_civil_status']."</td>
						<td>".$fam1['fam_educ_attainment']."</td>
						<td>".$fam1['relationship']."</td>
						<td>".$fam1['fam_skills']."</td>
					</tr>
					<tr>
						<td>2</td>
						<td>".$fam2['name']."</td>
						<td>$afam2</td>
						<td>$bdayfam2</td>
						<td>".$fam2['fam_sex']."</td>
						<td>".$fam2['fam_civil_status']."</td>
						<td>".$fam2['fam_educ_attainment']."</td>
						<td>".$fam2['relationship']."</td>
						<td>".$fam2['fam_skills']."</td>
					  </tr>
					  <tr>
						<td>3</td>
						<td>".$fam3['name']."</td>
						<td>$afam3</td>
						<td>$bdayfam3</td>
						<td>".$fam3['fam_sex']."</td>
						<td>".$fam3['fam_civil_status']."</td>
						<td>".$fam3['fam_educ_attainment']."</td>
						<td>".$fam3['relationship']."</td>
						<td>".$fam3['fam_skills']."</td>
					  </tr>
					  <tr>
						<td>4</td>
						<td>".$fam4['name']."</td>
						<td>$afam4</td>
						<td>$bdayfam4</td>
						<td>".$fam4['fam_sex']."</td>
						<td>".$fam4['fam_civil_status']."</td>
						<td>".$fam4['fam_educ_attainment']."</td>
						<td>".$fam4['relationship']."</td>
						<td>".$fam4['fam_skills']."</td>
					  </tr>
					  <tr>
						<td>5</td>
						<td>".$fam5['name']."</td>
						<td>$afam5</td>
						<td>$bdayfam5</td>
						<td>".$fam5['fam_sex']."</td>
						<td>".$fam5['fam_civil_status']."</td>
						<td>".$fam5['fam_educ_attainment']."</td>
						<td>".$fam5['relationship']."</td>
						<td>".$fam5['fam_skills']."</td>
					  </tr>
					  <tr>
						<td>6</td>
						<td>".$fam6['name']."</td>
						<td>$afam6</td>
						<td>$bdayfam6</td>
						<td>".$fam6['fam_sex']."</td>
						<td>".$fam6['fam_civil_status']."</td>
						<td>".$fam6['fam_educ_attainment']."</td>
						<td>".$fam6['relationship']."</td>
						<td>".$fam6['fam_skills']."</td>
					  </tr>
					  <tr>
						<td>7</td>
						<td>".$fam7['name']."</td>
						<td>$afam7</td>
						<td>$bdayfam7</td>
						<td>".$fam7['fam_sex']."</td>
						<td>".$fam7['fam_civil_status']."</td>
						<td>".$fam7['fam_educ_attainment']."</td>
						<td>".$fam7['relationship']."</td>
						<td>".$fam7['fam_skills']."</td>
					  </tr>
					  <tr>
						<td>8</td>
						<td>".$fam8['name']."</td>
						<td>$afam8</td>
						<td>$bdayfam8</td>
						<td>".$fam8['fam_sex']."</td>
						<td>".$fam8['fam_civil_status']."</td>
						<td>".$fam8['fam_educ_attainment']."</td>
						<td>".$fam8['relationship']."</td>
						<td>".$fam8['fam_skills']."</td>
					  </tr>
					  <tr>
						<td>9</td>
						<td>".$fam9['name']."</td>
						<td>$afam9</td>
						<td>$bdayfam9</td>
						<td>".$fam9['fam_sex']."</td>
						<td>".$fam9['fam_civil_status']."</td>
						<td>".$fam9['fam_educ_attainment']."</td>
						<td>".$fam9['relationship']."</td>
						<td>".$fam9['fam_skills']."</td>
					  </tr>
					  <tr>
						<td>10</td>
						<td>".$fam10['name']."</td>
						<td>$afam10</td>
						<td>$bdayfam10</td>
						<td>".$fam10['fam_sex']."</td>
						<td>".$fam10['fam_civil_status']."</td>
						<td>".$fam10['fam_educ_attainment']."</td>
						<td>".$fam10['relationship']."</td>
						<td>".$fam10['fam_skills']."</td>
					  </tr>
				</table>
			<b style='margin-left: 3%;'>III. CLASSIFICATION/ CIRCUMTANCES OF BEING A SOLO PARENT:</b>
			<p style='margin-left: 7%; margin-top: 0.1cm; margin-bottom: 0.1cm; text-decoration: underline;'>$classification</p>
			<b style='margin-left: 3%;'>IV. NEEDS/ PROBLEMS OF SOLO PARENTS:</b><br>
			<p style='margin-left: 7%; margin-top: 0.1cm; margin-bottom: 0.1cm; text-decoration: underline;'>$needs</p>
			<b style='margin-left: 3%;'>V. FAMILY RESOURCES</b><br>
			<p style='margin-left: 7%; margin-top: 0.1cm; margin-bottom: 0.1cm; text-decoration: underline;'>$resources</p>
			<p style='margin-left: 5%;'>&nbsp;&nbsp;&nbsp;I hereby certify that the information given above are true and correct. I furthter understand that any misinterpretation that may have made will subject me to criminal and civil liabilities provided for by existing laws.</p>
			<br>
			<input style='margin-left: 5%; width: 150px; border: none; border-top: 1px solid black; text-align: center;' type='text' value='Date' />
			<input style='margin-left: 49%; width: 150px; border: none; border-top: 1px solid black; text-align: center;' type='text' value='Signiture of Client' />

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

