        <!-- Page Header -->
		<?php include 'header.php'; ?>

		<?php
		
		include "../../db_connect.php";
    
		$client_id = $_GET['client_id']; 
		
		// Define the gender for pre-marriage query
		$sql = "SELECT * FROM client WHERE client_id = $client_id ";
		$result = $con->query($sql);
		$gender = $result->fetch_assoc();

		$genders = $gender['sex'];
			
		if ( $genders == 'Male' ) {
			$query = "SELECT * FROM client_couple c INNER JOIN interview i WHERE c.husband_id = $client_id AND c.interview_id = i.interview_id ORDER BY i.interview_id DESC";
		} else {
			$query = "SELECT * FROM client_couple c INNER JOIN interview i WHERE c.wife_id = $client_id AND c.interview_id = i.interview_id ORDER BY i.interview_id DESC";
		}
		
		$client_id = $_GET['client_id']; 
					
		$button = "| <a type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal' data-backdrop='static' data-keyboard='false'><i class='fa fa-plus'> Choose</i></a>";

		?>
		
		<!-- Modal -->
		
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="height:50px;">
					<h4 class="modal-title" id="myModalLabel2">Please choose a service:</h4>
					</div>
					<div class="modal-body">
					<div class="container">
					<h4>AICS:</h4>
					<div class="list-group">
					<a type="button" class="list-group-item" href="../choose/choose-aics.php?service_id=1&&client_id=<?php echo $client_id; ?>">Burial Assistance</a>
					<a type="button" class="list-group-item" href="../choose/choose-aics.php?service_id=2&&client_id=<?php echo $client_id; ?>">Educational Assistance</a>
					<a type="button" class="list-group-item" href="../choose/choose-aics.php?service_id=3&&client_id=<?php echo $client_id; ?>">Food Assistance</a>
					<a type="button" class="list-group-item" href="../choose/choose-aics.php?service_id=4&&client_id=<?php echo $client_id; ?>">Medical Assistance</a>
					<a type="button" class="list-group-item" href="../choose/choose-aics.php?service_id=5&&client_id=<?php echo $client_id; ?>">Transportation Assistance</a>
					</div>
					<div class="list-group">
					<h4>Others:</h4>
					<a type="button" class="list-group-item" href="../choose/choose-cicl.php?client_id=<?php echo $client_id; ?>">Children in Conflict with the Law</a>
					<a type="button" class="list-group-item" href="../choose/choose-livelihood.php?client_id=<?php echo $client_id; ?>">Livelihood Assistance</a>
					<a type="button" class="list-group-item" href="../choose/choose-scsr.php?client_id=<?php echo $client_id; ?>">Social Case Study</a>
					<a type="button" class="list-group-item" href="../choose/choose-pre-marriage.php?client_id=<?php echo $client_id; ?>">Pre-marriage Counselling</a>
					<a type="button" class="list-group-item" href="../choose/choose-rloa.php?client_id=<?php echo $client_id; ?>">Referral to other Agencies</a>
					<a type="button" class="list-group-item" href="../choose/choose-indigency.php?client_id=<?php echo $client_id; ?>">Certificate of Indigency</a>
					<a type="button" class="list-group-item" href="../choose/choose-dascpd.php?client_id=<?php echo $client_id; ?>">Assistance for Death Aid of Senior Citizen & PWD</a>
					<a type="button" class="list-group-item" href="../choose/choose-solo-parent.php?client_id=<?php echo $client_id; ?>">Solo Parent ID</a>
					<a type="button" class="list-group-item" href="../choose/choose-pwd.php?client_id=<?php echo $client_id; ?>">Person With Disability ID</a>
					<a type="button" class="list-group-item" href="../choose/choose-dwyna.php?client_id=<?php echo $client_id; ?>">Welfare of Socially Disadvantaged Women, Youth & Other Needy Adult</a>
					</div>
					</div>
					</div>
					<div class="modal-footer">
					<a type="button" class="btn btn-default" data-dismiss="modal" >Cancel</a> <!-- data-dismiss="modal" <button onclick="myFunctionss()">Try it</button> -->
					</div>
				</div>
			</div>
		</div>
		
		<!-- End Modal -->
		
		<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>SWDMS - Canaman</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <h4>
				  <span id='time'></span>
                  <?php 
				  date_default_timezone_set("Asia/Manila");
				  echo " | " . date("M d,Y") . "<br>"; 
				  ?>
				  </h4>
                </div>
              </div>
            </div>
			
            <div class="clearfix"></div>

			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Service Registry</b></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				   <?php
					include "../../db_connect.php";
    
					$client_id = $_GET['client_id']; 

					$sql = "SELECT * FROM client WHERE client_id = $client_id";
					$result = $con->query($sql);
					$row = $result->fetch_assoc();
				  ?>
					<h2>Client name:<b> <?php echo $row['first_name'].' '.$row['last_name']; ?> <a type="button" class="btn btn-danger btn-xs" href="edit-client-details.php?client_id=<?php echo $client_id; ?>" ><span class="fa fa-edit"> Edit</span></a><?php echo $button; ?></b></h2>
					
                    <table class="table hover">
                      <thead>
                        <tr>
						  <th><center>Services</center></th>
						  <th><center>Action</center></th>
                        </tr>
                      </thead>

                      <tbody>
						<tr>
                        <?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 

							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 1";
							$result = $con->query($sql);
							$row1 = $result->fetch_assoc();
						?>
							<td>AICS - Burial Assistance</td>
							<td><?php if ($row1['service_id'] == '1') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal1"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 
	
							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 2";
							$result = $con->query($sql);
							$row2 = $result->fetch_assoc();
						?>
							<td>AICS - Educational Assistance</td>
							<td><?php if ($row2['service_id'] == '2') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal2"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 

							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 3";
							$result = $con->query($sql);
							$row3 = $result->fetch_assoc();
						?>
							<td>AICS - Food Assistance</td>
							<td><?php if ($row3['service_id'] == '3') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal3"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 

							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 4";
							$result = $con->query($sql);
							$row4 = $result->fetch_assoc();
						?>
							<td>AICS - Medical Assistance</td>
							<td><?php if ($row4['service_id'] == '4') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal4"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 

							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 5";
							$result = $con->query($sql);
							$row5 = $result->fetch_assoc();
						?>
							<td>AICS - Transportation Assistance</td>
							<td><?php if ($row5['service_id'] == '5') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal5"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 
	
							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 6";
							$result = $con->query($sql);
							$row6 = $result->fetch_assoc();
						?>
							<td>Children in conflict with the law</td>
							<td><?php if ($row6['service_id'] == '6') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal6"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 

							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 7";
							$result = $con->query($sql);
							$row7 = $result->fetch_assoc();
						?>
							<td>Welfare of Socially Disadvantaged Women, Youth, and other needy Adult</td>
							<td><?php if ($row7['service_id'] == '7') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal7"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 
	
							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 8";
							$result = $con->query($sql);
							$row8 = $result->fetch_assoc();
						?>
							<td>Pre-marriage Counseling</td>
							<td><?php if ($row8['service_id'] == '8') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal8"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 

							$sql = "SELECT * FROM assistance a INNER JOIN client_solo_details c WHERE a.client_id = $client_id AND a.client_id = c.client_id AND a.service_id = 9";
							$result = $con->query($sql);
							$row9 = $result->fetch_assoc();
						?>
							<td>Solo Parent ID</td>
							<td><?php if ($row9['service_id'] == '9') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal9"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 
	
							$sql = "SELECT * FROM assistance a INNER JOIN client_pwd_solo p WHERE a.client_id = $client_id AND a.client_id = p.client_id AND a.service_id = 9";
							$result = $con->query($sql);
							$row10 = $result->fetch_assoc();
						?>
							<td>Person with Disability ID</td>
							<td><?php if ($row10['service_id'] == '9') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal10"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 
	
							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 10";
							$result = $con->query($sql);
							$row11 = $result->fetch_assoc();
						?>
							<td>Death Aid of Senior Citizen & Persons with Disability</td>
							<td><?php if ($row11['service_id'] == '10') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal11"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 

							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 11";
							$result = $con->query($sql);
							$row12 = $result->fetch_assoc();
						?>
							<td>Livelihood Assistance</td>
							<td><?php if ($row12['service_id'] == '11') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal12"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
			
							$client_id = $_GET['client_id']; 

							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 12";
							$result = $con->query($sql);
							$row13 = $result->fetch_assoc();
						?>
				  <td>Referral Letter to other Agencies</td>
							<td><?php if ($row13['service_id'] == '12') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal13"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 

							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 13";
							$result = $con->query($sql);
							$row14 = $result->fetch_assoc();
						?>
							<td>Social Case Study Report</td>
							<td><?php if ($row14['service_id'] == '13') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal14"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
						<tr>
						<?php
							include "../../db_connect.php";
    
							$client_id = $_GET['client_id']; 

							$sql = "SELECT * FROM assistance WHERE client_id = $client_id AND service_id = 14";
							$result = $con->query($sql);
							$row15 = $result->fetch_assoc();
						?>
							<td>Certificate of Indigency</td>
							<td><?php if ($row15['service_id'] == '14') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal15"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

          </div>
        </div>
        <!-- /page content -->
		
<!-- Modal -->
		  
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-aics.php?service_id=1&&client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-aics.php?service_id=2&&client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-aics.php?service_id=3&&client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-aics.php?service_id=4&&client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-aics.php?service_id=5&&client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
			
			$sql = "SELECT * FROM client_child_details c INNER JOIN interview i WHERE c.client_id = $client_id && c.interview_id = i.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-cicl.php?client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
			
			$sql = "SELECT * FROM client_dwyna_details c INNER JOIN interview i WHERE c.client_id = $client_id && c.interview_id = i.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-dwyna.php?client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
			
			$sql = $query;
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-pre-marriage.php?count=<?php echo $rows['client_couple_id']; ?>" >Edit</a></td>
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
			
			$sql = "SELECT * FROM client_solo_details c INNER JOIN interview i WHERE c.client_id = $client_id && c.interview_id = i.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-solo-parent.php?client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
			
			$sql = "SELECT * FROM client_pwd_solo c INNER JOIN interview i, client_general_details d WHERE c.client_id = $client_id && c.interview_id = i.interview_id AND d.interview_id = i.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-pwd.php?client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-dascpd.php?client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>&&&interview_id=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
			
			$sql = "SELECT * FROM client_training_details c INNER JOIN interview i WHERE c.client_id = $client_id && c.interview_id = i.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-livelihood.php?client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
			
			$sql = "SELECT * FROM client_referral_details c INNER JOIN interview i, client_general_details d WHERE c.client_id = $client_id && c.interview_id = i.interview_id && d.interview_id = i.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-rloa.php?client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
			
			$sql = "SELECT * FROM client_scsr_details c INNER JOIN interview i, client_general_details g WHERE c.client_id = 2 && c.interview_id = i.interview_id AND g.interview_id = c.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-scsr.php?client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details d, client_indigency_details g WHERE a.client_id = $client_id && a.client_id = d.client_id && service_id = '14' && a.interview_id = i.interview_id && i.interview_id = d.interview_id && i.interview_id = g.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../update/update-indigency.php?client_id=<?php echo $rows['client_id']; ?>&&count=<?php echo $rows['interview_id']; ?>" >Edit</a></td>
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
		<!-- End Modal -->
		
		<!-- Page Footer -->
		<?php include 'footer.php'; ?>