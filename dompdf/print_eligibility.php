<?php
// include autoloader
session_start();
require_once 'dompdf/autoload.inc.php';

include "../db_connect.php";

$client_id = $_GET['client_id'];
$count_no = $_GET['count_no'];

$sql = "SELECT * FROM client c INNER JOIN assistance s, interview i, client_general_details g WHERE i.interview_id = s.interview_id && s.client_id = $client_id && c.client_id = $client_id && i.client_id = $client_id && g.interview_id = s.interview_id && s.interview_id = $count_no && c.client_id = g.client_id";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$service_id = $row['service_id'];
$interview_id = $row['interview_id'];
$background = $row['assestment'];
$worker_id = $row['worker_id'];

if($con->query($sql)){

			$sql =  "SELECT * FROM services WHERE service_id = $service_id";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$rows = $result->fetch_assoc();
			
			$assistance = $rows['service_name'];

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

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 1";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam1 = $result->fetch_assoc();
			
			$name1 = $fam1['name'];
			if (empty($name1)) {
				$relation1 = '';
				$age1 = '';
			} else {
			$relation1 = $fam1['relationship'];
			$age1 = $fam1['fam_age'];
			}

		}
}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 2";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam2 = $result->fetch_assoc();
			
			$name2 = $fam2['name'];
			if (empty($name2)) {
				$relation2 = '';
				$age2 = '';
			} else {
			$relation2 = $fam2['relationship'];
			$age2 = $fam2['fam_age'];
			}

		}
}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 3";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam3 = $result->fetch_assoc();
			
			$name3 = $fam3['name'];
			if (empty($name3)) {
				$relation3 = '';
				$age3 = '';
			} else {
			$relation3 = $fam3['relationship'];
			$age3 = $fam3['fam_age'];
			}

		}
}
	
if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 4";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam4 = $result->fetch_assoc();
			
			$name4 = $fam4['name'];
			if (empty($name4)) {
				$relation4 = '';
				$age4 = '';
			} else {
			$relation4 = $fam4['relationship'];
			$age4 = $fam4['fam_age'];
			}
		}
}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 5";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam5 = $result->fetch_assoc();
			
			$name5 = $fam5['name'];
			if (empty($name5)) {
				$relation5 = '';
				$age5 = '';
			} else {
			$relation5 = $fam5['relationship'];
			$age5 = $fam5['fam_age'];
			}

		}
}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 6";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam6 = $result->fetch_assoc();
			
			$name6 = $fam6['name'];
			if (empty($name6)) {
				$relation6 = '';
				$age6 = '';
			} else {
			$relation6 = $fam2['relationship'];
			$age6 = $fam6['fam_age'];
			}
		}
}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 7";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam7 = $result->fetch_assoc();
			
			$name7 = $fam7['name'];
			if (empty($name7)) {
				$relation7 = '';
				$age7 = '';
			} else {
			$relation7 = $fam7['relationship'];
			$age7 = $fam7['fam_age'];
			}

		}
}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 8";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam8 = $result->fetch_assoc();
			
			$name8 = $fam8['name'];
			if (empty($name8)) {
				$relation8 = '';
				$age8 = '';
			} else {
			$relation8 = $fam8['relationship'];
			$age8 = $fam8['fam_age'];
			}

		}
}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 9";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam9 = $result->fetch_assoc();
			
			$name9 = $fam9['name'];
			if (empty($name9)) {
				$relation9 = '';
				$age9 = '';
			} else {
			$relation9 = $fam9['relationship'];
			$age9 = $fam9['fam_age'];
			}

		}
}

if($con->query($sql)){

			$sql =  "SELECT * FROM client_general_fam WHERE client_id = $client_id AND fam_no = 10";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$fam10 = $result->fetch_assoc();
			
			$name10 = $fam10['name'];
			if (empty($name10)) {
				$relation10 = '';
				$age10 = '';
			} else {
			$relation10 = $fam10['relationship'];
			$age10 = $fam10['fam_age'];
			}

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
	
$fname = $row['first_name'].'&nbsp;'.$row['middle_name'].'&nbsp;'.$row['last_name'];
$name = ucwords(strtolower($row['first_name'])).'&nbsp;'.ucwords(strtolower($row['last_name']));
$family_head = $row['family_head'];
$interview_date = date("F d, Y", strtotime($row['interview_date']));  
$birthdate = date("F d, Y", strtotime($row['date_of_birth']));
$bplace = $row['place_of_birth'];
$address = ucwords(strtolower($row['address']));
$age = $row['age'];
$amounts = $row['amount'];
$amount = number_format("$amounts",2);
$purpose = $assistance;
$sign_person = 'FRANCIA M. ARCAYERA, <b>MSWDO</b>';



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
	<p style='text-align: right;'>No. $controlno</p>
	<p style='text-align: right;' >Date Occurrences: <b>$interview_date</b></p>
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
	<input style='width: 250px; border: none; border-bottom: 1px solid black; text-align: center;' value='$name' type='text' />
	<input style=' width: 60px; border: none;' value='Address' type='text' /><b>:</b>
	<input style='width: 280px; border: none; border-bottom: 1px solid black; text-align: center;' value='$address' type='text' />
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
		<td style='text-align: center; width: auto;' >$name1</td>		
		<td style='text-align: center;' >$relation1</td>		
		<td style='text-align: center;' >$age1</td>		
		<td style='text-align: center;' >6</td>		
		<td style='text-align: center;' >$name6</td>		
		<td style='text-align: center;' >$relation6</td>		
		<td style='text-align: center;' >$age6</td>		
	  </tr>
	  <tr>
		<td style='text-align: center;' >2</td>		
		<td style='text-align: center;' >$name2</td>		
		<td style='text-align: center;' >$relation2</td>		
		<td style='text-align: center;' >$age2</td>		
		<td style='text-align: center;' >7</td>		
		<td style='text-align: center;' >$name7</td>		
		<td style='text-align: center;' >$relation7</td>		
		<td style='text-align: center;' >$age7</td>		
	  </tr>
	  <tr>
		<td style='text-align: center;' >3</td>		
		<td style='text-align: center;' >$name3</td>		
		<td style='text-align: center;' >$relation3</td>		
		<td style='text-align: center;' >$age3</td>		
		<td style='text-align: center;' >8</td>		
		<td style='text-align: center;' >$name8</td>		
		<td style='text-align: center;' >$relation8</td>		
		<td style='text-align: center;' >$age8</td>		
	  </tr>
	  <tr>
		<td style='text-align: center;' >4</td>		
		<td style='text-align: center;' >$name4</td>		
		<td style='text-align: center;' >$relation4</td>		
		<td style='text-align: center;' >$age4</td>		
		<td style='text-align: center;' >9</td>		
		<td style='text-align: center;' >$name9</td>		
		<td style='text-align: center;' >$relation9</td>		
		<td style='text-align: center;' >$age9</td>		
	  </tr>
	  <tr>
		<td style='text-align: center;' >5</td>		
		<td style='text-align: center;' >$name5</td>		
		<td style='text-align: center;' >$relation5</td>		
		<td style='text-align: center;' >$age5</td>		
		<td style='text-align: center;' >10</td>		
		<td style='text-align: center;' >$name10</td>		
		<td style='text-align: center;' >$relation10</td>		
		<td style='text-align: center;' >$age10</td>		
	  </tr>
	</table>
	<p>
	<br>
	Signature/Thumbmark of Client:____________________________________ Signature of Worker: ____________________________________<br>
	Date of Registration: $interview_date<br>
	Brief Background of the case:<br>
	<i>&nbsp;&nbsp;&nbsp;<b>$background</b></i>
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

