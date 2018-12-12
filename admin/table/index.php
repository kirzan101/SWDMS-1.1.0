        <!-- Page Header -->
		<?php include 'header.php'; ?>

		<?php
		include "../../db_connect.php";
		
		$sql = "SELECT * FROM workers w INNER JOIN users u WHERE w.user_id = u.user_id AND w.position != 'Admin' ";
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
                    <h2><b>List of Users</b></h2>
					<div class="col-md-2 col-sm-5 col-xs-12 pull-right">
						<a type="button" class="btn btn-round btn-danger" href="../profile/insert-profile.php" ><i class="fa fa-plus"> Add New User</i></a>
					</div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
						  <th>Name</th>
						  <th>Position</th>
						  <th>Username</th>
						  <th>Action</th>
						  <th>Status</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php while($rows = mysqli_fetch_array($result)) { ?>
						<tr>
							<td style="text-transform: capitalize;" ><?php echo $rows['last_name'].', '.$rows['first_name']; ?></td>
							<td><?php echo $rows['position']; ?></td>	
							<td><?php echo $rows['username']; ?></td>
							<td><center><a type="button" class="btn btn-round btn-danger btn-xs" href="reset.php?user_id=<?php echo $rows['user_id']; ?>" ><i class="fa fa-refresh fa-spin"></i> Reset</a></center></td>
							<td>
							<center>
							<?php
							
							if ( $rows['status'] == 'DEACTIVATE' ) {
								echo "<a type='button' class='btn btn-round btn-success btn-xs' href='activate.php?user_id=".$rows['user_id']."' >ACTIVATE</a>";
							} else {
								//echo "<a type='button' class='btn btn-round btn-success btn-xs' disabled >ACTIVATE</a>";
							}
							
							if ( $rows['status'] == 'ACTIVE' ) {
								echo "<a type='button' class='btn btn-round btn-danger btn-xs' href='deactivate.php?user_id=".$rows['user_id']."' >DEACTIVATE</a>";
							} else {
								//echo "<a type='button' class='btn btn-round btn-danger btn-xs' disabled >DEACTIVATE</a>";
							}
							
							?>
							</center>
							</td>
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