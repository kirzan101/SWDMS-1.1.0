<?php

include '../../../db_connect.php';
	
$sql = "SELECT * FROM interview WHERE interview_id = 1 && client_id = 1";
$result = $con->query($sql);
$row = $result->fetch_assoc();
//$date = '2018-03-03';
//$currMonth = date('m',$date);
//echo $currMonth ;

$date = $row['interview_date'];
$d = date_parse_from_format("Y-m-d", $date);
$month = $d["month"];

$currMonth = date("m");

$serviceErr = '';
$serviceNotif = '';

if($month == $currMonth){

	$serviceNotif = '1';
	$serviceErr = '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>It seems that the client is already acquired this service this month. Client is only allowed to acquired this service <b>ONCE A MONTH</b>
                  </div>';

} else {

	$serviceErr = '';

}

?>