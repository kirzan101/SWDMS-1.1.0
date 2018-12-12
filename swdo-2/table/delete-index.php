
        <!-- header content -->
<?php include 'header.php'; ?>
        <!-- /header content -->

		<?php
		
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
		<!-- Table Start-->	
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Delete Service details</b></h2>
					<div class="col-md-2 col-sm-5 col-xs-12 pull-right">
					</div>
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
					<h2>Client name:<b> <?php echo $row['first_name'].' '.$row['last_name']; ?> <a type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal"><span class="fa fa-trash"> Delete</span></a><?php echo $button; ?></b></h2>
					
					<!-- Delete Client Modal -->
					
					  <div class="modal fade" id="deleteModal" role="dialog">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><b>Notice:</b></h4>
								</div>
								<div class="modal-body">
								
									Are you <b>SURE</b> you want to <b>DELETE</b> this Client?
								
								</div>
								
								<div class="modal-footer">
									<a type="button" class="btn btn-danger btn-xs" href="delete-client-details.php?client_id=<?php echo $row['client_id']; ?>&&worker_id=<?php echo $worker_id; ?>" >Confirm</a>
									<button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
								</div>
							</div>
						</div>
					  </div>
					
					<!-- End Modal-->
					<br>
					<h2>Please choose a service:</h2>
                      <table class="table table-hover">
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
							<td><?php if ($row1['service_id'] == '1') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal1"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row2['service_id'] == '2') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal2"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row3['service_id'] == '3') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal3"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row4['service_id'] == '4') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal4"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row5['service_id'] == '5') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal5"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row6['service_id'] == '6') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal6"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row7['service_id'] == '7') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal7"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row8['service_id'] == '8') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal8"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row9['service_id'] == '9') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal9"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row10['service_id'] == '9') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal10"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row11['service_id'] == '10') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal11"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row12['service_id'] == '11') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal12"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row13['service_id'] == '12') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal13"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row14['service_id'] == '13') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal14"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
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
							<td><?php if ($row15['service_id'] == '14') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal15"><span class="fa fa-trash"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
						</tr>
                      </tbody>
                    </table>
                  </div>
				</div>
			  </div>
		</div>
				  <!-- /Table-->
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 

			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details g WHERE i.interview_id = a.interview_id AND a.client_id = $client_id AND a.service_id = 1 AND i.interview_id = g.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_burial.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_general_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 

			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details g WHERE i.interview_id = a.interview_id AND a.client_id = $client_id AND a.service_id = 2 AND i.interview_id = g.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_educational.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_general_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 

			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_general_details g WHERE i.interview_id = a.interview_id AND a.client_id = $client_id AND a.service_id = 3 AND i.interview_id = g.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_food.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_general_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_medical.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_general_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_transportation.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_general_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i , client_child_details c WHERE c.client_id = $client_id && c.interview_id = i.interview_id && c.interview_id = a.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_cicl.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_child_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_dwyna_details c WHERE c.client_id = $client_id && c.interview_id = i.interview_id  && c.interview_id = a.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_dwyna.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_dwyna_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM client_couple c INNER JOIN interview i WHERE i.client_id = $client_id && c.interview_id = i.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_pre_marriage.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_couple_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_solo_details c WHERE c.client_id = $client_id && c.interview_id = i.interview_id  && c.interview_id = a.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_solo-parent.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_solo_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_pwd_solo c WHERE c.client_id = $client_id && c.interview_id = i.interview_id  && c.interview_id = a.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_pwd.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['pwd_solo_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_death_aid_details c WHERE c.client_id = $client_id && c.interview_id = i.interview_id  && c.interview_id = a.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_dascpd.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_death_aid_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i,  client_training_details c WHERE c.client_id = $client_id && c.interview_id = i.interview_id  && c.interview_id = a.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_livelihood.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_training_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_referral_details c WHERE c.client_id = $client_id && c.interview_id = i.interview_id  && c.interview_id = a.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_rloa.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_referral_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_scsr_details c WHERE c.client_id = $client_id && c.interview_id = i.interview_id  && c.interview_id = a.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_scsr.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_scsr_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
        	<p style="color: red;"><b>WARNING: DELETING TRANSACTION HERE WILL PERMANENTLY REMOVE AND CANNOT BE RETRIEVE.</b></p>
		<?php
		    $client_id = $_GET['client_id']; 
			
			$sql = "SELECT * FROM assistance a INNER JOIN interview i, client_indigency_details c WHERE c.client_id = $client_id && c.interview_id = i.interview_id && c.interview_id = a.interview_id ORDER BY i.interview_id DESC";
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
				<td><a class="btn btn-danger btn-xs" href="../action/delete_indigency.php?client_id=<?php echo $rows['client_id']; ?>&&count_no=<?php echo $rows['client_indigency_detail_id']; ?>&&assistance_id=<?php echo $rows['assistance_id']; ?>&&interview_id=<?php echo $rows['interview_id']; ?>" >Delete</a></td>
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
</div>
 
			<!-- footer content -->
<?php include 'footer.php'; ?>
        <!-- /footer content -->