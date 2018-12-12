	<!-- Modal for Print Forms -->
		  
	<!-- Burial Assistance -->	  
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 

			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details g WHERE i.interview_id = a.interview_id AND a.client_id = $client_id AND a.service_id = 1 AND g.interview_id = a.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);
			
		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			  <tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '1') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_general_intake.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false" ><span class="fa fa-print"> Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			  </tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>		  

  <!-- Educational Assistance -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 

			$sql = "SELECT * FROM assistance a INNER JOIN interview i , client_general_details g  WHERE i.interview_id = a.interview_id AND a.client_id = $client_id AND a.service_id = 2 AND g.interview_id = a.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);
			
		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			  <tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '2') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_general_intake.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false" ><span class="fa fa-print"> Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			  </tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Food Assistance -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 

			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details g WHERE i.interview_id = a.interview_id AND a.client_id = $client_id AND a.service_id = 3 AND g.interview_id = a.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);
			
		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			  <tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '3') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_general_intake.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false" ><span class="fa fa-print"> Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			  </tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Medical Assistance -->
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 

			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details g WHERE i.interview_id = a.interview_id AND a.client_id = $client_id AND a.service_id = 4 AND g.interview_id = a.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);
			
		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			  <tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '4') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_general_intake.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false" ><span class="fa fa-print"> Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			  </tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Transportation Assistance -->
  
    <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details g WHERE i.interview_id = a.interview_id AND a.client_id = $client_id AND a.service_id = 5 AND g.interview_id = a.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);
			
		?>
			
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			  <tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '5') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_general_intake.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false" ><span class="fa fa-print"> Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			  </tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- CICL -->
  <div class="modal fade" id="myModal6" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_child_details c INNER JOIN interview i, interview_log l WHERE c.client_id = $client_id && c.interview_id = i.interview_id && i.interview_id = l.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '6') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_cicl.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_child_detail_id'].'\').print(); return false"><span class="fa fa-print"> Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Welfare of Socially Disadvantaged Women, Youth, and other needy Adult -->
  <div class="modal fade" id="myModal7" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_dwyna_details c INNER JOIN interview i, interview_log l WHERE c.client_id = $client_id && c.interview_id = i.interview_id && i.interview_id = l.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '7') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_dwyna.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_dwyna_detail_id'].'\').print(); return false"><span class="fa fa-print"> Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Pre-marriage Counseling	 -->
  <div class="modal fade" id="myModal8" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_couple WHERE husband_id = $client_id OR wife_id = $client_id";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			
			$wife_id = $row['wife_id'];
			$husband_id = $row['husband_id'];
			$client_couple_id = $row['client_couple_id'];
		
		?>
		<?php
		
			
			
			$sql = "SELECT * FROM client_couple c INNER JOIN client_premarriage_log p WHERE c.husband_id = $husband_id AND c.wife_id = $wife_id AND p.client_couple_id = $client_couple_id ORDER BY c.client_couple_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if (!empty($rows['client_couple_id'])) { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_pre_marriage_form.php?husband_id='.$rows['husband_id'].'&&wife_id='.$rows['wife_id'].'&&count_no='.$rows['client_couple_id'].'\').print(); return false"><span class="fa fa-print"> Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Solo Parent ID	 -->
  <div class="modal fade" id="myModal9" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_solo_details c INNER JOIN interview i, interview_log l WHERE c.client_id = $client_id && c.interview_id = i.interview_id && i.interview_id = l.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '9') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_general_intake_solo_parent.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_solo_detail_id'].'\').print(); return false"><span class="fa fa-print"> Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Person with disabiity ID	 -->
  <div class="modal fade" id="myModal10" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_pwd_solo c INNER JOIN interview i, client_general_details d, interview_log l WHERE c.client_id = $client_id && c.interview_id = i.interview_id && d.interview_id = i.interview_id && i.interview_id = l.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '9') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_general_intake.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Death Aid of Senior Citizen & Person with Disbility -->
  <div class="modal fade" id="myModal11" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_death_aid_details c INNER JOIN interview i, client_general_details d, assistance a WHERE c.client_id = $client_id && c.interview_id = i.interview_id && c.client_id = d.client_id && a.interview_id = c.interview_id && d.interview_id = i.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '10') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_general_intake.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Livelihood Assistance -->
  <div class="modal fade" id="myModal12" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_training_details c INNER JOIN interview i, interview_log l WHERE c.client_id = $client_id && c.interview_id = i.interview_id && i.interview_id = l.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '11') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_livelihood.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_training_detail_id'].'\').print(); return false"><span class="fa fa-print"> Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Referral Letter to other agencies-->
  <div class="modal fade" id="myModal13" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_referral_details c INNER JOIN interview i, client_general_details d, interview_log l WHERE c.client_id = $client_id && c.interview_id = i.interview_id && d.interview_id = i.interview_id && i.interview_id = l.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '12') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_general_intake.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Social Case Stuy Report -->
  <div class="modal fade" id="myModal14" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_scsr_details c INNER JOIN interview i, interview_log l, client_general_details g WHERE c.client_id = $client_id && c.interview_id = i.interview_id && i.interview_id = l.interview_id && g.interview_id = i.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '13') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_general_intake.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Certificate of Indigency-->
  <div class="modal fade" id="myModal15" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '14' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '14') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_general_intake.php?client_id='.$rows['client_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  
 <!-- Certificate of eligibility Modal -->

  <!-- Burial Assistance -->
  <div class="modal fade" id="eligibility1" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '1' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '1') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_eligibility.php?client_id='.$rows['client_id'].'&&count_no='.$rows['assistance_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- Educational Assistance -->
  <div class="modal fade" id="eligibility2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '2' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '2') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_eligibility.php?client_id='.$rows['client_id'].'&&count_no='.$rows['assistance_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- Food Assistance -->
  <div class="modal fade" id="eligibility3" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '3' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '3') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_eligibility.php?client_id='.$rows['client_id'].'&&count_no='.$rows['assistance_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- Medical Assistance -->
  <div class="modal fade" id="eligibility4" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '4' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '4') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_eligibility.php?client_id='.$rows['client_id'].'&&count_no='.$rows['assistance_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- Transportation Assistance -->
  <div class="modal fade" id="eligibility5" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '5' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '5') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_eligibility.php?client_id='.$rows['client_id'].'&&count_no='.$rows['assistance_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
 <!-- Obligtion Request Modal -->

  <!-- Burial Assistance -->
  <div class="modal fade" id="obligation1" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '1' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '1') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_obligation_request.php?client_id='.$rows['client_id'].'&&service_id='.$rows['service_id'].'&&count_no='.$rows['assistance_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- Educational Assistance -->
  <div class="modal fade" id="obligation2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '2' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '2') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_obligation_request.php?client_id='.$rows['client_id'].'&&service_id='.$rows['service_id'].'&&count_no='.$rows['assistance_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- Food Assistance -->
  <div class="modal fade" id="obligation3" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '3' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '3') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_obligation_request.php?client_id='.$rows['client_id'].'&&service_id='.$rows['service_id'].'&&count_no='.$rows['assistance_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- Medical Assistance -->
  <div class="modal fade" id="obligation4" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '4' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '4') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_obligation_request.php?client_id='.$rows['client_id'].'&&service_id='.$rows['service_id'].'&&count_no='.$rows['assistance_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- Transportation Assistance -->
  <div class="modal fade" id="obligation5" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '5' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '5') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_obligation_request.php?client_id='.$rows['client_id'].'&&service_id='.$rows['service_id'].'&&count_no='.$rows['assistance_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- Death Aid of Senior Citizen & Person with Disbility -->
  <div class="modal fade" id="obligation6" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '10' && a.interview_id = i.interview_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '10') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_obligation_request.php?client_id='.$rows['client_id'].'&&service_id='.$rows['service_id'].'&&count_no='.$rows['assistance_id'].'\').print(); return false"><span class="fa fa-print" > Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- Other print forms -->
  
  <!-- Pre-marriage Counseling -->
  <div class="modal fade" id="other1" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_couple WHERE husband_id = $client_id OR wife_id = $client_id";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			
			$wife_id = $row['wife_id'];
			$husband_id = $row['husband_id'];
			$client_couple_id = $row['client_couple_id'];
		
		?>
		<?php
		
			
			
			$sql = "SELECT * FROM client_couple c INNER JOIN client_premarriage_log p WHERE c.husband_id = $husband_id AND c.wife_id = $wife_id AND p.client_couple_id = $client_couple_id ORDER BY c.client_couple_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if (!empty($rows['client_couple_id'])) { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_pre_marriage_certificate.php?husband_id='.$row['husband_id'].'&&wife_id='.$row['wife_id'].'&&count_no='.$row['client_couple_id'].'\').print(); return false"><span class="fa fa-print"> Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 
  <!-- Social Case Study Report -->
  <div class="modal fade" id="other2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_scsr_details c INNER JOIN interview i, interview_log l, client_general_details d WHERE c.client_id = $client_id && c.interview_id = i.interview_id && i.interview_id = l.interview_id && c.client_id = d.client_id && i.interview_id = d.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '13') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_social_case_study_report.php?client_id='.$rows['client_id'].'&&service_no='.$rows['client_scsr_detail_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false"><span class="fa fa-print" >Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- Issuance of Certificate of Indigency -->
  <div class="modal fade" id="other3" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Acquirement History</h4>
        </div>
        <div class="modal-body">
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d, client_indigency_details g WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '14' && a.interview_id = i.interview_id && i.interview_id = d.interview_id && g.interview_id = i.interview_id ORDER BY i.interview_id DESC";
			$result = $con->query($sql);

		?>
		
          <table class="table table-hover">
			<thead>
			  <tr>
				<th style="text-align: center;">Date</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php while($rows = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php $dmy = date("M d,Y", strtotime($rows['interview_date'])); echo $dmy; ?> | <?php $time = date("h:i A", strtotime($rows['interview_time'])); echo $time; ?></td>
				<td><?php if ($rows['service_id'] == '14') { echo '<center><a type="button" class="btn btn-danger btn-xs" onclick="window.open(\'../../dompdf/print_certificate_of_indigency.php?client_id='.$rows['client_id'].'&&service_no='.$rows['client_indigency_detail_id'].'&&count_no='.$rows['client_general_detail_id'].'\').print(); return false"><span class="fa fa-print" >Print</span></a></center>'; } else { echo '<center>N/A</center>'; } ?></td>
			</tr>
			<?php } ?>
			</tbody>
		  </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
