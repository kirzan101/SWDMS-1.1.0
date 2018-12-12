
        <!-- header content -->
<?php include 'header.php'; ?>
        <!-- /header content -->
	
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
                    <h2><b>Print Service details</b></h2>
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
					<h2>Client name:<b> <?php echo $row['first_name'].' '.$row['last_name']; ?></b></h2>
					<br>
					<h2>Please choose a service:</h2>
                      <table class="table table-hover">
                      <thead>
                        <tr>
						  <th><center>Services</center></th>
						  <th><center>Intake forms</center></th>
						  <th><center>Certificate of Eligibility</center></th>
						  <th><center>Obligation Request</center></th>
						  <th><center>Other Certificates</center></th>
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
							<td><?php if ($row1['service_id'] == '1') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eligibility1"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
							<td><?php if ($row1['service_id'] == '1') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#obligation1"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
							<td><center>N/A</center></td>
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
							<td><?php if ($row2['service_id'] == '2') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eligibility2"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
							<td><?php if ($row2['service_id'] == '2') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#obligation2"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
							<td><center>N/A</center></td>
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
							<td><?php if ($row3['service_id'] == '3') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eligibility3"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
							<td><?php if ($row3['service_id'] == '3') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#obligation3"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
							<td><center>N/A</center></td>
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
							<td><?php if ($row4['service_id'] == '4') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eligibility4"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
							<td><?php if ($row4['service_id'] == '4') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#obligation4"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
							<td><center>N/A</center></td>
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
							<td><?php if ($row5['service_id'] == '5') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#eligibility5"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
							<td><?php if ($row5['service_id'] == '5') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#obligation5"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
							<td><center>N/A</center></td>
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
							<td><center>N/A</center></td>
							<td><center>N/A</center></td>
							<td><center>N/A</center></td>
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
							<td><center>N/A</center></td>
							<td><center>N/A</center></td>
							<td><center>N/A</center></td>
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
							<td><center>N/A</center></td>
							<td><?php if ($row11['service_id'] == '10') { echo '<center><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#obligation6"><span class="fa fa-edit"> Select</span></button></center>'; } else { echo '<center>N/A</center></center>'; } ?></td>
							<td><center>N/A</center></td>
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

<?php include 'modal-intake-forms.php'; ?>
		
         <!-- footer content -->
<?php include 'footer.php'; ?>
        <!-- /footer content -->