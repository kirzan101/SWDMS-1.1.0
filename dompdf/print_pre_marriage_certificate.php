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
		
$husband_name = $row['husband_name'];
$wife_name = $row['wife_name'];
$interview_date = date("F d, Y", strtotime($row['interview_date']));  

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
			<h4 style='margin:0; color: black'><b>Pre-Marriage Counselling Certificate</b></h4>
	</center>

	<p><b>TO WHOM IT MAY CONCERN:</b></p>
	<p style='margin-left: 4.5%; font-family: Brush Script MT;'>
	&nbsp;&nbsp;&nbsp;This is to verify that Mr. <b>$husband_name</b> and Ms. <b>$wife_name</b> had gone a Pre Marriage Counselling this day of <b>$interview_date</b> at 
	Municipal Social Welfare and Development Office, Canaman Camarines Sur.
	<br><br>
	&nbsp;&nbsp;&nbsp;This certification is issued as pre-requisite marriage license of the above couple as provided for in Article 16 of the New Family Code.
	<br><br>
	</p>
	<br>
	<p style='text-align: right; margin-right: 4.5%;'>$officer_name</p>
	<p style='text-align: right; margin-right: 4.5%;'>Marriage Counsellor</p>
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

