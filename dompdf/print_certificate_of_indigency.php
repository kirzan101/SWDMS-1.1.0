<?php
// include autoloader
session_start();
require_once 'dompdf/autoload.inc.php';

include "../db_connect.php";

$client_id = $_GET['client_id'];
$service_no = $_GET['service_no'];
$count_no = $_GET['count_no'];

$sql = "SELECT * FROM assistance a INNER JOIN client c, client_indigency_details i, client_general_details g WHERE c.client_id = $client_id AND c.client_id = i.client_id AND i.client_indigency_detail_id = $service_no AND a.interview_id = i.interview_id AND g.client_id = a.client_id AND a.interview_id = g.interview_id";
$result = $con->query($sql);
$row = $result->fetch_assoc();


$interview_id = $row['interview_id'];
$service_id = $row['service_id'];
$worker_id = $row['worker_id'];
$background = $row['indigency_letter_details'];
$assestment = $row['assestment'];
$name = $row['first_name'].'&nbsp;'.$row['middle_name'].'&nbsp;'.$row['last_name'];
$sname = $row['first_name'].'&nbsp;'.$row['last_name'];
$birthdate = date("F d, Y", strtotime($row['date_of_birth']));
$bplace = $row['place_of_birth'];
$address = $row['address'];
$age = $row['age'];
$civil = $row['civil_status'];
$address = $row['address'];
$counterno = $row['client_indigency_detail_id'];
$counterno = str_pad($counterno, 6, "0", STR_PAD_LEFT);
	
if($con->query($sql)){

			$sql =  "SELECT * FROM workers WHERE worker_id = $worker_id";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$rowsss = $result->fetch_assoc();
			
			$officer = $rowsss['first_name'].' '.$rowsss['last_name'].',RSW';
			$position = $rowsss['position'];
			if ($rowsss['position'] == 'MSWDO' ) { $position = 'Municipal Social Welfare and Development Officer'; } else if ($rowsss['position'] == 'SWDO II') { $position = 'Social Welfare Officer II'; } else { echo ''; }

		}
}

if($con->query($sql)){

			$sql =  "SELECT * FROM interview WHERE interview_id = $interview_id";
			if ($result=mysqli_query($con,$sql)) {
			
			$result = $con->query($sql);
			$dates = $result->fetch_assoc();
			
			$day = date("d", strtotime($dates['interview_date']));
			$day = $day.'th';
			$year = date("Y", strtotime($dates['interview_date']));
			$month = date("F", strtotime($dates['interview_date']));	
			$interview_date = date("F d, Y", strtotime($dates['interview_date']));  

		}
}


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
        $pdf_filename = 'general_report';


$this_html ="
<!DOCTYPE html>
<html>
<title>Print Certificate of Indigency</title>

<br>

<style>

@page { 
	margin: 1cm;
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
b {
	text-transform: capitalize;
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
			<h4 style='margin:0; color: black'><b>CERTIFICATE OF INDIGENCY</b></h4>
	</center>

	<p style='text-align: right; margin-right: 11.5%;'>No. $counterno</p>
	<p style='text-align: right; margin-right: 4.5%;'>$interview_date</p>
	<p>
	TO WHOM IT MAY CONCERN:
	<br>
	
	<p style='margin-left: 4.5%;'>This is to certify that <b>$sname</b>, <b>$age</b> years old, <b>$civil</b>, and a resident of <b>$address</b> belongs to indigent residents of the municipality.</p>

	<p style='margin-left: 4.5%;'>$assestment</p>
	<p style='margin-left: 4.5%;'>$background</p>
	<p style='margin-left: 4.5%;'>Given ths $day of $month $year at Canaman, Camarines Sur.</p>
	</p>
	<br><br>
	<p style='margin-right: 9%; text-align: right;'>
	<b style='text-transform: uppercase; margin-right: 9%;' >$officer</b><br>
	<b>$position</b>
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

