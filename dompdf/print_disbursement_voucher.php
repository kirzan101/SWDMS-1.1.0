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
		
$name = $row['first_name'].'&nbsp;'.$row['middle_name'].'&nbsp;'.$row['last_name'];
$interview_date = date("F d, Y", strtotime($row['interview_date']));  
$birthdate = date("F d, Y", strtotime($row['date_of_birth']));
$bplace = $row['place_of_birth'];
$address = $row['address'];
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
			<h4 style='margin:0; color: black'><b>DISBURSEMENT VOUCHER</b></h4>
	</center>

	<p style='text-align: right; margin-right: 4.5%;'>Obligation Request No.______________</p>
	<p style='text-align: right; margin-right: 4.5%;'>Interview Date: <b>$interview_date</b></p>
	<p style='margin-left: 4.5%;'>
	&nbsp;&nbsp;&nbsp;Client name: <b>$name</b><br>
	&nbsp;&nbsp;&nbsp;Address: <b>$address</b><br>
	&nbsp;&nbsp;&nbsp;Mode of Payment: <input type='checkbox'> Check <input type='checkbox'> Cash <input type='checkbox'> Others(specify):________________
	<br>
	
	<table>
	<thead>
		<tr>
			<th></th>
			<th>Amount</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style='border-style: none; border-right: 1px solid black; width: 373px; height: 100px;' >The payment of financial assistance under AICS in the amount of . . . . .</td>
			<td style='border-style: none; border-right: 1px solid black; width: 373px; height: 300px;' ><center>P $amount</center></td>
		</tr>
		<tr>
			<td style='text-align: right; border: none; border-top: 1px solid black;'></td>
			<td style='text-align: center; border: none; border-top: 1px solid black;'>Total P $amount</td>
		</tr>
	</tbody>
	</table>
	<table style='border: none;'>
		<tr>
			<td style='width: 373px; border: none;'>A. Certified</td>
			<td style='width: 373px; border: none;'>B. Certified</td>
		</tr>
		<tr>
			<td style='border: none;'><input type='checkbox'> Allotment obligated for the purpose indicated above<br><input type='checkbox'> Supporting documents complete</td>
			<td style='border: none;'><center>_____________________</center></td>
		</tr>
		<tr>
			<td style='text-align: center; border: none;' ><br><br><br><b>NOLITO J. SALCEDO</b><br>Municipal Accountant<br><a style='font-size: 10px;' >Head Accounting Unit/Authorize Representtive</a></td>
			<td style='text-align: center; border: none;'><br><br><br><b>IMELDA C. MARISCAL</b><br>Municipal Treasurer<br><a style='font-size: 10px;' >Treasurer/Authorize Representative</a></td>
		</tr>
		<tr>
			<td style='border: none;'><br>C. Approved for Payment</td>
			<td style='border: none;'><br>D. Received Payment</td>
		</tr>
		<tr>
			<td style='text-align: center; border: none;' ><br><br><br><b>HENRY P. RAGODON</b><br>Municipal Mayor<br><a style='font-size: 10px;' >Agency Head/Authorize Representtive</a></td>
			<td style='border: none;'><br><br><br><b style='text-align: center;'>$name</b><br><a style='font-size: 14px;'>OR/Other documents:</a><br><a style='font-size: 14px;'>JEV No.:</a></td>
		</tr>
	</table>
	<br>
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