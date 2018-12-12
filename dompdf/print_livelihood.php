<?php
// include autoloader
session_start();
require_once 'dompdf/autoload.inc.php';

include "../db_connect.php";

$client_id = $_GET['client_id'];
$count_no = $_GET['count_no'];

$sql = "SELECT * FROM client c INNER JOIN client_training_details s, interview i WHERE i.interview_id = s.interview_id && s.client_id = $client_id && c.client_id = $client_id && i.client_id = $client_id && s.client_training_detail_id = $count_no";
$result = $con->query($sql);
$row = $result->fetch_assoc();

			
$name = $row['first_name'].'&nbsp;'.$row['middle_name'].'&nbsp;'.$row['last_name'];
$sign_name = $row['first_name'].'&nbsp;'.$row['last_name'];
$interview_date = date("m/d/y", strtotime($row['interview_date']));  
$birthdate = date("M d, Y", strtotime($row['date_of_birth']));
$bplace = $row['place_of_birth'];
$address = $row['address'];
$educ = $row['educ_attainment'];
$contactno = $row['contact_no'];
$need1 = $row['training_needs_1'];
$need2 = $row['training_needs_2'];
$need3 = $row['training_needs_3'];
$tools = $row['startup_kit'];
$counterno = $row['client_training_detail_id'];
$counterno = str_pad($counterno, 6, "0", STR_PAD_LEFT);

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
        $pdf_filename = 'general_report';


$this_html ="
<!DOCTYPE html>
<html>
<title>Print Livelihood</title>

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
			<h4 style='margin:0; color: black'><b>Livelihood Intake Sheet</b></h4>
	</center>

	<p style='text-align: right; margin-right: 11.5%;'>No. $counterno</p>
	<p style='margin-left: 70%;'>Date Applied: <input style=' border: none; border-bottom: 1px solid black; width: 98px; text-align: center;' type='text' value=".$interview_date."></p>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Name' type='text' /><b>:</b>
	<input style='width: 300px; border: none; border-bottom: 1px solid black; text-align: center;' value='$name' type='text' />
	<input style='width: 30px; border: none;' type='text' value='Sex:' />
	<input style='width: 80px; border: none; border-bottom: 1px solid black; text-align: center;' value=".$row['sex']." type='text' />
	<input style='width: 30px; border: none;' type='text' value='Age:' />
	<input style='width: 70px; border: none; border-bottom: 1px solid black; text-align: center;' value=".$row['age']." type='text'  />
	<br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Date of Birth:' type='text' /><b>:</b>
	<input style='width: 150px; border: none; border-bottom: 1px solid black; text-align: center;' value='$birthdate' type='text' />
	<input style='width: 80px; border: none;' type='text' value='Birthplace:' />
	<input style='width: 300px; border: none; border-bottom: 1px solid black; text-align: center;' value='$bplace' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' type='text' value='Present Address' /><b>:</b>
	<input style='width: 545px; border: none; border-bottom: 1px solid black; text-align: center;' value='$address' type='text' />
	<br>
	<input style='margin-left: 4.5%; width: 175px; border: none;' value='Educational Attainment:' type='text' /><b>:</b>
	<input style='width: 210px; border: none; border-bottom: 1px solid black; text-align: center;' value='$educ' type='text' />
	<input style='width: 100px; border: none;' value='Contact no.' type='text' value='(3) ' /><b>:</b>
	<input style='width: 165px; border: none; border-bottom: 1px solid black; text-align: center;' value='$contactno' type='text'  />
	<br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Training Needs' type='text' /><b>:</b>
	<input style='width: 20px; border: none;' type='text' value='(1) ' /><b>:</b>
	<input style='width: 140px; border: none; border-bottom: 1px solid black; text-align: center;' value='$need1' type='text' />
	<input style='width: 20px; border: none;' type='text' value='(2) ' /><b>:</b>
	<input style='width: 140px; border: none; border-bottom: 1px solid black; text-align: center;' value='$need2' type='text' />
	<input style='width: 20px; border: none;' type='text' value='(3) ' /><b>:</b>
	<input style='width: 140px; border: none; border-bottom: 1px solid black; text-align: center;' value='$need3' type='text'  /><br>
	<input style='margin-left: 4.5%; width: 130px; border: none;' value='Startup Kit' type='text' /><b>:</b>
	<input style='width: 550px; border: none; border-bottom: 1px solid black; text-align: center;' value='$tools' type='text' />
	<br>
	
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

