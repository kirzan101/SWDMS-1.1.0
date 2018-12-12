<?php
// include autoloader
session_start();
require_once 'dompdf/autoload.inc.php';

include "../db_connect.php";

$client_id = $_GET['client_id'];
$count_no = $_GET['count_no'];

$sql = "SELECT * FROM client c INNER JOIN assistance s, interview i, client_general_details g WHERE s.client_id = $client_id && c.client_id = $client_id && i.client_id = $client_id && i.interview_id = s.interview_id && s.assistance_id = $count_no && c.client_id = g.client_general_detail_id";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$service_id = $row['service_id'];
$interview_id = $row['interview_id'];
$background = $row['assestment'];

if($con->query($sql)){

			$sql =  "SELECT * FROM services WHERE service_id = $service_id";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$rows = $result->fetch_assoc();
			
			$assistance = $rows['service_name'];

		}
}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM interview_log WHERE service_id = $service_id && client_id = $client_id && interview_id = $interview_id ";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$rowss = $result->fetch_assoc();
			
			$worker_id = $rowss['worker_id'];

		}
}
		
if($con->query($sql)){

			$sql =  "SELECT * FROM workers WHERE worker_id = $worker_id";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$rowsss = $result->fetch_assoc();
			
			$officer = $rowsss['first_name'].' '.$rowsss['last_name'].', '.$rowsss['position'];

		}
}

	
$name = $row['first_name'].'&nbsp;'.$row['middle_name'].'&nbsp;'.$row['last_name'];
$family_head = $row['family_head'];
$interview_date = date("F d, Y", strtotime($row['interview_date']));  
$birthdate = date("F d, Y", strtotime($row['date_of_birth']));
$bplace = $row['place_of_birth'];
$address = $row['address'];
$age = $row['age'];
$amounts = $row['amount'];
$amount = number_format("$amounts",2);
$purpose = 'Burial assistance';

if ( $service_id = '2') {
	$sign_person = 'HENRY P. RAGODON, Municipal Mayor';
} else {
	$sign_person = 'FRANCIA M. ARCAYERA, <b>MSWDO</b>';
}

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
        $pdf_filename = 'general_report';


$this_html ="
<!DOCTYPE html>
<html>
<title>Print Forms</title>

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

input[type=checkbox] { display: inline; }

table {
    width: 100%;
	border: none;
}

p, td, th {
    font-size: 13px;
}

td, th {
	text-transform: capitalize;
}



</style>

	<center style='color: blue;'>

			<h4 style='margin:0; color: red'><b>MUNICIPAL SOCIAL WELFARE AND DEVELOPMENT OFFICE</b></h4>
			<a style='color: black;'>Canaman, Camarines Sur</a>
	</center>

	<p>
	<p style='text-align: right;' >Date Occurrences:________________</p>
	<b>EMERGENCY FORM</b><br>
	<table align='right' style='margin-left: 4.5%;'>
	  <tr>
		<td style='border: none;' ><input type='checkbox'> Disaster Victims</td>
		<td style='border: none;' ><input type='checkbox'> Cultural</td>
		<td style='border: none;' ><input type='checkbox'> Rebel Returnees</td>
	  </tr>
	  <tr>
		<td style='border: none;' ><input type='checkbox'> Natural Disaster</td>
		<td style='border: none;' ><input type='checkbox'> Refugees</td>
		<td style='border: none;' ><input type='checkbox'> Squatters</td>
	  </tr>
	  <tr>
		<td style='border: none;' ><input type='checkbox'> Man Made Disaster</td>
		<td style='border: none;' ><input type='checkbox'> Evacees</td>
		<td style='border: none;' ><input type='checkbox'> Repatriates</td>
	  </tr>
	  <tr>
		<td style='border: none;' ><input type='checkbox'> Nomadic</td>
		<td style='border: none;' ><input type='checkbox'> AICS</td>
		<td style='border: none;' ><input type='checkbox'> Others(specify): _____________</td>
	  </tr>
	</table>
	</p>
	<p>
	<input style=' width: 100px; border: none;' value='Family Head' type='text' /><b>:</b>
	<input style='width: 250px; border: none; border-bottom: 1px solid black; text-align: center;' type='text' />
	<input style=' width: 60px; border: none;' value='Address' type='text' /><b>:</b>
	<input style='width: 280px; border: none; border-bottom: 1px solid black; text-align: center;' type='text' />
	</p>
	<table>
	  <tr>
		<th></th>
		<th style='text-align: center;' >Dependent Name</th>
		<th style='text-align: center;' >Relation to Head</th>
		<th style='text-align: center;' >Age</th>
		<th></th>
		<th>Dependent Name</th>
		<th>Relation to Head</th>
		<th>Age</th>
	  </tr>
	  <tr>
		<td style='text-align: center;' >1</td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' >6</td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
	  </tr>
	  <tr>
		<td style='text-align: center;' >2</td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' >7</td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
	  </tr>
	  <tr>
		<td style='text-align: center;' >3</td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' >8</td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
	  </tr>
	  <tr>
		<td style='text-align: center;' >4</td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' >9</td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
	  </tr>
	  <tr>
		<td style='text-align: center;' >5</td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' >10</td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
		<td style='text-align: center;' ></td>		
	  </tr>
	</table>
	<p>
	<br>
	Signiture/Thumbmark of Client:____________________________________ Signiture of Worker: ____________________________________<br>
	Date of Registration: $interview_date<br>
	Brief Background of the case:<br>
	<i>$background</i>
	</p>
	<p>
	<b>Assistance Recommended: (Please Check)</b><br>
	<table align='right' style='margin-left: 4.5%;'>
	  <tr>
		<td style='border: none;' ><input type='checkbox'> Medical</td>
		<td style='border: none;' ><input type='checkbox'> Transportation Subsistence</td>
		<td style='border: none;' ><input type='checkbox'> Skills Training/Job Placement</td>
	  </tr>
	  <tr>
		<td style='border: none;' ><input type='checkbox'> Burial</td>
		<td style='border: none;' ><input type='checkbox'> Referral</td>
		<td style='border: none;' ><input type='checkbox'> Counselling/Comfort Giving</td>
	  </tr>
	  <tr>
		<td style='border: none;' ><input type='checkbox'> Food</td>
		<td style='border: none;' ><input type='checkbox'> Emergency Shelter</td>
		<td style='border: none;' ><input type='checkbox'> For classification for regular program</td>
	  </tr>
	  <tr>
		<td style='border: none;' ><input type='checkbox'> Clothing</td>
		<td style='border: none;' ><input type='checkbox'> Food for Work</td>
		<td style='border: none; text-transform: uppercase' ><input type='checkbox'> SEA</td>
	  </tr>
	  <tr>
		<td style='border: none;' ><input type='checkbox'> Supplemental Feeding</td>
		<td style='border: none;' ><input type='checkbox'> Others(specify): _____________</td>
		<td style='border: none;' ></td>
	  </tr>
	</table>
	</p>
	<br>
	<hr>
	<center>
	<h4 style='margin:0; color: black'><b>CERTIFICATE OF ELIGIBILITY</b></h4>
	</center>
	<p style='margin-left: 4.5%;'>
	&nbsp;&nbsp;&nbsp;This is to certify that <b>$name</b>, <b>$age</b> years old, residing at <b>$address</b> has been found eligible for <b>$assistance</b> after interview and case study has been made. 
	<br><br>
	&nbsp;&nbsp;&nbsp;Records of the case dated <b>$interview_date</b> are in the confidential file of <b>MSWDO</b> Unit Office.
	<br><br>
	&nbsp;&nbsp;&nbsp;Client is recommended for assistance in the amount of &nbsp;<b>$amount pesos</b> for <b>$purpose</b>.
	</p>
	<p style='text-align: right; margin-right: 4.5%;'>Prepared by:</p>
	<p style='text-align: right; margin-right: 4.5%;'>$officer</p>
	<p style='text-align: left; margin-left: 4.5%;'>Recommending Approval:</p>
	<p style='text-align: left; margin-left: 3%;'>$sign_person</p>
	<center><p>APPROVED:</p></center>
	<center><p>Hon. HENRY P. RAGODON
	<br>
	Municipal Mayor</b></p>
	</center>
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

