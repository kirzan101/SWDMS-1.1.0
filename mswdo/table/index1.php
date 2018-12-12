        <!-- Page Header -->
		<?php include 'header.php'; ?>

		<?php
		include "../../db_connect.php";

		$sql = "SELECT * FROM client WHERE status = 'ACTIVE'";
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
                    <h2><b>Client Registry</b></h2>
					<div class="col-md-2 col-sm-5 col-xs-12 pull-right">
						<a type="button" class="btn btn-round btn-danger" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"> Add New</i></a>
					</div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  
				  <!--Start Filter -->
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
						  <th>Name</th>
						  <th>Household ID</th>
						  <th>Age</th>
                          <th>Sex</th>
						  <th>Action</th>
						  <th>Print</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php while($rows = mysqli_fetch_array($result)) { ?>
						<tr>
							<td style="text-transform: capitalize;" ><?php echo $rows['last_name'].', '.$rows['first_name']; ?></td>
							<td><?php echo $rows['household_id'] ?></td>
							<td><?php echo $rows['age'] ?></td>
							<td><?php echo $rows['sex'] ?></td>
							<td>
							<center>
							<a class="btn btn-danger btn-xs" href="edit-index.php?client_id=<?php echo $rows['client_id'] ?>"><span class="fa fa-edit"> Edit</span></a>
							<a class="btn btn-danger btn-xs" href="delete-index.php?client_id=<?php echo $rows['client_id'] ?>"><span class="fa fa-trash"> Delete</span></a>
							</center>
							</td>	
							<td><center><a class="btn btn-danger btn-xs" href="print-index.php?client_id=<?php echo $rows['client_id'] ?>"><span class="fa fa-print"> Print</span></a></center></td>
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
          <h4 class="modal-title">Please choose a service:</h4>
        </div>
        <div class="modal-body">
		<div class="container">
		<h4>AICS:</h4>
		<div class="list-group">
        <a type="button" class="list-group-item" href="../forms/form-aics.php?service_id=1">Burial Assistance</a>
		<a type="button" class="list-group-item" href="../forms/form-aics.php?service_id=2">Educational Assistance</a>
		<a type="button" class="list-group-item" href="../forms/form-aics.php?service_id=3">Food Assistance</a>
		<a type="button" class="list-group-item" href="../forms/form-aics.php?service_id=4">Medical Assistance</a>
		<a type="button" class="list-group-item" href="../forms/form-aics.php?service_id=5">Transportation Assistance</a>
		</div>
		<div class="list-group">
		<h4>Others:</h4>
        <a type="button" class="list-group-item" href="../forms/form-cicl.php">Children in Conflict with the Law</a>
		<a type="button" class="list-group-item" href="../forms/form-livelihood.php">Livelihood Assistance</a>
		<a type="button" class="list-group-item" href="../forms/form-scsr.php">Social Case Study</a>
		<a type="button" class="list-group-item" href="../forms/form-pre-marriage.php">Pre-marriage Counselling</a>
		<a type="button" class="list-group-item" href="../forms/form-rloa.php">Referral to other Agencies</a>
		<a type="button" class="list-group-item" href="../forms/form-indigency.php">Certificate of Indigency</a>
		<a type="button" class="list-group-item" href="../forms/form-dascpd.php">Assistance for Death Aid of Senior Citizen & PWD</a>
		<a type="button" class="list-group-item" href="../forms/form-solo-parent.php">Solo Parent ID</a>
		<a type="button" class="list-group-item" href="../forms/form-pwd.php">Person With Disability ID</a>
		<a type="button" class="list-group-item" href="../forms/form-dwyna.php">Welfare of Socially Disadvantaged Women, Youth & Other Needy Adult</a>
		</div>
        </div>
		</div>
        <div class="modal-footer">
          <a type="button" class="btn btn-default" data-dismiss="modal" >Cancel</a> <!-- data-dismiss="modal" <button onclick="myFunctionss()">Try it</button> -->
        </div>
      </div>
      
    </div>
  </div>
  
  <script>
  // Order of the data in table
  $(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 0, "asc" ]]
    } );
} );
  
  </script>
		
		<!-- Page Footer -->
		<?php include 'footer.php'; ?>