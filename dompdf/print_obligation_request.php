<?php
// include autoloader
session_start();
require_once 'dompdf/autoload.inc.php';

include "../db_connect.php";

$client_id = $_GET['client_id'];
$service_id = $_GET['service_id'];
$count_no = $_GET['count_no'];

$sql = "SELECT * FROM client c INNER JOIN assistance s, interview i, services e WHERE s.client_id = $client_id && c.client_id = $client_id && i.client_id = $client_id && i.interview_id = s.interview_id AND e.service_id = $service_id  AND s.service_id = e.service_id AND s.assistance_id = $count_no ";
$result = $con->query($sql);
$row = $result->fetch_assoc();


$interview_id = $row['interview_id'];

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

if($con->query($sql)){

			$sql =  "SELECT * FROM aics_counter WHERE interview_id = $interview_id";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$aics = $result->fetch_assoc();
			
			 $controlno = $aics['aics_counter_id']; 
			 
		}	else {
			$controlno = "";
		}
}

if (empty($controlno)) {
	$controlno = str_pad('1', 6, "0", STR_PAD_LEFT);
} else {
	$controlno = str_pad($controlno, 6, "0", STR_PAD_LEFT);
}
	
$name = ucwords($row['first_name']).'&nbsp;'.ucwords($row['last_name']);
$fullname = ucwords($row['first_name']).'&nbsp;'.ucwords($row['middle_name']).'&nbsp;'.ucwords($row['last_name']);
$interview_date = date("F d, Y", strtotime($row['interview_date']));  
$birthdate = date("F d, Y", strtotime($row['date_of_birth']));
$bplace = $row['place_of_birth'];
$address = ucwords($row['address']);
$age = $row['age'];
$amounts = $row['amount'];
$amount = number_format("$amounts",2);
$comment = $assistance;

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
			<h4 style='margin:0; color: black'><b>OBLIGATION REQUEST</b></h4>
	</center>

	<p style='text-align: right; margin-right: 11.5%;'>No. $controlno</p>
	<p style='text-align: right; margin-right: 4.5%;'>$interview_date</p>
	<p style='margin-left: 4.5%;'>
	&nbsp;&nbsp;&nbsp;Client name: <b>$name</b><br>
	&nbsp;&nbsp;&nbsp;Address: <b>$address</b>
	<br>
	
	<table>
	<thead>
		<tr>
			<th>Responsibility Center</th>
			<th></th>
			<th>&nbsp;&nbsp;F.P.P.&nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp;Account Code&nbsp;&nbsp;</th>
			<th>Amount</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The payment of financial assistance under AICS in the amount of . . . . .&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' >P $amount</td>
		</tr>
		<tr>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none;' ></td>
		</tr>
		<tr>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none;' ></td>
		</tr>
		<tr>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none;' ></td>
		</tr>
		<tr>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none;' ></td>
		</tr>
		<tr>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none;' ></td>
		</tr>
		<tr>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none;' ></td>
		</tr>
		<tr>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none;' ></td>
		</tr>
		<tr>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none;' ></td>
		</tr>
		<tr>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none; border-right: 1px solid black;' ></td>
			<td style='border-style: none;' ></td>
		</tr>
		<tr>
			<td colspan='5' style='text-align: right;'>Total P $amount&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
	</tbody>
	</table>
	<br>
	</p>
	<p style='margin-left: 4.5%;'>
	A. Certified <br>
	<input type='checkbox'> Changes to appropriation necessary, lawful and under by direct supervision <br>
	<input type='checkbox'> Supporting documents valid, proper, and legal <br>
	</p>
	<p style='margin-left: 4.5%;'>
	B. Certified <br>
	<input type='checkbox'> Existence of available appropriation <br>
	</p>
	<br><br>
	<p style='margin-left: 4.5%;'>
	<b>FRANCIA M. ARCAYERA</b>
	</p>
	<p style='margin-left: 12%;'>
	<b>MSWDO</b>
	</p>
	<p style='margin-right: 9%; text-align: right;'>
	<b>MARIVE P. LLABAN</b>
	</p>
	<p style='margin-right: 4.5%; text-align: right;'>
	<b>Acting Municipal Budget Officer</b>
	</p>
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