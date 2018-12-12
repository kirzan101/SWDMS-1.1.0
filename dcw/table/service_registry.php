        <!-- Page Header -->
		<?php include 'header.php'; ?>

		<?php
		include "../../db_connect.php";

		$sql = "SELECT * FROM assistance a INNER JOIN client c, interview i, services s WHERE a.client_id = c.client_id AND a.interview_id = i.interview_id  AND c.status = 'ACTIVE' AND s.service_id = a.service_id";
		$result = $con->query($sql);
		?>
		
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
				  
				  <!--Start Filter -->
				  <div class="pull-left form-group"> <!--  class="col-md-2 col-sm-12 col-xs-12 form-group" -->
					<select id='myInput1' class="select2_single form-control">
						<option value="">Showing All Services</option>
						<option value="Burial Assistance">Burial Assistance</option>
						<option value="Educational Assistance">Educational Assistance</option>
						<option value="Food Assistance">Food Assistance</option>
						<option value="Medical Assistance">Medical Assistance</option>
						<option value="Transportation Assistance">Transportation Assistance</option>
						<option value="Children in Conflict with the Law">Children in Conflict with the Law</option>
						<option value="Welfare of Socially Disadvantaged Women, Youth, and other needy Adult">Welfare of Socially Disadvantaged Women, Youth, and other needy Adult</option>
						<option value="Pre-marriage Counseling">Pre-marriage Counseling</option>
						<option value="Solo Parent and Persons with Disability ID">Solo Parent and Persons with Disability ID</option>
						<option value="Death Aid of Senior Citizen & Persons with Disability">Death Aid of Senior Citizen & Persons with Disability</option>
						<option value="Livelihood Assistance">Livelihood Assistance</option>
						<option value="Refferal Letter to other Agencies">Refferal Letter to other Agencies</option>
						<option value="Social Case Study Report">Social Case Study Report</option>
						<option value="Certificate of Indigency">Certificate of Indigency</option>
					</select>
					</div>
					<div class="pull-right">
					<form class="form-inline">
					  <div class="form-group">
						<label for="email">Search by Household ID:</label>
						<input type="text" id="myInput" onkeyup="myFunction()" class="form-control" size="16">
					  </div>
					</form><br>
					</div>
					<!-- End filter -->

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
						  <th><center>Date</center></th>
						  <th>Household ID</th>
						  <th>Name</th>
						  <th>Age</th>
                          <th>Sex</th>
						  <th>Amount</th>
						  <!--<th>Date Disburse</th>-->
						  <th>Acquired Services</th>
						  <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php while($rows = mysqli_fetch_array($result)) { ?>
						<tr>
						  <td><?php echo date("m/d/Y", strtotime($rows['interview_date'])).' '.date("h:i A", strtotime($rows['interview_time'])) ?></td>
						  <td><?php echo $rows['household_id']; ?></td>
						  <td style="text-transform: capitalize; font-weight: bold;" ><a href="edit-client-details.php?client_id=<?php echo $rows['client_id'];?>"><?php echo $rows['last_name'].', '.$rows['first_name']; ?></a></td>
						  <td><?php echo $rows['age'] ?></td>
						  <td><?php echo $rows['sex'] ?></td>
						  <td><?php if (empty($rows['amount'])) { echo 'N/A'; } else { echo 'P'; echo number_format($rows['amount'],2); } ?></td>
						  <td><?php echo $rows['service_name'] ?></td>
						  <td id="one"><button class="open-homeEvents btn btn-danger btn-xs" data-backdrop="static" data-keyboard="false" data-id="<?php echo $rows['client_id'] ?>"  data-toggle="modal" data-target="#modalHomeEvents">Choose</button></td>	
						</tr>
						<?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

          </div>
        </div>
        <!-- /page content -->
		
		<!-- Choose Modal -->
  <div id="modalHomeEvents" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
          <h4 class="modal-title" id="myModalLabel2">Please choose a service:</h4>
        </div>
        <div class="modal-body">
		<div class="container">
		<h4>AICS:</h4>
		<div class="list-group">
        <a type="button" class="list-group-item" href="../choose/choose-aics.php?service_id=1&&client_id=" id="link1">Burial Assistance</a>
		<a type="button" class="list-group-item" href="../choose/choose-aics.php?service_id=2&&client_id=" id="link2">Educational Assistance</a>
		<a type="button" class="list-group-item" href="../choose/choose-aics.php?service_id=3&&client_id=" id="link3">Food Assistance</a>
		<a type="button" class="list-group-item" href="../choose/choose-aics.php?service_id=4&&client_id=" id="link4">Medical Assistance</a>
		<a type="button" class="list-group-item" href="../choose/choose-aics.php?service_id=5&&client_id=" id="link5">Transportation Assistance</a>
		</div>
		<div class="list-group">
		<h4>Others:</h4>
		<a type="button" class="list-group-item" href="../choose/choose-livelihood.php?client_id=" id="link10">Livelihood Assistance</a>
		<a type="button" class="list-group-item" href="../choose/choose-dascpd.php?client_id=" id="link7">Assistance for Death Aid of Senior Citizen & PWD</a>
		<a type="button" class="list-group-item" href="../choose/choose-solo-parent.php?client_id=" id="link13">Solo Parent ID</a>
		<a type="button" class="list-group-item" href="../choose/choose-pwd.php?client_id=" id="link12">Person With Disability ID</a>
		</div>
        </div>
		</div>
        <div class="modal-footer">
          <a type="button" class="btn btn-default" data-dismiss="modal" onclick="myFunctionss()" >Cancel</a> <!-- data-dismiss="modal" <button onclick="myFunctionss()">Try it</button> -->
        </div>
      </div>

    </div>
  </div>
		
		<!-- Page Footer -->
		<?php include 'footer.php'; ?>